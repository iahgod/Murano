<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Lista de Menus', 'menu'=>$menu]);?>

<?=$render('components/pagetittle', ['title'=>'Menus', 'breadcrumb'=>['Sidebar', 'Lista']]);?>

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
                'Titulo', 'Url', 'Ordem', 'Status'
            ],
            'names'=>[
                'titulo'    => ['titulo','text'],
                'url'       => ['url',   'text'],
                'ordem'     => ['ordem', 'text'],
                'ativo'     => ['ativo', 'status'],
            ],
            'dados'=>$Menu, 'pagina'=>'menu', 'btnStatus'=>true, 'btnEditar'=>false, 'deleteP'=>'']);?>

            <h5 class="card-title">Lista de sub-menus</h5>
            
            <!-- Tabela -->
            <?=$render('components/tabela', 
            ['titulos'=>[
                'Titulo', 'Url'
            ],
            'names'=>[
                'titulo'    => ['titulo','text'],
                'url'       => ['url',   'text'],
            ],
            'dados'=>$MenuSub, 'pagina'=>'sub', 'btnStatus'=>false, 'btnEditar'=>false, 'deleteP'=>'admin/Menu/deleteSub']);?>
            

            
        </div>
        </div>

    </div>

    </div>
</section>

                        

<?=$render('footer', ['loggedUser'=>$loggedUser]);?>