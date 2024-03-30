<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $major = $_POST["major"];



try {
    require_once "database.php";
   
    $query = "INSERT INTO roster (firstname, lastname, email, major) VALUES (?,?,?,?);";

    $stmt = $pdo->prepare($query);
    
    $result=$stmt -> execute([$firstname, $lastname, $email, $major]);
  
    if($result == "TRUE"){
        $_SESSION['status']= "";
        header ("Location: roster.php");
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>';
    }

    $pdo=null;
    $stmt =null;

    

   
    
    }catch (PDOException $e){
        die("Query failed:" . $e->getMessage());
    }

} else{
    header("Location: /index.html");
}






