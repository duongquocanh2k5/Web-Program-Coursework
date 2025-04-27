<?php 
function totalquestions($pdo){
    $query = query($pdo, 'SELECT COUNT(*)FROM question');
    $row = $query->fetch();
    return $row[0];
} 

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function getquestion($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo,'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function updatequestion($pdo, $questionid, $ask, $questionimg) {
    $query = 'UPDATE question SET ask = :ask, questionimg = :questionimg WHERE id = :id';
    $parameters = [':ask' => $ask, ':questionimg'=>$questionimg, ':id' => $questionid];
    query($pdo, $query, $parameters);
}

function deletequestion($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}

function insertquestion($pdo, $ask, $userid, $moduleid, $questionimg) {
    $query = 'INSERT INTO question (ask, userid, moduleid, questionimg)
              VALUES (:ask, :userid, :moduleid, :questionimg)';
    $parameters = [':ask' => $ask, ':userid' => $userid, ':moduleid' => $moduleid, ':questionimg' => $questionimg];
    query($pdo, $query, $parameters);
}


function allUsers($pdo){
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}

function allModules($pdo){
    $modules = query($pdo, 'SELECT * FROM  module');
    return $modules->fetchAll();
}

function allquestions($pdo){
    $questions = query($pdo, 'SELECT *, question.id as questid FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $questions->fetchAll();
}

function addmodule($pdo, $module_name) {
    $query = 'INSERT INTO module (module_name) VALUES (:module_name)';
    $parameters = [':module_name' => $module_name];
    query($pdo, $query, $parameters);
}

function deletemodule($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM module WHERE id = :id', $parameters);



}
function addComment($pdo, $questionId, $userId, $commentText) {
    $query = 'INSERT INTO comments (question_id, user_id, comment_text) 
              VALUES (:questionId, :userId, :commentText)';
    $parameters = [
        ':questionId' => $questionId,
        ':userId' => $userId,
        ':commentText' => $commentText
    ];
    query($pdo, $query, $parameters);
}

function getComments($pdo, $questionId) {
    $query = 'SELECT comments.*, user.name, user.email 
              FROM comments 
              INNER JOIN user ON comments.user_id = user.id 
              WHERE question_id = :questionId 
              ORDER BY date DESC';
    $parameters = [':questionId' => $questionId];
    $result = query($pdo, $query, $parameters);
    return $result->fetchAll();
}

function addUser($pdo, $name, $email) {
    $query = 'INSERT INTO user (name, email) VALUES (:name, :email)';
    $parameters = [
        ':name' => $name,
        ':email' => $email
    ];
    query($pdo, $query, $parameters);
}
?>
