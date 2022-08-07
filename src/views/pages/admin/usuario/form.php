<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>$titulo.' usuário', 'menu'=>$menu]);?>

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                    <div class="card col-12" style="padding:0;">

                        <div class="card-header">
                            <div class="row justify-content-between align-items-center p-l-10 p-r-10">
                                <div>
                                    <strong><?=$titulo?></strong> usuário
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="form" method="post" action="<?=$base;?>/admin/usuarios/form" enctype="multipart/form-data" autocomplete="off">

                                <input type="hidden" name="id" value="<?=($User) ? $User['id'] : '' ;?>">

                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="Nome" class=" form-control-label">Nome</label>
                                        <input type="text" id="Nome" value="<?=($User) ? $User['nome'] : '' ;?>" name="nome" placeholder="" class="form-control" required>
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="Email" class=" form-control-label">E-mail</label>
                                        <input type="email" id="Email" value="<?=($User) ? $User['email'] : '' ;?>" name="email" placeholder="" class="form-control" required>
                                    </div>
                                    <?php if(!$User):?>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="Senha" class=" form-control-label">Senha</label>
                                        <input type="text" id="Senha" value="" name="senha" placeholder="" class="form-control" required>
                                    </div>
                                    <?php endif;?>

                                    <div class="form-group col-sm-12 col-md-6">
                                      <label for="grupo" class="form-label">Grupo</label>
                                      <select class="form-control" name="id_grupo" id="grupo">
                                        <?php if($User):?>

                                            <option value="<?=$User['id_grupo']?>"><?=$User['descricao']?></option>

                                            <?php foreach($grupos as $item):?>
                                                <?php if($item['id'] != $User['id_grupo']):?>
                                                <option value="<?=$item['id']?>"><?=$item['descricao']?></option>
                                                <?php endif;?>
                                            <?php endforeach;?>

                                        <?php else: ?>

                                            <?php foreach($grupos as $item):?>
                                                <option value="<?=$item['id']?>"><?=$item['descricao']?></option>
                                            <?php endforeach;?>

                                        <?php endif;?>
                                      </select>
                                    </div>
                                </div>
                                
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