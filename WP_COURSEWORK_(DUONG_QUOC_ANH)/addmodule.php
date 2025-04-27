<?php
if(isset($_POST['add_module'])){
    try{
        include_once 'includes/DatabaseConnection.php';
        include_once 'includes/DatabaseFunctions.php';
        addmodule($pdo, $_POST['module_name']);
        // include '/includes/uploadfile.php';
        header('location: questions.php');
      
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include_once 'includes/DatabaseConnection.php';
    include_once 'includes/DatabaseFunctions.php';
    $title = 'Add a new module';
    $users = allUsers($pdo); 
    $modules = allModules($pdo);
    ob_start();
    include 'templates/addmodule.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
