<?php
try {
    include_once 'includes/DatabaseConnection.php';
    include_once 'includes/DatabaseFunctions.php';

    if (isset($_POST['submit_comment'])) {
        // Basic validation
        if (empty($_POST['comment_text']) || empty($_POST['question_id']) || empty($_POST['name'])) {
            throw new Exception('Please fill in all fields');
        }

        // Add comment with name instead of user_id
        $query = 'INSERT INTO comments (question_id, name, comment_text, date) 
                 VALUES (:question_id, :name, :comment_text, NOW())';
        
        $params = [
            ':question_id' => $_POST['question_id'],
            ':name' => $_POST['name'],
            ':comment_text' => $_POST['comment_text']
        ];

        query($pdo, $query, $params);
        
        header('location: questions.php');
        exit();
    }
} catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error adding comment: ' . $e->getMessage();
    include 'templates/layout.html.php';
}