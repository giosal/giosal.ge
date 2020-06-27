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
        <li class="nav-item active"><a class="nav-link" href="documents.php">Documents</a></li>
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
    <div class="w-50 px-0 mx-auto">
        <h1 class="w-50 px-0 mx-auto py-4" style="color: #30465C">Nos documents</h1>
        <?php for ($i=0; $i < count($docs); $i++): ?>
        <div class="my-3 p-3 bg-white rounded border">
            <div class="border-bottom p-2"><?php echo ucfirst($docs[$i]['discipline']);?></div>
            <h4 class="p-2"><?php echo $docs[$i]['name'];?></h4>
            <div class="p-2"><?php echo $docs[$i]['author'];?></div>
            <div class="text-muted px-2"><?php print_r($docs[$i]['editor'] . " " . $docs[$i]['publication_year'] . " | " . strtoupper($docs[$i]['language']) . " | " . $docs[$i]['isbn']);?></div>
            <div class="px-2">
                <?php
                    $rating = getRating($i+1);
                    for ($j = 0; $j < round($rating); $j++) {
                        echo "<span class='fa fa-star checked'></span>";
                    }
                    for ($k = 5; $k > round($rating); $k--) {
                        echo "<span class='fa fa-star'></span>";
                    }
                ?>

                <span> <?php $numComm = countComm($i+1); echo $numComm;?> commentaires</span>
            </div>
            <form id="ratingForm" method="post" action="php/books.php">
                <?php $rat = 0;?>
                <div class="form-group">
                    <h4>Note</h4>
                    <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                     </button>
                    <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                    <input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $i+1;?>">
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire*</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" id="saveComment" name="save_comment">Commenter</button>
                </div>
            </form>
            <details class="w-75 mx-auto px-0 text-center">
                <summary style="font-size: 1.75vmin">Afficher tous les commentaires</summary>
                <div class='w-100 mx-auto px-0 text-center border'>
                <?php
                    $comments = getComm($i+1);
                    if ($numComm == 0) {
                        echo "<div class='w-100 mx-auto px-0 text-center border'>Aucun commentaire trouvé</div>";
                    } else {
                        for ($j = 0; $j < $numComm; $j++) {
                            echo "<div class='w-100 mx-auto px-0 text-center border'>
                                    <div class='w-100 mx-auto px-3 text-left'>
                                        <span class='h6'>Commentaire: </span>" . $comments[$j]['comment_text'] . "
                                    </div>
                                    <div class='w-100 mx-auto px-3 text-left'>
                                        par " . $comments[$j]['comment_username'] . "
                                    </div>
                                  </div>";
                        }
                    }

                ?>
                </div>
            </details>
        </div>
        <?php endfor; ?>
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