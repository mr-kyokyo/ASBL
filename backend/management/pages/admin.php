<?php
session_start();

require_once '../../db/db.php';
require_once '../../logic/funcs.php';

logged_only2();

try {
  $req = $pdo->query("SELECT * FROM users");
  $nbrUsr = $req->rowCount();
} catch (Exception $e) {
  die("Une eurreur est survenue, Veillez réessayer plus tard!");
}

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <?php require_once "../src/header2.php"; ?>
    <title> ASBL </title>
  </head>
  <body>

    <?php require_once "../src/header3.php"; ?>

    <div class="container-fluid">
      <div class="row">
        
        <?php require_once "../src/sidebar.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="" style="width:100%;display:flex;justify-content:space-between;">
              <div></div>
              <div>
                <h6 class="h6"> TABLEAU DE BORD </h6>
              </div>
              <div></div>
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

          <div class="row">


          </div>

        </main>
      </div>
    </div>

    <?php require_once '../src/footer2.php'; ?>
    
  </body>
</html>

<style>

  form.form {
    padding: 10px;
  }

  form.form input[type],.input, form.form select {
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
<script>

    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>