<?php

require_once "./database.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!empty($_GET['id'])) {
        $idTodo = htmlentities($_GET['id']);

        $statementEdit = $pdo->prepare("DELETE FROM todo_list WHERE id = :id LIMIT 1");
        $statementEdit->bindValue(":id", $idTodo, PDO::PARAM_INT);
        $statementEdit->execute();
    }
}

header("Location: /");