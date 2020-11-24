<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
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
        <div class='vertical-center'>
            <div class='container'>
                <h1 class='text-center'>Tasks</h1>
                <form action='/login' method='post'>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-4'>
                            <label for='username'>Username</label>
                            <input id='username' class='form-control' type='text' name='username'>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group justify-content-md-center col-lg-4'>
                            <label for='password'>Password</label>
                            <input id='password' class='form-control' type='password' name='password'>
                        </div>
                    </div>
                    <div class='row justify-content-md-center'>
                        <div class='form-group col-lg-2'>
                            <input type='submit' class='form-control btn btn-success' value='Login'>
                        </div>
                    </div>
                    <p class='text-center loginError text-danger'><?= $error ?></p>
                </form>
            </div>
        </div>
    </body>
</html>
