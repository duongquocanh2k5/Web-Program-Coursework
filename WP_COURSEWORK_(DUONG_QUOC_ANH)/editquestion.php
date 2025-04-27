<?php
include_once 'includes/DatabaseConnection.php';
include_once 'includes/DatabaseFunctions.php';
try{
    if(isset($_POST['ask'])){
        updatequestion($pdo, $_POST['questionid'], $_POST['ask'],$_POST['questionimg']);
        header('location: questions.php');     
    }else{ 
        $question = getquestion($pdo, $_GET['id']);
        $title = 'Edit Questions';

        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing question: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>