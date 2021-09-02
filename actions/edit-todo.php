<?php

require_once "./database.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!empty($_GET['id']) && !empty($_GET['done'])) {
        $idTodo = htmlentities($_GET['id']);
        $done = htmlentities($_GET['done']);

        if ($done == !$done) {
            $statementEdit = $pdo->prepare("UPDATE todo_list SET done = :done WHERE id = :id");
            $statementEdit->bindValue(":done", $done, PDO::PARAM_INT);
            $statementEdit->bindValue(":id", $idTodo, PDO::PARAM_INT);
            $statementEdit->execute();
        }
    }
}

header("Location: /");
