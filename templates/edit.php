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
                color: mediumseagreen;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 50px;
                margin-bottom: 0;
            }

            table {
                margin-left:auto;
                margin-right:auto;
            }

            button {
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Edit</h1>
        <form action='/update' method='get'>
            <input type='number' name='id' value='<?= $tasks['id'] ?>' hidden>
            <input type='text' name='task' value='<?= $tasks['task'] ?>'>
            <input type='submit' value='Update'>
        </form>
        <a href='/'><button>View active tasks</button></a>
    </body>
</html>
