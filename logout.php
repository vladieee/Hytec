<?php
    session_start();

    // session_unset('admin_id');
    session_destroy();
    echo header("Location: login.html");
?>