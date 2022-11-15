<?php
  session_start();
  include 'config.php';
  
  $update=false;
  $id="";
  $name="";
  $objet="";
  $date="";
  $photo="";

  if(isset($_POST['add'])){
    $name=$_POST['name'];
    $date=$_POST['date'];
    $objet=$_POST['objet'];

    $photo=$_FILES['image']['name'];
    $upload="uploads/".$photo;

    $query="INSERT INTO onepost(name,date,objet,photo)VALUES(?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ssss",$name,$date,$objet,$upload);
    $stmt->execute();
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);

    header('location:index.php');
    $_SESSION['response']="Insertion dans la base avec Succès!";
    $_SESSION['res_type']="success";
  }
  if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $sql="SELECT photo FROM onepost WHERE id=?";
    $stmt2=$conn->prepare($sql);
    $stmt2->bind_param("i",$id);
    $stmt2->execute();
    $result2=$stmt2->get_result();
    $row=$result2->fetch_assoc();

    $imagepath=$row['photo'];
    unlink($imagepath);

    $query="DELETE FROM onepost WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('location:index.php');
    $_SESSION['response']=" Suppression dans la base avec Succès!";
    $_SESSION['res_type']="danger";
  }  
  if(isset($_GET['edit'])){
    $id=$_GET['edit'];

    $query="SELECT * FROM onepost WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $id=$row['id'];
    $name=$row['name'];
    $objet=$row['objet'];
    $date=$row['date'];
    $photo=$row['photo'];

    $update=true;
  }
  if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $objet=$_POST['objet'];
    $date=$_POST['date'];
    $oldimage=$_POST['oldimage'];

    if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
      $newimage="uploads/".$_FILES['image']['name'];
      unlink($oldimage);
      move_uploaded_file($_FILES['image']['tmp_name'],$newimage);
    }
    else{
      $newimage=$oldimage;
    }
    $query="UPDATE onepost SET name=?,objet=?,date=?,photo=? WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ssssi",$name,$objet,$date,$newimage,$id);
    $stmt->execute();

    $_SESSION['response']="Modification avec Succès!";
    $_SESSION['res_type']="primary";
    header('location:index.php');
  }

  if(isset($_GET['details'])){
    $id=$_GET['details'];
    $query="SELECT * FROM onepost WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $vid=$row['id'];
    $vname=$row['name'];
    $vobjet=$row['objet']; 
    $vdate=$row['date'];
    $vphoto=$row['photo'];
  }
?> 