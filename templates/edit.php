<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>To Do App</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='css/style.css' type='text/css'>
    </head>
    <body>
        <h1>Edit</h1>
        <form action='/update' method='post'>
            <div class="container">
                <div class="row">
                    <input type='number' name='id' value='<?= $tasks['id'] ?>' hidden>
                </div>
                <div class="row">
                    <label for='task'>Task</label>
                </div>
                <div class="row">
                    <input type='text' id='task' name='task' value='<?= $tasks['task'] ?>'>
                </div>
                <div class="row">
                    <label for='category'>Category</label>
                </div>
                <div class="row">
                    <select id='category' name='category'>
                        <option <?= $tasks['category'] == 'None' ? 'selected' : '' ?>>None</option>
                        <option <?= $tasks['category'] == 'Work' ? 'selected' : '' ?>>Work</option>
                        <option <?= $tasks['category'] == 'Personal' ? 'selected' : '' ?>>Personal</option>
                    </select>
                </div>
                <div class="row">
                    <label for='due'>Due</label>
                </div>
                <div class="row">
                    <input type='date' id='due' name='due' value='<?= $tasks['due'] ?>'>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <input type='submit' value='Update'>
                    </div>
                    <div class="col-sm">
                        <form action='/delete' method='post'>
                            <input type='text' name='page' value='' hidden>
                            <input type='number' name='id' value='<?= $tasks['id'] ?>' hidden>
                            <input type='submit' value='Delete task'>
                        </form>
                    </div>
                </div>
        </form>
        <a href='/'><button>View active tasks</button></a>
    </body>
</html>
