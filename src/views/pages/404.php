<?=$render('partials/headerAdmin/head', ['title'=>'Página não encontrada']);?>

<main>
    <div class="container">

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>404</h1>
            <h2>A página que você está procurando não existe.</h2>
            <a class="btn" href="<?=$base;?>">Voltar para o início</a>
            <img src="<?=$base;?>/assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        </section>

    </div>
</main><!-- End #main -->

<?=$render('partials/footer_end');?>