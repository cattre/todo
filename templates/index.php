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

            button {
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Active</h1>
        <table>
            <?php
                if ($tasks) {
                    foreach ($tasks as $task) {
                        echo
                            '<tr>'.
                                '<td>'.
                                    $task['task'].
                                '</td>'.
                                '<td>'.
                                    '<form action="/edit" method="get"><input name="'.$task['id'].'" type="submit" value="Edit"></form>'.
                                '</td>'.
                                '<td>'.
                                    '<form action="/complete" method="post"><input name="'.$task['id'].'" type="submit" value="Mark complete"></form>'.
                                '</td>'.
                            '</tr>';
                    }
                } else {
                    echo 'No active tasks';
                }
            ?>
        </table>
        <form action='/add' method='post'>
            <label for='newTask'>Add a task</label>
            <input id='newTask' type='text' name='task'>
            <input type='submit'>
        </form>
        <a href='/completed'><button>View completed tasks</button></a>
    </body>
</html>
