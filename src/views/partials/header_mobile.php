<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?=$base;?>/admin">
                        <img src="<?=$base;?>/<?=\src\Constant::LOGO?>" alt="<?=\src\Constant::TITULO_SITE?>" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <?php foreach($menu as $item):?>
                        <?php if(!$item['sub']):?>

                        <li>
                            <a href="<?=$base.$item['url']?>">
                            <i class="<?=$item['icone']?>"></i><?=$item['titulo']?></a>
                        </li>

                        <?php else:?>

                            <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="<?=$item['icone']?>"></i><?=$item['titulo']?></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <?php foreach($item['sub'] as $sub):?>
                                <li>
                                    <a href="<?=$base.$sub['url']?>"><?=$sub['titulo']?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </li>

                        <?php endif;?>
                    <?php endforeach;?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->