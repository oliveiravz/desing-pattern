<?php
$this->layout(
    'master',
    [
        'title' => "Cadastro de Apartamento"
    ]
);
?>

<?php if (isset($data['erro']) && $data['erro']) { ?>
    <div class="alert alert-danger" style="text-align: center;">
        <?= $data['message'] ?>
    </div>
<?php } ?>

<main class="content">
    <form action="/saveApartment" method="POST">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Cadastro de Apartamento</h3>
                            <hr class="my-4">
                            <!-- Campo oculto para o ID do apartamento, usado apenas para edição -->
                            <?php if (isset($data['apartamento']['id_apartamento'])) { ?>
                                <input type="hidden" id="id_apartamento" name="id_apartamento" value="<?= $data['apartamento']['id_apartamento'] ?>"/>
                            <?php } ?>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="descricao">Descrição</label>
                                <input type="text" id="descricao" name="descricao" class="form-control form-control-lg" value="<?= $data['apartamento']['descricao'] ?? '' ?>" required/>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
