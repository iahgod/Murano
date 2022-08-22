<?=$render('partials/headerAdmin/head', ['loggedUser'=>$loggedUser, 'title' => $title]);?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="<?=$base;?>/admin" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block"><?=\src\Constant::TITULO_SITE?></span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<?=$render('partials/headerAdmin/pesquisa', ['loggedUser'=>$loggedUser]);?>
<?=$render('partials/headerAdmin/notificacoes', ['loggedUser'=>$loggedUser]);?>
<?=$render('partials/headerAdmin/mensagens', ['loggedUser'=>$loggedUser]);?>
<?=$render('partials/headerAdmin/conta', ['loggedUser'=>$loggedUser]);?>
    
</ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<?=$render('partials/headerAdmin/sidebar', ['loggedUser'=>$loggedUser]);?>