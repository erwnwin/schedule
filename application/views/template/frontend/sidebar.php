<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="<?= base_url('home') ?>" class="dropdown-toggle no-arrow <?= $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('jadwal') ?>" class="dropdown-toggle no-arrow <?= $this->uri->segment(1) == 'jadwal' ? 'active' : '' ?>">
                        <span class="micon bi bi-calendar4-week"></span><span class="mtext">Jadwal</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('login') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-signin"></span><span class="mtext">Login</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>