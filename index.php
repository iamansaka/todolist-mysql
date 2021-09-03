<?php

session_start();
require_once "./actions/database.php";

$todos = [];
$statementAll = $pdo->prepare("SELECT * FROM todo_list");
$statementAll->execute();
$todos = $statementAll->fetchAll();

echo "<pre>";
print_r($todos);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once "./includes/head.php" ?>
    <title>Todo List</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Todo<span>list</span></h1>
            <form action="actions/add-todo.php" method="POST">
                <label for="todo" hidden="true"></label>
                <input type="text" name="todo" id="todo" />
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
                    </svg>
                </button>
            </form>
            <?php if (isset($_SESSION['error'])) : ?>
                <p class="text-danger"><?= $error ?></p>
            <?php unset($_SESSION['error']); endif; ?>
            <ul class="todo-list">
                <?php foreach ($todos as $todo) : ?>
                <li>
                    <span class="<?= $todo['done'] ? "done" : "" ?>"><?= $todo['name'] ?></span>
                    <div class="actions">
                        <a href="/actions/edit-todo.php?idTodo=<?= $todo['id'] ?>&amp;done=<?= $todo['done'] ?>" class="btn btn-<?= $todo['done'] ? "secondary" : "success" ?>"><?= $todo['done'] ? "Annuler" : "Valider" ?></a>
                        <a href="/actions/delete-todo.php?id=<?= $todo['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>