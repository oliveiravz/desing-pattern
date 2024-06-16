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
        <h1 style="text-align: center;">Moradores Cadastrados</h1>
        <br>
        <br>
        <table class="table table-striped" id="moradores">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">E-mail 2</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Apartamento</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Telefone 2</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $morador) {?>
                    <tr>
                        <td><?=$morador["nome"]?></td>
                        <td><?=$morador["email"]?></td>
                        <td><?=$morador["email_dois"]?></td>
                        <td><?=$morador["cpf"]?></td>
                        <td><?=$morador["nome_apartamento"]?></td>
                        <td><?=$morador["telefone"]?></td>
                        <td><?=$morador["telefone_dois"]?></td>
                        <td>
                            <button class="btn btn-danger btn-sm excluir_morador" id="excluir_<?=$morador["id_morador"]?>" data-id_morador="<?=$morador["id_morador"]?>" data-id_morador="<?=$_SESSION["user"]["id_morador"]?>">Excluir</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->start('moradoresJs')?>
    <script src="/assets/js/moradores.js"></script>
<?= $this->stop()?>

