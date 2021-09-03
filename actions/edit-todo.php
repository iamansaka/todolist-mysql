<?php

require_once "./database.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!empty($_GET['idTodo']) && !empty($_GET['done'])) {

        $idTodo = (int)htmlentities($_GET['idTodo']);
        $doneTodo = (int)htmlentities($_GET['done']);
        $doneTodo = !$doneTodo;

        $statementEdit = $pdo->prepare("UPDATE todo_list SET done = :done WHERE id = :id");
        $statementEdit->bindValue(":done", $doneTodo, PDO::PARAM_INT);
        $statementEdit->bindValue(":id", $idTodo, PDO::PARAM_INT);
        $statementEdit->execute();
    }
}

header("Location: /");
