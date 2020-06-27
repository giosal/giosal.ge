<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="fr-ch" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a514823700.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css?v=155">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>UNIGE - NTIC - TP - George Salukvadze</title>
</head>
<body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a id="title" class="navbar-brand pl-5" href="index.php">Bibliotheque</a>
        <ul class="navbar-nav ml-auto pr-5">
            <?php
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item nav-link active'>" . $_SESSION['username'] . "</li>";
                }
                else {
                    echo " ";
                }
            ?>
            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="documents.php">Documents</a></li>
            <li class="nav-item"><a class="nav-link" href="books.php">Books</a></li>
            <?php
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'><a class='nav-link' href='php/logout.php'>Logout</a></li>";

                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
                }
            ?>
        </ul>
    </nav>

    <div class="container-fluid w-100 mx-auto px-0">
        <div id="back">
            <img src="images/home_bg.jpg" width="100%"/>
            <div id="search" class="text-center">
                <div class="w-50 mx-auto px-0">
                    <h2 class="w-75 mx-auto px-0 py-3">Trouver un document</h2>
                    <div class="input-group w-75 px-0 mx-auto"><input type="text" class="form-control" placeholder="Entrer le document" aria-label="Entrer le document"/></div>
                    <div class="input-group w-25 px-0 py-3 mx-auto"><button class="btn btn-primary w-100" type="button" id="chercher">Chercher</button></div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer text-center mt-auto py-3">
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