<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Minha conta', 'menu'=>$menu]);?>

<?=$render('components/pagetittle', ['title'=>'Home', 'breadcrumb'=>['Minha conta']]);?>

<section class="section">
    <div class="row">

    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?=$loggedUser->nome?> - Configurações</h5>

            <form id="form" method="post" enctype="multipart/form-data">

                <div class="form-group col-1 d-flex flex-column align-items-center justify-content-between">
                    <img src="<?=$base;?>/assets/uploads/<?=$loggedUser->foto;?>" height="80" width="80" alt="Profile" class="rounded-circle">
                    <label for="file-input" class="form-control-label bg-info mt-1 rounded-1"><i style="font-size:30px;" class="text-light las la-upload"></i></label>
                    <input type="file" accept="image/png,image/jpeg" id="file-input" name="foto" class="form-control-file d-none">
                </div>
                

                <div class="row">

                    <div class="form-group col-lg-6 mt-1">
                        <label for="nf-nome" class=" form-control-label">Nome</label>
                        <input type="text" id="nf-nome" value="<?=$loggedUser->nome?>" name="nome" placeholder="Nome completo.." class="form-control">
                    </div>

                    <div class="form-group col-lg-6 mt-1">
                        <label for="nf-email" class=" form-control-label">E-mail</label>
                        <input type="email" id="nf-email" disabled value="<?=$loggedUser->email?>" name="nf-email" placeholder="Enter Email.." class="form-control">
                    </div>

                    <div class="form-group col-lg-6 mt-1">
                        <label for="nf-password" class=" form-control-label">Nova senha</label>
                        <input type="password" id="nf-password" name="senha1" placeholder="" class="form-control">
                    </div>

                    <div class="form-group col-lg-6 mt-1">
                        <label for="nf-password2" class=" form-control-label">Confirme a nova senha</label>
                        <input type="password" id="nf-password2" name="senha2" placeholder="" class="form-control">
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
</section>
                        
                        
<?=$render('footer', ['loggedUser'=>$loggedUser]);?>