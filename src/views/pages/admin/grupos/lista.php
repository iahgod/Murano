<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Lista de grupos', 'menu'=>$menu]);?>

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12" style="padding:0;">

                        <div class="card-header">
                            <div class="row justify-content-between align-items-center p-l-10 p-r-10">
                                <div>
                                    <strong>Lista</strong> de grupos
                                </div>
                                <div>
                                    <a href="<?=$base;?>/admin/Grupos/form" type="button" class="btn btn-success btn-sm">
                                        <i class="fas fa-plus"></i> Novo
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="form" method="post" enctype="multipart/form-data">

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
                                        <?php foreach($grupos as $item):?>
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

                            </form>
                        </div>

                        <div class="card-footer">

                        </div>

                    </div>

                </div>

            </div>
</div></div>
                        

<?=$render('footer', ['loggedUser'=>$loggedUser]);?>