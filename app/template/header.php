
<header class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">البينات الشخصية <i class="fas fa-user"></i></a>
                    <a class="dropdown-item" href="#">تغير كلمة المرور <i class="fas fa-key"></i></a>
                    <a class="dropdown-item" href="#">اعدادات الحساب <i class="fas fa-cog"></i></a>
                    <a class="dropdown-item" href="#"><?= @$text_log_out?> <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-envelope"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/language"><i class="fas fa-globe"></i> <?= @$text_change_language?></a>
            </li>
        </ul>
        <a class="navbar-brand ml-auto" href="/index"><?= @$text_dashboard?></a>
        <i class="fas fa-bars" id="menue-btn"></i>
    </div>

</header>
