<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <?php
    $menu = $_SESSION['UsuarioMenu'];
  ?>

<?php foreach($menu as $item):?>
    <?php if(!$item['sub']):?>
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?=$base.$item['url']?>">
            <i class="<?=$item['icone']?>"></i>
            <span><?=$item['titulo']?></span>
            </a>
        </li>

    <?php else:?>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav<?=$item['id']?>" data-bs-toggle="collapse" href="#">
            <i class="<?=$item['icone']?>"></i><span><?=$item['titulo']?></span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav<?=$item['id']?>" class="nav-content collapse" data-bs-parent="#sidebar-nav<?=$item['id']?>">
            <?php foreach($item['sub'] as $sub):?>
            <li>
                <a href="<?=$base.$sub['url']?>">
                <i class="bi bi-circle"></i><span><?=$sub['titulo']?></span>
                </a>
            </li>
            <?php endforeach;?>
            </ul>
        </li>

    <?php endif;?>

<?php endforeach;?>

</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">