<?php
  include 'action.php';  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Herz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>SSE Monopost</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">SSE Monopost</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <!--<ul class="navbar-nav">
      <li c lass="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>  -->
  </div>
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3 bg-info p-4 rounded">
            <h2 class="bg-light p-2 rounded text-center text-dark">ID :<?= $vid; ?></h2>
            <div class="text-center">
                <img src="<?= $vphoto; ?>" width="500" class="img-thumbnail">
            </div>
            <h4 class="text-light">Name : <?= $vname; ?></h4>
            <h4 class="text-light">Objet : <?= $vobjet; ?></h4>
            <h4 class="text-light">Date : <?= $vdate; ?></h4>
        </div>
    </div>
</div>
</body>
<html>