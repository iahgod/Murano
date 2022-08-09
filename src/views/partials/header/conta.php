<li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?=$base;?>/assets/uploads/<?=$loggedUser->foto;?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?=$loggedUser->nome;?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?=$loggedUser->nome;?></h6>
          <span><?=$loggedUser->nome;?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="<?=$base;?>/admin/minha-conta">
            <i class="bi bi-person"></i>
            <span>Meu perfil</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="<?=$base;?>/admin/minha-conta">
            <i class="bi bi-gear"></i>
            <span>Configurações da conta</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="<?=$base;?>/">
            <i class="bi bi-question-circle"></i>
            <span>Precisa de ajuda?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="<?=$base;?>/admin/sair">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sair</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->