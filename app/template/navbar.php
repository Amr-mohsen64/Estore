<div class="top_navbar">
    <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
    <div class="top_menu">
        <div class="logo"><a href="/index"><?= @$text_dashboard?></</a></div>
        <ul>
            <li>
                <a class="my-nav-link" href="/language"><i class="fas fa-globe"></i> <?= @$text_change_language?></a>
            </li>
            <li>
                <span class="nav-link text-primary">wlecome <?= $this->session->u->Profile->FirstName ?></span>
            </li>
            <li class="dropdown">
            
                <a class="dropdown-toggle my-nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="">
                    <a class="dropdown-item" href="#">البينات الشخصية <i class="fas fa-user"></i></a>
                    <a class="dropdown-item" href="#">تغير كلمة المرور <i class="fas fa-key"></i></a>
                    <a class="dropdown-item" href="#">اعدادات الحساب <i class="fas fa-cog"></i></a>
                    <a class="dropdown-item" href="/auth/logout"><?= @$text_log_out?> <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </li>
        </ul>
    </div>
</div>
