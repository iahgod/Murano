<?=$render('partials/headerAdmin/head', ['title'=>$titulo]);?>

<main style="background-image:url('<?=$base;?><?=\src\Constant::IMAGEM_SITE_LOGIN_BACK?>');background-size: cover;background-position: center;">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block"><?=\src\Constant::TITULO_SITE?></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Esqueceu a senha</h5>
                    <p class="text-center small">Insira seu e-mail abaixo</p>
                  </div>

                  <form action="" method="post" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="nome" class="form-label">Nome</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="nome">N</span>
                        <input type="text" name="nome" class="form-control" id="nome" required>
                        <div class="invalid-feedback">Insira o seu nome.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">E-mail</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="email">@</span>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Insira o seu e-mail.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="senha" class="form-label">Senha</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="senha">*</span>
                        <input type="password" name="senha" class="form-control" id="senha" required>
                        <div class="invalid-feedback">Insira o sua senha.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="senha2" class="form-label">Repita a senha</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="senha2">*</span>
                        <input type="password" name="senha2" class="form-control" id="senha2" required>
                        <div class="invalid-feedback">Confirme a sua senha.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Cadastrar</button>
                    </div>
                    <a href="<?=$base;?>/admin/login" style="text-decoration:none;color:#000;">Voltar</a>
                  </form>

                </div>
              </div>

              <div class="credits text-center">
                Desenvolvido por <strong><span><a href="https://www.iahgod.com.br" target="_blank" rel="noopener noreferrer">@iahgod</a></span></strong><br>
                
                <span style="font-size:12px;">Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></span>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

<?=$render('partials/footer_end');?>