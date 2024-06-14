<?php
$this->layout(
    'master',
    [
        'title' => "$title"
    ]
);
?>

<?php if (isset($data['erro']) && $data['erro']) { ?>
    <div class="alert alert-danger" style="text-align: center;">
        <?= $data['message'] ?>
    </div>
<?php } ?>

<main class="content">
    <form action="/validate" method="POST">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">BEM-VINDO</h3>
                            <hr class="my-4">
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" value="joao.silva@example.com"/>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="senha">Senha</label>
                                <input type="password" id="senha" name="senha" class="form-control form-control-lg" value="$2y$10$E9bU/jCl7FzR/8O4bF6eU.WxG8GyyTtbfThptph/HL8X8u9PvX6yW"/>
                            </div>
                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Lembrar senha </label>
                            </div>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>