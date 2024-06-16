<?php
    $this->layout(
        'master',
        [
            'title' => "$title"
        ]
    );
?>

<main class="content">
    <div class="container">
        <h1 style="text-align: center;">Relatório</h1>
        <br>
        <br>
        <table class="table table-striped" id="auditoria">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">Sucesso/Falha</th>
                    <th scope="col">Endereço IP</th>
                    <th scope="col">Data login</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value) { ?>
                    <tr>
                        <td><?=$value["username"]?></td>
                        <td><?=$value["success"] == 1 ? '<i class="fas fa-check" style="color: #006b15;"></i>' : '<i class="fas fa-times" style="color: #ff5c5c;"></i>'?></td>
                        <td><?=$value["ip_address"]?></td>
                        <td><?=$value["attempt_time"]?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->start('reservasJs')?>
    <script src="/assets/js/auditoria.js"></script>
<?= $this->stop()?>


