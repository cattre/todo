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
        <form action='/update' method='post'>
            <input type='number' name='id' value='<?= $tasks['id'] ?>' hidden>
            <label for='task'>Task</label>
            <input type='text' id='task' name='task' value='<?= $tasks['task'] ?>'>
            <label for='category'>Category</label>
            <select id='category' name='category'>
                <option <?= $tasks['category'] == 'None' ? 'selected' : '' ?>>None</option>
                <option <?= $tasks['category'] == 'Work' ? 'selected' : '' ?>>Work</option>
                <option <?= $tasks['category'] == 'Personal' ? 'selected' : '' ?>>Personal</option>
            </select>
            <label for='due'>Due</label>
            <input type='date' id='due' name='due' value='<?= $tasks['due'] ?>'>
            <input type='submit' value='Update'>
        </form>
        <a href='/'><button>View active tasks</button></a>
    </body>
</html>
