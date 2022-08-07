<!-- HEADER DESKTOP-->
<header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap justify-content-end">
                            <div class="header-button">
                                <div class="noti-wrap">
                                    
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?=$base;?>/assets/uploads/<?=$loggedUser->foto;?>" alt="<?=$loggedUser->nome;?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?=$loggedUser->nome;?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="<?=$base;?>/admin/minha-conta">
                                                        <img src="<?=$base;?>/assets/uploads/<?=$loggedUser->foto;?>" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?=$loggedUser->nome;?></a>
                                                    </h5>
                                                    <span class="email"><?=$loggedUser->email;?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                    <a href="<?=$base;?>/admin/minha-conta">
                                                        <i class="zmdi zmdi-account"></i>Minha conta</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?=$base;?>/admin/configuracoes">
                                                        <i class="zmdi zmdi-settings"></i>Configurações</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?=$base;?>/admin/financeiro">
                                                        <i class="zmdi zmdi-money-box"></i>Financeiro</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?=$base;?>/admin/sair">
                                                    <i class="zmdi zmdi-power"></i>Sair</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->