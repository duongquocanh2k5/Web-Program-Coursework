<?php
try {
    include_once 'includes/DatabaseConnection.php';
    include_once 'includes/DatabaseFunctions.php';
    
    if (isset($_POST['delete_module'])) {
        deletemodule($pdo, $_POST['id']);
        header('location: questions.php');
        exit();
    } else {
        $title = 'Delete Module';
        $modules = allModules($pdo);
        ob_start();
        include 'templates/deletemodule.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete module: ' . $e->getMessage();
}

include 'templates/layout.html.php';