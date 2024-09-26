<?php

    session_start();

    if($_POST['username'] == 'user@user.com' && $_POST['pass'] == 'user') {

        $_SESSION['token'] = password_hash(session_id(),PASSWORD_DEFAULT);

        echo json_encode(['token' => "${_SESSION['token']}"]);

    } else {

        echo json_encode(['error' => 'Incorrect name and/or password']);
    }