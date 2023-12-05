<?php
session_start();

require_once '../../db/db.php';
require_once '../../logic/funcs.php';

if(!empty($_POST)) {
  if(isset($_POST['titre']) AND !empty($_POST['titre'])) {
    if(isset($_POST['design']) AND !empty($_POST['design'])) {
      if(isset($_POST['categorie']) AND !empty($_POST['categorie'])) {

          $titre = htmlspecialchars($_POST['titre']);
          $design = htmlspecialchars($_POST['design']);
          $cat = htmlspecialchars($_POST['categorie']);
          
          try {
            $req = $pdo->prepare("INSERT INTO article (
              titre,
              designation,
              categorie,
              datesign
            ) VALUES(?,?,?,?)");
            $req->execute([
                $titre,
                $design,
                $cat,
                date("Y-m-d h:m:d")
            ]);

            $_SESSION['flash']['success'] = "L'article à bien été ajouter";
            header('location: article.php?2sts');
            exit();
  
          } catch(Exception $e) {
            $_SESSION['flash']['danger'] = $e->getMessage();
          }

      } else {
        $_SESSION['flash']['danger'] = 'Categorie invalide';
      }
    } else {
      $_SESSION['flash']['danger'] = 'Designation invalide';
    }
  } else {
    $_SESSION['flash']['danger'] = 'designation invalide';
  }
  
  if(isset($_GET['delt']) AND !empty($_GET['delt'])) {
    $id = htmlspecialchars($_GET['delt']);
    $req = $pdo->prepare("SELECT id FROM article WHERE id = ?");
    $req->execute([$id]);
    $res=$req->fetch();
    if($res) {
      $req = $pdo->prepare("DELETE FROM article WHERE id = ?")
      ->execute([$res->id]);
      $_SESSION['flash']['success'] = "L'article à bien été supprimer";
      header("location: article.php?2sts");
      exit();
    }
  }
}


// logged_only();

try {
  $req = $pdo->query("SELECT * FROM article");
  $nbtProd = $req->rowCount();
} catch (Exception $e) {
  die("Une eurreur est survenue, Veillez réessayer plus tard!");
}

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <?php require_once "../src/header2.php"; ?>
    <title>ASBL   </title>
  </head>
  <body>
    <?php require_once "../src/header3.php"; ?>

    <div class="container-fluid">
      <div class="row">
        
        <?php require_once "../src/sidebar.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="btnReturn" style="width:100%;display:flex;justify-content:space-between;">
              <div><a href="../index.php"><i class="fa fa-chevron-left"></i> Retour </a> </div>
              <div>
                <h6 class="h6"> Article </h6>
              </div>
              <div class="add"><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-light"><i class="fa fa-add"></i></a> Nouveau </div>
            </div>
          </div>

          <?php if(isset($_SESSION['flash']['success'])): ?>
            <div class="alert alert-success">
              <p>
                <?= $_SESSION['flash']['success'] ?>
              </p>
            </div>
          <?php 
          unset($_SESSION['flash']);
          endif;
          ?>

          <?php if(isset($_SESSION['flash']['danger'])): ?>
            <div class="alert alert-danger">
              <p>
                <?= $_SESSION['flash']['danger'] ?>
              </p>
            </div>
          <?php 
          unset($_SESSION['flash']);
          endif;
          ?>

          <div class="col-4 px-5 py-3 d-flex bgSuccess">
            <p><h1 class="pr-2"><?= $nbtProd ?> </h1> <br /> article(s) </p>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titre</th>
                  <th scope="col">Categorie</th>
                  <th scope="col">Detail</th>
                  <th scope="col">Date</th>
                  <th scope=""></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $cnt = 0;
                while($data = $req->fetch()):
                  $cnt += 1;
                  ?>
                  <tr>

                    <td><?= $cnt ?></td>
                    <td><?= $data->titre ?></td>
                    <td><?= $data->categorie ?></td>
                    <td><?= $data->designation ?></td>
                    <td><?= $data->datesign ?></td>
                    
                    <td>
                      <a href="#delteElement<?= $data->id ?>" data-toggle="modal" data-target="#delteElement<?= $data->id ?>" data-whatever="@getbootstrap">
                        <i class="text-danger fa fa-trash"></i>
                      </a>
                    </td>

                  </tr>
                  
                  <div class="modal fade" id="delteElement<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-bodys p-3">
                          <p> Voulez vous vraiment supprimer cet article ?</p>
                        </div>
                        <div class="modal-footer bg-light">
                          <button type="button" class="btn btn-while" data-dismiss="modal">Annuler</button>
                          <form action="?delt=<?= $data->id ?>" method="post">
                            <input class="btn btn-secondary" type="submit" name="<?= $data->id ?>" value="Supprimer">  
                          </form>
                          </div>
                      </div>
                    </div>
                  </div>

                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
            
            <!-- new  -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content col-12 p-5 bg-light">
                  <h5> Ajout article </h5>
                  <hr />
                  <form action="" method="post" class="form">
  
                    <div class="col-12">
                      <label for=""> Titre </label><br />
                      <input type="text" name="titre" required>
                    </div>
  
                    <div class="col-12">
                      <label for=""> Categorie  </label><br />
                      <select class="input form-control" required name="categorie" id="">
                        <option value="">Choisir</option>
                        <option value="cat1">Categorie 1</option>
                        <option value="cat2">Categorie 2</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for=""> Detail  </label><br />
                      <textarea type="text" name="design" required></textarea>
                    </div>

                    <div class="col-12">
                      <label for=""> Image de couverture  </label><br />
                      <!-- <textarea type="text" name="design" required></textarea> -->
                    </div>
                    <button class="btn btn-secondary col-12"> Enregistrer </button>
                  </form>
              </div>
            </div>

        </main>
      </div>
    </div>

    <?php require_once '../src/footer2.php'; ?>
    
  </body>
</html>

<style>
  .bgSuccess{
    background: #cef8eea1;
  }
  form.form {
    padding: 10px;
  }
  form.form input[type], form.form textarea {
    width: 100%;
    border: 1px solid teal;
    padding: 5px 10px;
    border-radius: 40px;
  }
  form.form .col-12 {
    margin-bottom: 10px;
  }
  form.form .col-12 label {
    font-size: 17px;
    text-transform: uppercase;
  }

</style>