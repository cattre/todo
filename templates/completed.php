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
        <h1>Completed</h1>
        <table>
            <?php
            echo
                '<tr>
                    <th>Task</th>
                    <th>Due</th>
                </tr>';
            if ($tasks) {
                foreach ($tasks as $task) {
                    echo
                        '<tr class="'.$task['category'].'">'.
                            '<td>'.
                            $task['task'].
                            '</td>'.
                            '<td>'.
                            $task['due'].
                            '</td>'.
                            '<td>'.
                                '<form action="/reopen" method="post"><input name="'.$task['id'].'" type="submit" value="Reopen"></form>'.
                            '</td>'.
                            '<td>'.
                                '<form action="/delete" method="post"><input name="'.$task['id'].'" type="submit" value="Delete"></form>'.
                            '</td>'.
                        '</tr>';
                }
            } else {
                echo 'No completed tasks';
            }
            ?>
        </table>
        <a href='/'><button>View active tasks</button></a>
    </body>
</html>
