<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <?php if ($this->session->userdata('email')) : ?>
                        <?php if ($title == "Map") : ?>
                            <a class="nav-link text-white" href="<?= base_url('admin'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-map text-white"></i></div>
                                Map
                            </a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= base_url('admin'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-map"></i></div>
                                Map
                            </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($title == "Map") : ?>
                            <a class="nav-link text-white" href="<?= base_url('map'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-map text-white"></i></div>
                                Map
                            </a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= base_url('map'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-map"></i></div>
                                Map
                            </a>
                        <?php endif; ?>
                    <?php endif ?>


                    <?php if ($this->session->userdata('email')) : ?>
                        <?php if ($title == "Add Data Location") : ?>
                            <a class="nav-link text-white" href="<?= base_url('admin/add'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-square-plus text-white"></i></div>
                                Add Data Location
                            </a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= base_url('admin/add'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-square-plus"></i></div>
                                Add Data Location
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('email')) : ?>
                        <?php if ($title == "View Data Location") : ?>
                            <a class="nav-link text-white" href="<?= base_url('admin/data'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-table text-white"></i></div>
                                View Data Location
                            </a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= base_url('admin/data'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-table"></i></div>
                                View Data Location
                            </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($title == "View List Drama") : ?>
                            <a class="nav-link text-white" href="<?= base_url('map/data'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-table text-white"></i></div>
                                View List Drama
                            </a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= base_url('map/data'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-table"></i></div>
                                View List Drama
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('email')) : ?>
                        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">