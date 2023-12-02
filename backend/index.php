<?php
session_start();
require_once 'db/db.php';
require_once 'logic/funcs.php';
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title> Asbl </title>

    <link href="./src/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/bootstrap/dist/css/bootstrap.min.css">

    <style>
      .img img {
        width: 100px;
        height: 100px;
      }
    </style>
  </head>

  <body>

    <?php require_once "header.php"; ?>

    <main class="text-centersS">
      <div class="m-auto col-lg-5 col-md-6 col-12 mb-3 py-3">
        <div class="prodContent products p-2">
          <h3> Connexion Admin </h3>

          <?php
            if(isset($_SESSION['flash']) && !empty($_SESSION['flash'])): ?>
              <div class="text-center bg-danger zIndex-99 text-light flash py-2 px-4" style="border-top-right-radius:10px;border-top-left-radius:10px">
                  <?= $_SESSION['flash'] ?>
              </div>
            <?php unset($_SESSION['flash']); ?>
          <?php endif ?>

          <form action="logic/auth.php" method="post">
              <div class="mb-3">
                  <label for=""> Email </label>
                  <input class="col-12" type="email" name="email" id="" placeholder="">
              </div>
              <div class="mb-3">
                  <label for=""> Mot de passe </label>
                  <input class="col-12" type="password" name="password" id="" placeholder="">
              </div>
              <button class="bgGround"> Se connecter </button>
          </form>

        </div>
      </div>
    </main>
    
    <?php require_once('./footer.php'); ?>

    <script src="./src/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./src/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
  </body>

</html>

<style>
  form input[type] {
  border-radius: 5px !important;
  padding: 10px 20px;
  border: 1px solid whitesmoke !important;
}
button {
  border: 1px solid whitesmoke !important;
}
.cards {
  padding: 10px;
}
.cards img {
  height: 150px;
  width: 100%;
  background: whitesmoke;
}
.cards .content {
  padding: 10px;
  background: whitesmoke;
}
.cards .content h4,
.cards .content h6,
.cards .content p { padding: 0;margin:0;}

.cards .content button {
  padding: 5px 15px;
}
.topLabel {
  padding: 5px 10px;
  background: whitesmoke;
}
.bgGround {
  background-color: blue !important;
}
.topLabelS {
  display: flex;
  justify-content: space-between;
  padding: 5px 15px;
}
.topLabelS a {
  color: white;
}
</style>