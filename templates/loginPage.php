<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>To Do App</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <style>
            body {
                margin: 50px 0 0 0;
                padding: 0;
                width: 100%;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                text-align: center;
                color: #aaa;
                font-size: 18px;
            }

            h1 {
                color: lightskyblue;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 50px;
                margin-bottom: 0;
            }

            table {
                margin-left:auto;
                margin-right:auto;
            }

            .Work {
                background-color: indianred;
                color: white;
            }

            .Personal {
                background-color: lightyellow;
                color: black;
            }

            button {
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Login</h1>
        <form action='/login' method='post'>
            <label for='username'>Username</label>
            <input id='username' type='text' name='username'>
            <label for='password'>Password</label>
            <input id='password' type='text' name='password'>
            <input type='submit' value='Login'>
            <p class='loginError'><?= $error ?></p>
        </form>
    </body>
</html>
