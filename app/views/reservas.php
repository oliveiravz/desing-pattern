<?php
    $this->layout(
        'master',
        [
            'title' => "$title"
        ]
    );    

    $admin = false;
    foreach ($data as $key => $value) {
        if(isset($value['nome_morador'])) {
            $admin = true;
        }
    }

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
                    <?php if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] && $admin) { ?>
                        <th scope="col">Nome morador</th>
                    <?php } ?>
                    <th scope="col">Área Reservada</th>
                    <th scope="col">Dia da reserva</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $reservas) {?>
                    <tr>
                        <?php if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] && $admin) { ?>
                            <td><?=$reservas["nome_morador"]?></td>
                        <?php } ?>
                        <td><?=$reservas["nome"]?></td>
                        <td><?=$reservas["data_reserva"]?></td>
                        <td>
                            <button class="btn btn-danger btn-sm excluir_reserva" id="excluir_<?=$reservas["id_reservas"]?>" data-id_reserva="<?=$reservas["id_reservas"]?>" data-id_morador="<?=$_SESSION["user"]["id_morador"]?>">Excluir</button>
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

