<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GP - LOGIN</title>
    <link rel="icon" href="<?= base_url('img/principal.png') ?>">
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/floating-labels.css') ?>" rel="stylesheet">
</head>

<body>
    <form class="form-signin">
        <div class="row">
            <div class="text-center mb-4">
                <img class="mb-4" src="<?= base_url('img/logo_r.png') ?>" alt="Logo" width="50%">
            </div>
        </div>
        <br>
        <div class="row">

            <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputSenha" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Senha</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2018</p>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>

</html>
