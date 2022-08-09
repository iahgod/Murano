<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Lista de usuários', 'menu'=>$menu]);?>

<?=$render('components/pagetittle', ['title'=>'Usuários', 'breadcrumb'=>['Usuários', 'Lista']]);?>




<section class="section">
    <div class="row">

    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-11"><h5 class="card-title">Usuários</h5></div>
                <div class="col-1 d-flex align-items-center justify-content-end"><a href="<?=$base;?>/admin/usuarios/form" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Novo </a></div>
            </div>
            <!-- Tabela -->
            <?=$render('components/tabela', 
            ['titulos'=>[
                'Nome', 'E-Mail', 'Grupo', 'Criado em'
            ],
            'names'=>[
                'nome'      => ['nome',      'text'],
                'email'     => ['email',     'text'],
                'descricao' => ['descricao', 'text'],
                'criado_em' => ['criado_em', 'data'],
            ],
            'dados'=>$usuarios, 'pagina'=>'usuarios', 'btnStatus'=>false, 'btnEditar'=>true, 'deleteP'=>'']);?>
            
        </div>
        </div>

    </div>

    </div>
</section>                   

<?=$render('footer', ['loggedUser'=>$loggedUser]);?>