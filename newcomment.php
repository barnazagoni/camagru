<?php
    require_once('dao/postDAO.php');
    session_start();
    addComment($_POST['id'], $_POST['text']);
    echo "done. comment posted";
?>