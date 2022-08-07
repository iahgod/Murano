<?=$render('head', ['loggedUser'=>$loggedUser, 'title' => $title]);?>

<?php if($admin):?>

    <?=$render('header_mobile', ['loggedUser'=>$loggedUser, 'menu' => $menu]);?>

    <?=$render('menu_sidebar', ['loggedUser'=>$loggedUser, 'menu' => $menu]);?>

    <!-- PAGE CONTAINER-->
    <div class="page-container">

    <?=$render('header_principal', ['loggedUser'=>$loggedUser]);?>

 <?php endif;?>