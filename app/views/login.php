<?php
$this->layout(
    'master',
    [
        'title' => "$title"
    ]
);
?>

<style>
.content::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: url('/assets/images/background.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    filter: blur(5px);
    z-index: -1;
}

.content {
    position: relative; 
    min-height: 100vh; 
}
.logo{
    max-width: 300px; 
    height: auto; 
}
</style>

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
                            <img src="/assets/images/logo2.png" alt="Logo" class="logo">
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" value=""/>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="senha">Senha</label>
                                <input type="password" id="senha" name="senha" class="form-control form-control-lg" value=""/>
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