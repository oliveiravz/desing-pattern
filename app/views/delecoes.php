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
        <h1 style="text-align: center;">Relatório de Deleções</h1>
        <br>
        <br>
        <table class="table table-striped" id="delecoes">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Deletado por: </th>
                    <th scope="col">O que foi deletado?</th>
                    <th scope="col">Endereço IP</th>
                    <th scope="col">Data deletado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value) { ?>
                    <tr>
                        <td><?=$value["nome"]?></td>
                        <td><?=ucfirst($value["table_name"])?></td>
                        <td><?=$value["ip_address"]?></td>
                        <td><?=$value["deleted_at"]?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->start('delecoesJs')?>
    <script src="/assets/js/delecoes.js"></script>
<?= $this->stop()?>