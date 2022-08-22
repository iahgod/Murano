<?=$render('partials/headerAdmin', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Lista de grupos']);?>

<?=$render('components/pagetittle', ['title'=>'Grupos', 'breadcrumb'=>['Grupos', 'Lista']]);?>

<section class="section">
    <div class="row">

    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-11"><h5 class="card-title">Grupos</h5></div>
                <div class="col-1 d-flex align-items-center justify-content-end"><a href="<?=$base;?>/admin/grupos/form" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Novo </a></div>
            </div>
            <!-- Tabela -->
            <table class="tabela">
                <thead>
                    <tr class="table-info text-dark">
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $item):?>
                    <tr>
                        <th scope="row"><?=$item['id']?></th>
                        <td><?=$item['descricao']?></td>
                        <td>
                            <a href="<?=$base;?>/admin/Grupos/form/<?=$item['id']?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar </a>
                            <a href="#" type="button" onclick="certeza('<?=$base;?>/admin/Grupos/delete/<?=$item['id']?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir </a>
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

<?=$render('partials/footer', ['loggedUser'=>$loggedUser]);?>