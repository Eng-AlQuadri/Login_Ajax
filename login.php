<?php

    ob_start();

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel='stylesheet' href='./master.css'/>
    </head>
    <body>
        
    <div class="login">
        <div class="container">
            <form action="" id='login-form'>
                <h2>Login</h2>
                <div class="error-msg">
                    <h4 class='' id='err'>error</h4>
                </div>
                <div class="fields">
                    <label for="">Username</label>
                    <input type="text" name='username' id='name' >
                </div>
                <div class="fields">
                    <label for="">Password</label>
                    <input type="password" name='pass' id='pass'>
                </div>
                <button class='login-btn'>Login</button>
            </form>
        </div>
    </div>
        <script src='./jquery.js'></script>
        <script>
            
            $('#login-form').on('submit',function(e) {

                e.preventDefault();

                let error = $('#err');

                $.ajax({

                    url: 'do.login.php',
                    type: 'POST',
                    data: $(this).serialize()

                }).then(function(res) {

                    let data = JSON.parse(res);

                    if(data.error) {

                        error.addClass('show').html(data.error);

                        return;
                    }

                    localStorage.setItem('token',data.token);

                    location.href = 'index.php';

                }).fail(function(res) {
                    error.addClass('show').html('error attempting to sign in.');
                })

            })
        </script>
    </body>
    </html>





<?php

    ob_end_flush();

?>