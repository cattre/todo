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
        <h1>Active</h1>
        <form action='/filterActive' method='get'>
            <label for='category'>Filter by category</label>
            <select id='category' name='categoryFilter' onchange='this.form.submit()'>
                <option <?= $_SESSION['categoryFilter'] == 'All' ? 'selected' : '' ?>>All</option>
                <option <?php if(isset($_SESSION['categoryFilter']) && $_SESSION['categoryFilter'] == 'None'){ echo 'selected';}else{ echo '';} ?>>None</option>
                <option <?php if(isset($_SESSION['categoryFilter']) && $_SESSION['categoryFilter'] == 'Work'){ echo 'selected';}else{ echo '';} ?>>Work</option>
                <option <?php if(isset($_SESSION['categoryFilter']) && $_SESSION['categoryFilter'] == 'Personal'){ echo 'selected';}else{ echo '';} ?>>Personal</option>
            </select>
        </form>
        <table>
            <?php
            if ($tasks) { ?>
                <tr>
                    <th>Task</th>
                    <th>Category</th>
                    <th>Due</th>
                </tr>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td>
                            <?= $task['task'] ?>
                        </td>
                        <td>
                            <i class=' <?= $task['category'] == 'Work' ? 'fas fa-briefcase' : ($task['category'] == 'Personal' ? 'fas fa-walking' : '') ?> '/>
                        </td>
                        <td>
                            <?= $task['due'] ?>
                        </td>
                        <td>
                            <form action='/edit' method='get'>
                                <input name=' <?= $task['id'] ?>' type='submit' value='Edit'>
                            </form>
                        </td>
                        <td>
                            <form action='/complete' method='post'><input name='<?= $task['id'] ?>' type='submit' value='Mark complete'></form>
                        </td>
                    </tr>
                <?php endforeach;
            } else {
                echo 'No active tasks';
            }
            ?>
        </table>
        <a href='/completed'><button>View completed tasks</button></a>
        <h2>Add a new task</h2>
        <form action='/add' method='post'>
            <label for='task'>Task</label>
            <input id='task' type='text' name='task'>
            <label for='category'>Category</label>
            <select id='category' name='category'>
                <option selected>None</option>
                <option>Work</option>
                <option>Personal</option>
            </select>
            <label for='due'>Due</label>
            <input id='due' type='date' name='due'>
            <input type='submit' value='Add task'>
        </form>
        <form action='/logout' method='post'><input type='submit' value='Log out'></form>
    </body>
</html>
