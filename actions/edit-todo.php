<?php

require_once "./database.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!empty($_GET['idTodo'])) {

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

        $idTodo = $_GET['idTodo'] ?? "";
        $doneTodo = $_GET['done'] ?? "";

        if ($doneTodo) {
            $statementEdit = $pdo->prepare("UPDATE todo_list SET done = 0 WHERE id = :id");
        } else {
            $statementEdit = $pdo->prepare("UPDATE todo_list SET done = 1 WHERE id = :id");
        }
        $statementEdit->bindValue(":id", $idTodo, PDO::PARAM_INT);
        $statementEdit->execute();
    }
}

header("Location: /");
