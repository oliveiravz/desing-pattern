<?php
    $this->layout(
        'master',
        [
            'title' => "$title"
        ]
    );
?>
<?= $this->start('reservasCss')?>
    <script src="/assets/css/reservas.css"></script>
<?= $this->stop()?>
<main class="content">
    <div class="container">
        <h1 style="text-align: center;">Relatório</h1>
        <br>
        <br>
        <table class="table table-striped" id="reservas">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Área Reservada</th>
                    <th scope="col">Dia da reserva</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $reservas) {?>
                    <tr>
                        <td><?=$reservas["nome"]?></td>
                        <td><?=$reservas["data_reserva"]?></td>
                        <td>
                            <button class="btn btn-danger btn-sm excluir_reserva" id="excluir_<?=$reservas["id_reservas"]?>" data-id_reserva="<?=$reservas["id_reservas"]?>">Excluir</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->start('reservasJs')?>
    <script src="/assets/js/reservas.js"></script>
<?= $this->stop()?>

