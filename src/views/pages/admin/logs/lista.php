<?=$render('partials/headerAdmin', ['loggedUser'=>$loggedUser, 'title' => $titulo]);?>

<?=$render('components/pagetittle', ['title'=>'LOGS', 'breadcrumb'=>['lista']]);?>

<section class="section">
    <div class="row">

      <div class="col-lg-12">

          <div class="card">
            <div class="card-body p-4">
                <?=$render('components/tabela', 
                ['titulos'=>[
                    'Usuario', 'Tipo', '', 'Data'
                ],
                'names'=>[
                    'usuario' => ['nome','text'],
                    'Tipo'    => ['tipo','text'],
                    ''        => ['tabela',   'text'],
                    'data'    => ['data', 'data'],
                ],
                'dados'=>$lista, 'pagina'=>'menu', 'btnStatus'=>false, 'btnEditar'=>false, 'deleteP'=>'', 'podeExcluir'=>false]);?>
            </div>
          </div>

      </div>

    </div>

</section>
                        
                        
<?=$render('partials/footer', ['loggedUser'=>$loggedUser]);?>
