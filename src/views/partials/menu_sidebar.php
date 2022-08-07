<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?=$base;?>/admin">
                    <img src="<?=$base;?>/<?=\src\Constant::LOGO?>" alt="<?=\src\Constant::TITULO_SITE?>" />
                </a>
            </div>
            
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
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
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->