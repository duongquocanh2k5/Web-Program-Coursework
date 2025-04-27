<?php
if(isset($_POST['add_user'])){
    try{
        include_once 'includes/DatabaseConnection.php';
        include_once 'includes/DatabaseFunctions.php';
        
        addUser($pdo, $_POST['name'], $_POST['email']);
        header('location: questions.php');
        exit();
      
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include_once 'includes/DatabaseConnection.php';
    include_once 'includes/DatabaseFunctions.php';
    $title = 'Add a new user';
    ob_start();
    include 'templates/adduser.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';

