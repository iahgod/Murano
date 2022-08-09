<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?=\src\Constant::TITULO_SITE?> - Cadastro</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap.rtl.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap-grid.rtl.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap-reboot.rtl.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap-utilities.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap-utilities.rtl.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css_site/base.css" />
    <link rel="shortcut icon" href="<?=$base;?>/<?=\src\Constant::FAVICON?>">
</head>
<body style="background-image:url('<?=$base;?><?=\src\Constant::IMAGEM_SITE_LOGIN_BACK?>');">

    <div class="container d-flex justify-content-center align-items-center fundo-login" style="height: 100vh;">
    
        <div class="col-xs-12 col-sm-12 col-lg-6">

            <form class="card shadow form_login" method="post" style="padding: 15px">

                <h2><?=\src\Constant::TITULO_SITE?> - Cadastro</h2>
                
                <div class="mb-3 col-8 text-center">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 col-8 text-center">
                    <label for="exampleInputEmail1" class="form-label">E-Mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 col-8 text-center">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 col-8 text-center">
                    <label for="exampleInputPassword1" class="form-label">Repita a senha</label>
                    <input type="password" name="senha2" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex justify-content-evenly col-6 mb-3">
                    <a href="<?=$base;?>/admin/login" class="btn btn-outline-primary">Voltar</a>
                    <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                </div>

                <?php if(!empty($flash)):?>
                    <?=$flash?>
                <?php endif;?>
            </form>
        </div>

    </div>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.esm.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.js"></script>
    </body>
</html>