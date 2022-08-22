<?=$render('partials/headerAdmin', ['loggedUser'=>$loggedUser, 'title' => $titulo]);?>

<?=$render('components/pagetittle', ['title'=>'Menu', 'breadcrumb'=>['Form', $titulo]]);?>

<section class="section">
    <div class="row">

    <div class="col-lg-6">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Novo menu</h5>

            <a href="https://icons8.com/line-awesome" target="blank">Lista de icones</a><br><br>
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
                       
                         <label for="idpai" class="form-label">Id pai</label>
                         <select class="form-control" name="idpai" id="idpai">
                            <option value="">Nenhum</option>

                            <?php foreach($lista as $item):?>
                                <option value="<?=$item['id'];?>"><?=$item['titulo'];?></option>
                            <?php endforeach;?>

                         </select>
                       
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

    </div>

    </div>
</section>
                        
                        
<?=$render('partials/footer', ['loggedUser'=>$loggedUser]);?>
