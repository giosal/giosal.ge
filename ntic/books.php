<?php include 'php/books.php';
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
    <title>Documents</title>
</head>
<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a id="title" class="navbar-brand pl-5" href="index.php">Bibliotheque</a>
    <ul class="navbar-nav ml-auto pr-5">
        <?php
            if (isset($_SESSION['username'])) {
                echo "<li class='nav-item nav-link active'>" . $_SESSION['username'] . "</li>";
            } else {
                echo " ";
            }
        ?>
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="documents.php">Documents</a></li>
        <li class="nav-item active"><a class="nav-link" href="books.php">Books</a></li>
        <?php
            if (isset($_SESSION['username'])) {
                echo "<li class='nav-item'><a class='nav-link' href='php/logout.php'>Logout</a></li>";
            } else {
                echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
            }
        ?>
    </ul>
</nav>

<script>
    function showBook() {
        var n = document.getElementById("bookSelect").value;
        var i = '';
        let spacePosition = n.indexOf(' ');
        if (spacePosition === -1)
            i = n;
        else
            i = n.substr(0, spacePosition);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = JSON.parse(this.responseText);
                console.log(result.name);
                var discipline = result.discipline;
                var author = result.author;
                var editor = result.editor;
                var publication_year = result.publication_year;
                var language = result.language.toUpperCase();
                var isbn = result.isbn;
                var name = result.name;

                document.getElementById("discipline").innerHTML = discipline;
                document.getElementById("bookName").innerHTML = name;
                document.getElementById("author").innerHTML = author;
                document.getElementById("addData").innerHTML = editor + " " + publication_year + " " + language + " " + isbn;

            }
        };
        xmlhttp.open("GET", "php/serverbooks.php?isbn=" + i, true);
        xmlhttp.send();


    }
</script>

<div class="container-fluid w-100 mx-auto px-0">
    <div class="w-50 px-0 mx-auto">
        <h1 class="w-50 px-0 mx-auto py-4" style="color: #30465C">Nos documents</h1>
        <select id="bookSelect" onchange="showBook()">
            <?php for ($i=0; $i < count($docs); $i++): ?>
                <option><?php echo $docs[$i]['isbn'] . ' ' .  $docs[$i]['name'];?></option>
            <?php endfor; ?>
        </select>
        <div class="my-3 p-3 bg-white rounded border">
            <div id="discipline" class="border-bottom p-2"></div>
            <h4 id="bookName" class="p-2"></h4>
            <div id="author" class="p-2"></div>
            <div id="addData" class="text-muted px-2"></div>
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