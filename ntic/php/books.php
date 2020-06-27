<?php
    include "connect.php";
      session_start();

    if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
      header('location: login.php');
    }

    OpenConn();

    $docs = array();

    $query = "SELECT * FROM books";
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($res))
         {
            array_push($docs, $row);
         }

    function getRating($bookID) {
        $conn = OpenConn();
        $rating = 0;
        $comm = array();
        $q1 = "SELECT * FROM comments WHERE book_ID = " . $bookID;
        $res2 = mysqli_query($conn, $q1) or die("database error: ". mysqli_error($conn));
        while($r = mysqli_fetch_assoc($res2)) {
            array_push($comm, $r);
        }
        $temp = 0;
        for ($i = 0; $i < count($comm); $i++) {
            $temp += intval($comm[$i]['evaluation_note']);
        }
        $rating = $temp / count($comm);
        return $rating;
    }

    function countComm($bookID) {
        $conn = OpenConn();
        $c = 0;
        $comm = array();
        $q1 = "SELECT * FROM comments WHERE book_ID = " . $bookID;
        $res2 = mysqli_query($conn, $q1) or die("database error: ". mysqli_error($conn));
        while($r = mysqli_fetch_assoc($res2)) {
            array_push($comm, $r);
        }
        $c = count($comm);
        return $c;
    }

    function getComm($bookID) {
        $conn = OpenConn();
        $comments = array();
        $q = "SELECT * FROM comments WHERE book_ID = " . $bookID;
        $res1 = mysqli_query($conn, $q) or die("database error: ". mysqli_error($conn));
        while($r = mysqli_fetch_assoc($res1)) {
            array_push($comments, $r);
        }
        return $comments;
    }

    function insertComm($bookID, $customer_text, $customer_note, $comment_username ) {

    }

    if (isset($_POST['save_comment'])) {
        $book_ID = mysqli_real_escape_string($conn, $_POST['itemId']);
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $rating = mysqli_real_escape_string($conn, $_POST['rating']);
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $comment_user_ID = 0;
        $commentDate = time();
        $getUserID = "SELECT ID FROM users WHERE email = '" . $username . "'";
        //$username = "giosal90@gmail.com";
        //$comment_user_ID = 1;
        $res = mysqli_query($conn, $getUserID) or die("database error: ". mysqli_error($conn));
        while($rr = mysqli_fetch_assoc($res)) {
            $comment_user_ID = intval($rr['ID']);
        }
        $query = "INSERT INTO comments (book_ID, comment_text, evaluation_note, comment_date, comment_username, comment_user_ID) VALUES(" . $book_ID . ", '" . $comment . "', " . $rating . ", '" . date('Y-m-d H:i:s', time()) . "', '" . $username . "', " . $comment_user_ID . ")";
        $qr = mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
        header('location: ../documents.php');
    }
    CloseConn($conn);

?>