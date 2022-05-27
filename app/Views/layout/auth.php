<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login/Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('auth/fonts/material-icon/css/material-design-iconic-font.min.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('auth/css/style.css') ?>">
</head>
<body>

    <div class="main">
    <?= $this->renderSection('content') ?>
    </div>

    <!-- JS -->
    <script src="<?= base_url('auth/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('auth/js/main.js') ?>"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>