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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <h3 classe="text-center text dark mt-2">Service Suivi-évaluation: Archive Monopost en Numerique </h3>
            <hr>
            <?php if(isset($_SESSION['response'])){ ?>
            <div class="alert alert-<?= $_SESSION['res_type']?> alert-dismissible text-center">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <b><?= $_SESSION['response']; ?></b>
            </div>
            <?php } unset($_SESSION['response']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <h3 class="text-center text-info">Ajouter un fichier</h3>
        <form action="action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="form-group">
                <input type="text" name="name"  value="<?= $name; ?>" class="form-control" placeholder="Entrer nom" required>
            </div>
            <div class="form-group">
                <input type="text" name="objet" value="<?= $objet; ?>" class="form-control" placeholder="Entrer objet" required>
            </div>
            <div class="form-group">
                <input type="date" name="date" value="<?= $date; ?>" class="form-control" placeholder="Entrer date" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="oldimage" value="<?= $photo; ?>">
                <input type="file" name="image" class="custom-file">
                <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
            </div>
            <div class="form-group">
              <?php if($update==true){ ?>
                <input type="submit" name="update" class="btn btn-success btn-block" value="Enregistrer la modification!">
              <?php } else{ ?>
                <input type="submit" name="add" class="btn btn-primary btn-block" value="Enregistrer">
              <?php } ?>
              </div>
        </form>
        </div>
        <div class="col-md-8">
        <?php 
          $query="SELECT * FROM onepost";
          $stmt=$conn->prepare($query);
          $stmt->execute();
          $result=$stmt->get_result();
        ?>
        <h3 class="text-center text-info">Information de tous les fichiers enregistrés</h3>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Objet</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row=$result->fetch_assoc()){ ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><img src="<?= $row['photo']; ?>" width="50"></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['objet']; ?></td>
                <td>
                <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> I
                <a href="action.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Voulez-vous supprimer ce fichier?');">Delete</a> I
                <a href="index.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>
</body>
<html>
