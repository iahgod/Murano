<?=$render('header/head', ['loggedUser'=>$loggedUser, 'title' => $title]);?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="<?=$base;?>/admin" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block"><?=\src\Constant::TITULO_SITE?></span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<?=$render('header/pesquisa', ['loggedUser'=>$loggedUser]);?>
<?=$render('header/notificacoes', ['loggedUser'=>$loggedUser]);?>
<?=$render('header/mensagens', ['loggedUser'=>$loggedUser]);?>
<?=$render('header/conta', ['loggedUser'=>$loggedUser]);?>
    
</ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<?=$render('header/sidebar', ['loggedUser'=>$loggedUser]);?>