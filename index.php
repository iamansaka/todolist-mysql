<?php
$error = "";
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
            <form action="/" method="POST">
                <label for="todo" hidden="true"></label>
                <input type="text" name="todo" id="todo" />
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
                    </svg>
                </button>
            </form>
            <p class="text-danger">Coucou error</p>
            <ul class="todo-list">
                <li>
                    <span>Faire du PHP </span>
                    <div class="actions">
                        <a href="#" class="btn btn-success">Valider</a>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>
                </li>
                <li>
                    <span>Nourrir le chat</span>
                    <div class="actions">
                        <a href="#" class="btn btn-success">Valider</a>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>
                </li>
                <li>
                    <span>Faire du JS</span>
                    <div class="actions">
                        <a href="#" class="btn btn-success">Valider</a>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>