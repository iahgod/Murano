<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Lista de usuários', 'menu'=>$menu]);?>

<?=$render('components/pagetittle', ['title'=>'Home', 'breadcrumb'=>['Usuários', 'Lista']]);?>

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
            <table class="tabela">
                <thead>
                    <tr class="table-info text-dark">
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $item):?>
                    <tr>
                        <th scope="row"><?=$item['id']?></th>
                        <td><?=$item['nome']?></td>
                        <td><?=$item['email']?></td>
                        <td><?=$item['descricao']?></td>
                        <td><?=date( 'd/m/Y' , strtotime($item['criado_em']))?></td>
                        <td>
                            <a href="<?=$base;?>/admin/usuarios/form/<?=$item['id']?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar </a>
                            <a href="#" type="button" onclick="certeza('<?=$base;?>/admin/usuarios/delete/<?=$item['id']?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        </div>

    </div>

    </div>
</section>                   

<?=$render('footer', ['loggedUser'=>$loggedUser]);?>