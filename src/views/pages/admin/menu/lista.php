<?=$render('partials/headerAdmin', ['loggedUser'=>$loggedUser, 'title' => $titulo]);?>

<?=$render('components/pagetittle', ['title'=>$titulo, 'breadcrumb'=>['Lista']]);?>

<section class="section">
    <div class="row">

    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            
            <div class="row">
                <div class="col-11"><h5 class="card-title">Lista de menus</h5></div>
                <div class="col-1 d-flex align-items-center justify-content-end"><a href="<?=$base;?>/admin/menu/form" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Novo </a></div>
            </div>
            
            <!-- Tabela -->
            <?=$render('components/tabela', 
            ['titulos'=>[
                'Titulo', 'Menu Pai', 'Url', 'Ordem', 'Status'
            ],
            'names'=>[
                'titulo'    => ['titulo','text'],
                'id_pai'    => ['id_pai','text'],
                'url'       => ['url',   'text'],
                'ordem'     => ['ordem', 'text'],
                'ativo'     => ['ativo', 'status'],
            ],
            'dados'=>$lista, 'pagina'=>'menu', 'btnStatus'=>true, 'btnEditar'=>false, 'deleteP'=>'', 'podeExcluir'=>true]);?>
            

            
        </div>
        </div>

    </div>

    </div>
</section>
                        
                        
<?=$render('partials/footer', ['loggedUser'=>$loggedUser]);?>
