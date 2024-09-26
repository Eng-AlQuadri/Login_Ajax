<?php

    session_start();

    include 'connect.php';

    if(!isset($_SESSION['token'])){

        header('Location:login.php');

        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel='stylesheet' href='./master.css'/>
</head>
<body>

    <div class="dash">
        <div class="container">
            <h2>Your Dashboard</h2>
            <div class="cont">
                <ul class="nav">
                    <li data-item='stuff'>Stuff</li>
                    <li data-item='things'>Things</li>
                    <li data-item='content'>Content</li>
                </ul>
                <div class="dis-content">
                    <h3 id='rcon'>Hello</h3>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src='./jquery.js'></script>

    <script>
        
        $(function() {

            function getDashboardItem(name) {

                $.ajax({
                    url: 'get.dashboard.php',
                    type: 'GET',
                    data: {
                        token: localStorage.getItem('token'),
                        item: name
                    }
                }).then(function(res) {

                    let data = JSON.parse(res);

                    if(!data.auth) {

                        location.href = 'login.php';

                    }

                    $('#rcon').html(data.content);

                });
            }

            $('[data-item]').on('click', function(e) {

                e.preventDefault();

                let dataItem = $(this).attr('data-item');

                getDashboardItem(dataItem);
            })
        })
    </script>
</body>
</html>