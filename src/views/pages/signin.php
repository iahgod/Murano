<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?=\src\Constant::TITULO_SITE?> - Entrar</title>
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
            <form class="card shadow form_login " method="post" style="padding: 15px">

                <h2><?=\src\Constant::TITULO_SITE?> - Entrar</h2>
                
                <div class="mb-3 col-8 text-center">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>

                <div class="mb-3 col-8 text-center">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="senha">
                </div>
                
                <div class="d-flex justify-content-evenly col-6 mb-3" >
                    <?php if(\src\Constant::ADMIN_CADASTRO):?>
                    <a href="<?=$base;?>/admin/cadastro" class="btn btn-outline-primary">Cadastrar</a>
                    <?php endif;?>
                    <button type="submit" class="btn btn-outline-success">Entrar</button>
                </div>
                
                <?php if(!empty($flash)):?>
                <?=$flash?>
                <?php endif;?>
                <a href="<?=$base;?>/admin/esqueceu-senha" style="text-decoration:none;color:#000;">Esqueceu a senha?</a>
            </form>
        </div>

    </div>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.esm.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=$base;?>/sweetalert2/dist/sweetalert2.all.min.js"></script>
    </body>
</html>