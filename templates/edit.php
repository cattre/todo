<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <title>Edit task</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <script src='https://kit.fontawesome.com/d224d393cb.js' crossorigin='anonymous'></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
        <link rel='stylesheet' href='css/style.css' type='text/css'>
        <script defer src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
        <script defer src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx' crossorigin='anonymous'></script>
    </head>
    <body>
        <div class='vertical-center'>
            <div class='container'>
            <h1 class='text-center'>Edit task</h1>
                <div class='row justify-content-md-center'>
                    <form action='/' method='get'>
                        <input type='submit' value='Back' class='btn btn-warning'>
                    </form>
                </div>
                <form action='/update' method='post'>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <input type='number' class='form-control' name='id' value='<?= $tasks['id'] ?>' hidden>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <label for='task'>Task</label>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <input type='text' class='form-control' id='task' name='task' value='<?= $tasks['task'] ?>'>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <label for='category'>Category</label>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <select id='category' class='form-control' name='category'>
                                <option <?= $tasks['category'] == 'None' ? 'selected' : '' ?>>None</option>
                                <option <?= $tasks['category'] == 'Work' ? 'selected' : '' ?>>Work</option>
                                <option <?= $tasks['category'] == 'Personal' ? 'selected' : '' ?>>Personal</option>
                            </select>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <label for='due'>Due</label>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <input type='date' class='form-control' id='due' name='due' value='<?= $tasks['due'] ?>'>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-row text-center col-lg-4'>
                            <div class='col'>
                                <input type='submit' class='btn btn-success' value='Update'>
                            </div>
                            <div class='col'>
                                <form action='/delete' method='post'>
                                    <input type='text' name='page' value='' hidden>
                                    <input type='number' name='id' value='<?= $tasks['id'] ?>' hidden>
                                    <input type='submit' class='btn btn-danger' value='Delete'>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
