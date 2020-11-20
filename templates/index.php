<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title>To Do App</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <script src='https://kit.fontawesome.com/d224d393cb.js' crossorigin='anonymous'></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
        <script defer src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
        <script defer src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx' crossorigin='anonymous'></script>
        <style>
            body {
                margin: 50px 0 0 0;
                padding: 0;
                width: 100%;
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                text-align: center;
                color: #aaa;
                font-size: 18px;
            }

            h1 {
                color: lightskyblue;
            }

        </style>
    </head>
    <body>
        <h1>Active</h1>
        <form action='/filterActive' method='get'>
            <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                <label class='btn btn-secondary <?= $_SESSION['categoryFilter'] == 'All' ? 'active' : '' ?>'>
                    <input type='radio' name='categoryFilter' value='All' onChange='this.form.submit()' <?= $_SESSION['categoryFilter'] == 'All' ? 'checked' : '' ?>> All
                </label>
                <label class='btn btn-secondary <?= $_SESSION['categoryFilter'] == 'None' ? 'active' : '' ?>'>
                    <input type='radio' name='categoryFilter' value='None' onChange='this.form.submit()' <?= $_SESSION['categoryFilter'] == 'None' ? 'checked' : '' ?>> None
                </label>
                <label class='btn btn-secondary <?= $_SESSION['categoryFilter'] == 'Personal' ? 'active' : '' ?>'>
                    <input type='radio' name='categoryFilter' value='Personal' onChange='this.form.submit()' <?= $_SESSION['categoryFilter'] == 'Personal' ? 'checked' : '' ?>> Personal
                </label>
                <label class='btn btn-secondary <?= $_SESSION['categoryFilter'] == 'Work' ? 'active' : '' ?>'>
                    <input type='radio' name='categoryFilter' value='Work' onChange='this.form.submit()' <?= $_SESSION['categoryFilter'] == 'Work' ? 'checked' : '' ?>> Work
                </label>
            </div>
        </form>
        <table class='table table-striped table-hover container'>
            <?php
                if ($tasks) { ?>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Category</th>
                            <th>Due</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr onSelect = ''>
                            <td>
                            <?= $task['task'] ?>
                            </td>
                            <td>
                                <i class=' <?= $task['category'] == 'Work' ? 'fas fa-briefcase' : ($task['category'] == 'Personal' ? 'fas fa-walking' : '') ?> '/>
                            </td>
                            <td>
                            <?= $task['due'] ?>
                            </td>
                            <td class='bg-white border-0'>
                            <form action='/edit' method='get'>
                                <input name=' <?= $task['id'] ?>' type='submit' value='Edit'>
                            </form>
                            </td>
                            <td class='bg-white border-0'>
                            <form action='/complete' method='post'>
                                <input name='<?= $task['id'] ?>' type='submit' value='Mark complete'>
                            </form>
                            </td>
                            </tr>
                    <?php endforeach;
                } else {
                    echo 'No active tasks';
                }
            ?>
            </tbody>
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
