<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>$titulo.' - Menu', 'menu'=>$menu]);?>

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12" style="padding:0;">

                        <div class="card-header">
                            <div class="row justify-content-between align-items-center p-l-10 p-r-10">
                                <div>
                                    <strong>Menu</strong> <?=$titulo;?>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="form1" action="<?=$base;?>/admin/Menu/form" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="titulo" class=" form-control-label">Titulo</label>
                                        <input type="text" id="titulo" value="" name="titulo" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="url" class=" form-control-label">Url</label>
                                        <input type="text" id="url" value="/" name="url" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="icone" class=" form-control-label">Icone</label>
                                        <input type="text" id="icone" value="" name="icone" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="ordem" class=" form-control-label">Ordem</label>
                                        <input type="number" id="ordem" value="" name="ordem" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="ativo" class=" form-control-label">Status</label>
                                        <select class="form-control" name="ativo" id="ativo">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                          </select>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="document.querySelector('#form1').submit()" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Salvar
                            </button>
                            <button type="button" onclick="document.querySelector('#form').reset()" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Resetar
                            </button>
                        </div>

                    </div>

                    <div class="card col-12" style="padding:0;">

                        <div class="card-header">
                            <div class="row justify-content-between align-items-center p-l-10 p-r-10">
                                <div>
                                    <strong>Sub-Menu</strong> <?=$titulo;?>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="form" action="<?=$base;?>/admin/Menu/formSub" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="titulo" class=" form-control-label">Titulo</label>
                                        <input type="text" id="titulo" value="" name="titulo" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="url" class=" form-control-label">Url</label>
                                        <input type="text" id="url" value="" name="url" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="id_menu" class=" form-control-label">Menu pai</label>
                                        <select class="form-control" name="id_menu" id="id_menu">
                                            <option value="" selected disabled>Selecione</option>
                                            <?php foreach($Menu as $item):?>
                                                <option value="<?=$item['id']?>"><?=$item['titulo']?></option>
                                            <?php endforeach;?>
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