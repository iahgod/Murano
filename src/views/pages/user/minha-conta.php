<?=$render('header', ['loggedUser'=>$loggedUser, 'admin'=>true, 'title'=>'Minha conta', 'menu'=>$menu]);?>

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">

                        <div class="card-header">
                            <strong><?=$loggedUser->nome?></strong> Configurações
                        </div>

                        <div class="card-body">
                            <form id="form" method="post" enctype="multipart/form-data">
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Foto do perfil</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" accept="image/png,image/jpeg" id="file-input" name="foto" class="form-control-file">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nf-nome" class=" form-control-label">Nome</label>
                                    <input type="text" id="nf-nome" value="<?=$loggedUser->nome?>" name="nome" placeholder="Nome completo.." class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="nf-email" class=" form-control-label">E-mail</label>
                                    <input type="email" id="nf-email" disabled value="<?=$loggedUser->email?>" name="nf-email" placeholder="Enter Email.." class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="nf-password" class=" form-control-label">Nova senha</label>
                                    <input type="password" id="nf-password" name="senha1" placeholder="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="nf-password2" class=" form-control-label">Confirme a nova senha</label>
                                    <input type="password" id="nf-password2" name="senha2" placeholder="" class="form-control">
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