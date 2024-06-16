<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="/assets/css/general.css">

    <?= $this->section('homeCss') ?>
    <?= $this->section('sideBarCss') ?>
    <title><?= $this->e($title) ?></title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #00379E;
        }
    </style>
</head>

<body>
    <?php
        if(!empty($_SESSION)) {
            $this->insert('/templates/sidebar');
        }
    ?>

    <?= $this->section('content') ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/fullcalendar-6.1.14/dist/index.global.min.js"></script>
    <script src="/assets/js/general.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <?= $this->section('fullcalendar') ?>
    <?= $this->section('reservasJs') ?>
    <?= $this->section('delecoesJs') ?>
    <?php 
        if(!empty($_SESSION)) {
            $this->insert('/templates/footer');
        }
    ?>  
</body>
</html>