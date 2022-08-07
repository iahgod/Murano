<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Lista de Menus', 'menu'=>$menu]);?>

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12" style="padding:0;">

                        <div class="card-header">
                            <div class="row justify-content-between align-items-center p-l-10 p-r-10">
                                <div>
                                    <strong>Lista</strong> de Menus
                                </div>
                                <div>
                                    <a href="<?=$base;?>/admin/menu/form" type="button" class="btn btn-success btn-sm">
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
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Url</th>
                                            <th scope="col">Ordem</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($Menu as $item):?>
                                        <tr>
                                            <th scope="row"><?=$item['id']?></th>
                                            <td><?=$item['titulo']?></td>
                                            <td><?=$item['url']?></td>
                                            <td><?=$item['ordem']?></td>
                                            <td><?=($item['ativo'] == 1) ? '<span class="badge bg-success text-white text-wrap">Ativo</span>' : '<span class="badge bg-danger text-white text-wrap">Inativo</span>' ;?></td>
                                            <td>
                                                <a href="<?=$base;?>/admin/Menu/status/<?=$item['id']?>" type="button" class="btn btn-<?=($item['ativo'] == 1)? 'warning' : 'success' ;?> btn-sm"><i class="fas fa-plus"></i> <?=($item['ativo'] == 1)? 'Inativar' : 'Ativar' ;?> </a>
                                                <a href="#" type="button" onclick="certeza('<?=$base;?>/admin/Menu/delete/<?=$item['id']?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                    <thead>
                                        <tr class="table-info text-dark">
                                            <th scope="col"># Menu</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Url</th>
                                            <th colspan="3" scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($MenuSub as $item):?>
                                        <tr class="table-warning">
                                            <th scope="row"><?=$item['id_menu']?></th>
                                            <td><?=$item['titulo']?></td>
                                            <td><?=$item['url']?></td>
                                            <td colspan="3">
                                                <a href="#" type="button" onclick="certeza('<?=$base;?>/admin/Menu/deleteSub/<?=$item['id']?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir </a>
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