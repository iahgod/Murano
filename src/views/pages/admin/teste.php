<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Lista aaaa', 'menu'=>$menu]);?>

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12" style="padding:0;">

                        <div class="card-header">
                            <div class="row justify-content-between align-items-center p-l-10 p-r-10">
                                <div>
                                    <strong>Lista</strong> aaaa
                                </div>
                                <div>
                                    <a href="<?=$base;?>/" type="button" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i> Novo </a>

                                    <a href="<?=$base;?>/" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Novo </a>

                                    <a href="#" type="button" onclick="certeza('<?=$base;?>/excluir/<?=$item['id']?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir </a>

                                    <a href="<?=$base;?>/" type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="form" method="post" enctype="multipart/form-data">

                                <!-- Tabela -->

                            </form>
                        </div>

                        <div class="card-footer">

                        </div>

                    </div>

                </div>

            </div>
</div></div>
                        

<?=$render('footer', ['loggedUser'=>$loggedUser]);?>