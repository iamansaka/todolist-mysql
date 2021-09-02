<?php
session_start();
require_once "./database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['todo'])) {
        $todo = htmlentities($_POST['todo']);

        if (mb_strlen($todo) < 5) {
            $_SESSION['error'] = "Le champs doit faire au moins 5 caractères";
        } else {
            $statement = $pdo->prepare("INSERT INTO todo_list VALUES(DEFAULT, :name, :done)");
            $statement->bindValue(":name", $todo, PDO::PARAM_STR);
            $statement->bindValue(":done", 0, PDO::PARAM_INT);
            $statement->execute();
        }
    } else {
        $_SESSION['error'] = "Veuillez renseigner les champs !";
    }
}

header("Location: /");