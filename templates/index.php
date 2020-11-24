<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title>Tasks</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <script src='https://kit.fontawesome.com/d224d393cb.js' crossorigin='anonymous'></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
        <link rel='stylesheet' href='css/style.css' type='text/css'>
        <script defer src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
        <script defer src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx' crossorigin='anonymous'></script>
        <script defer src='js/editTask.js'></script>
        <script defer src='js/completedTasks.js'></script>
    </head>
    <body>
        <div class='d-flex flex-row-reverse'>
            <form action='/logout' method='post'>
                <input type='submit' value='Log out' class='btn btn-warning m-4'>
            </form>
        </div>
        <h1 class='text-center'>Tasks</h1>
        <div class='container text-center my-2'>
            <form action='/categoryFilter' method='get'>
                <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                    <label class='btn btn-secondary <?= $_SESSION['category'] == '%' ? 'active' : '' ?>'>
                        <input type='radio' name='category' value='%' onChange='this.form.submit()' <?= $_SESSION['category'] == '%' ? 'checked' : '' ?>> All
                    </label>
                    <label class='btn btn-secondary <?= $_SESSION['category'] == 'None' ? 'active' : '' ?>'>
                        <input type='radio' name='category' value='None' onChange='this.form.submit()' <?= $_SESSION['category'] == 'None' ? 'checked' : '' ?>> None
                    </label>
                    <label class='btn btn-secondary <?= $_SESSION['category'] == 'Personal' ? 'active' : '' ?>'>
                        <input type='radio' name='category' value='Personal' onChange='this.form.submit()' <?= $_SESSION['category'] == 'Personal' ? 'checked' : '' ?>> Personal
                    </label>
                    <label class='btn btn-secondary <?= $_SESSION['category'] == 'Work' ? 'active' : '' ?>'>
                        <input type='radio' name='category' value='Work' onChange='this.form.submit()' <?= $_SESSION['category'] == 'Work' ? 'checked' : '' ?>> Work
                    </label>
                </div>
            </form>
        </div>
        <table class='table text-light container'>
            <?php if ($tasks) { ?>
                <thead>
                    <tr>
                        <th>Completed</th>
                        <th>Task</th>
                        <th>Category</th>
                        <th>Due</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task):
                        if ($task['completed'] == '0') { ?>
                            <tr class='task' id='<?= $task['id'] ?>'>
                                <td>
                                    <form action='/toggleStatus' method='post'>
                                        <input name='<?= $task['id'] ?>' type='checkbox' class='checkbox-round' <?= $task['completed'] == '1' ? 'checked' : '' ?> onChange='this.form.submit()'>
                                        <input name='<?= $task['id'] ?>' type='number' hidden>
                                    </form>
                                </td>
                                <td>
                                <?= $task['task'] ?>
                                </td>
                                <td>
                                    <i <?= $task['category'] == 'Work' ? 'class="fas fa-briefcase" alt="Work" title="Work"' : ($task['category'] == 'Personal' ? 'class="fas fa-walking" alt="Personal" title="Personal"' : '') ?> '/>
                                </td>
                                <td>
                                <?= $task['due'] ?>
                                </td>
                            </tr>
                        <?php }
                    endforeach;
            } else {
                echo 'No active tasks';
            } ?>
                    <tr>
                        <form action='/add' method='post'>
                            <td>
                            </td>
                            <td>
                                <input id='task' type='text' name='task'>
                            </td>
                            <td>
                                <select id='category' name='category'>
                                    <option selected>None</option>
                                    <option>Work</option>
                                    <option>Personal</option>
                                </select>
                            </td>
                            <td>
                                <input id='due' type='date' name='due'>
                            </td>
                            <td>
                                <input type='submit' value='Add task'>
                            </td>
                        </form>
                    </tr>
                </tbody>
        </table>
        <div class='container'>
            <button data-toggle='collapse' type='button' class='btn btn-primary collapse-header' data-target='#completed' aria-expanded='false' aria-controls='completed'>
                <h4>Completed [count]</h4><i class='fas fa-chevron-up'></i>
            </button>
            <div id='completed' class='collapse'>
                <div class='card card-body bg-transparent'>
                    <table class='table text-white'>
                        <?php if ($tasks) { ?>
                            <thead>
                                <tr>
                                    <th>Completed</th>
                                    <th>Task</th>
                                    <th>Category</th>
                                    <th>Due</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tasks as $task):
                                    if ($task['completed'] == '1') { ?>
                                        <tr class='task' id='<?= $task['id'] ?>'>
                                            <td>
                                                <form action='/toggleStatus' method='post'>
                                                    <input name='<?= $task['id'] ?>' type='checkbox' class='checkbox-round' <?= $task['completed'] == '1' ? 'checked' : '' ?> onChange='this.form.submit()'>
                                                    <input name='<?= $task['id'] ?>' type='number' hidden>
                                                </form>
                                            </td>
                                            <td>
                                                <?= $task['task'] ?>
                                            </td>
                                            <td>
                                                <i <?= $task['category'] == 'Work' ? 'class="fas fa-briefcase" alt="Work" title="Work"' : ($task['category'] == 'Personal' ? 'class="fas fa-walking" alt="Personal" title="Personal"' : '') ?> '/>
                                            </td>
                                            <td>
                                                <?= $task['due'] ?>
                                            </td>
                                        </tr>
                                    <?php }
                                endforeach;
                        } else {
                            echo 'No active tasks';
                        } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
