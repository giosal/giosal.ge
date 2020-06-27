<?php include "php/connect.php";?>
<!DOCTYPE html>
<html lang="fr-ch" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a514823700.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?v=60">
    <title>Login</title>
</head>
<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a id="title" class="navbar-brand pl-5" href="index.php">Bibliotheque</a>
    <ul class="navbar-nav ml-auto pr-5">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="documents.php">Documents</a></li>
        <li class="nav-item"><a class="nav-link" href="books.php">Books</a></li>
        <li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>
    </ul>
</nav>

<div class="container text-center">
    <div id="login" class="w-75 p-3 mx-auto">
        <form method="post" action="php/connect.php">
            <?php include "php/errors.php";?>
            <h2>Login</h2>
            <div class="input-group w-100 px-0 py-1 mx-auto">Identifiant&nbsp;<input type="email" class="form-control" placeholder="Identifiant" aria-label="Identifiant" name="username"/></div>
            <div class="input-group w-100 px-0 py-1 mx-auto">Mot de passe&nbsp;<input type="password" class="form-control" placeholder="Mot de passe" aria-label="Mot de passe" name="password"/></div>
            <div class="input-group"><button class="btn btn-lg btn-primary btn-block w-25 px-0 py-3 mx-auto" type="submit" name="login_user">Se connecter</button></div>
        </form>
    </div>

</div>
<label><a href="register.php">S'engregistrer</a></label>

<footer class="footer mt-auto text-center py-3">
    <div class="container">
        Bâtiment Batelle A<br/>
        7 route de Drize<br/>
        1227 Carouge<br/>
        Suisse<br/>
        +41 22 379 01 05
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>