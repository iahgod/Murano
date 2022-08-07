<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>$titulo.' grupo', 'menu'=>$menu]);?>

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                    <div class="card col-12" style="padding:0;">

                        <div class="card-header">
                            <div class="row justify-content-between align-items-center p-l-10 p-r-10">
                                <div>
                                    <strong><?=$titulo?></strong> grupo
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="form" method="post" action="<?=$base;?>/admin/grupos/form" enctype="multipart/form-data" autocomplete="off">

                                <input type="hidden" name="id" value="<?=($grupo) ? $grupo['id'] : '' ;?>">

                                <div class="row">

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="Nome" class=" form-control-label">Nome</label>
                                        <input type="text" id="Nome" value="<?=($grupo) ? $grupo['descricao'] : '' ;?>" name="descricao" placeholder="" class="form-control" required>
                                    </div>
                                    
                                </div>
                                <?php if($grupo):?>
                                <h4 class="mb-1">Permissões</h4>

                                <div class="col-12">
                                    <?php foreach($listaMenus['menus'] as $item):?>

                                        <?php if(in_array($item['id'], $listaMenus['menusUser'])):?>

                                            <div class="form-check">
                                                <input class="form-check-input" name="<?=$item['url']?>" type="checkbox" checked role="switch" id="<?=$item['titulo']?><?=$item['id']?>">
                                                <label class="form-check-label" for="<?=$item['titulo']?><?=$item['id']?>"><?=$item['titulo']?></label>
                                            </div>

                                        <?php else:?>

                                            <div class="form-check">
                                                <input class="form-check-input" name="<?=$item['url']?>" type="checkbox" role="switch" id="<?=$item['titulo']?><?=$item['id']?>">
                                                <label class="form-check-label" for="<?=$item['titulo']?><?=$item['id']?>"><?=$item['titulo']?></label>
                                            </div>

                                        <?php endif;?>

                                    <?php endforeach;?>
                                </div>
                                <?php endif;?>
                                
                            </form>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="document.querySelector('#form').submit()" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Salvar
                            </button>
                            <button type="button" onclick="document.querySelector('#form').reset()" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Resetar
                            </button>
                        </div>

                    </div>

                </div>

            </div>
</div></div>
                        

<?=$render('footer', ['loggedUser'=>$loggedUser]);?>