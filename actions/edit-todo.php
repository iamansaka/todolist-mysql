<?php

require_once "./database.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!empty($_GET['id']) && !empty($_GET['done'])) {
        $idTodo = htmlentities($_GET['id']);
        $doneTodo = (int)htmlentities($_GET['done']);
        $doneTodo !== $doneTodo;

        $statementEdit = $pdo->prepare("UPDATE todo_list SET done = :done WHERE id = :id");
        $statementEdit->bindValue(":id", $idTodo, PDO::PARAM_INT);
        $statementEdit->bindValue(":done", $doneTodo, PDO::PARAM_INT);
        $statementEdit->execute();
    }
}

header("Location: /");