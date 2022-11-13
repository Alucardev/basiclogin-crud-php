<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
      <a class="navbar-brand ps-3" href="index.php">E-BookShop</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <?php 
            if(isset($_SESSION['nombre'])){?>  
            <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                    </ul>
             </li>
        <?php } ?>
      </ul>
</nav>

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light bg-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Libros
                            </a>
                            <?php 
                                if(isset($_SESSION['nombre'])){
                                    if($_SESSION['rol'] == 'Administrador'){
                            ?>
                           
                            <a class="nav-link" href="crud_page.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                                Admin Panel
                            </a>

                            <?php }} ?>
                            <a class="nav-link" href="contact_page.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-inbox"></i></div>
                                Contacto
                            </a>

                            <?php 
                                if(!isset($_SESSION['nombre'])){

                            ?>
                           
                           <a class="nav-link" href="login_page.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Ingresar
                            </a>

                            <?php } ?>

                        </div>
                    </div>

                    <?php
                           if(isset($_SESSION['nombre'])){ 
                            ?>
                            <div class="sb-sidenav-footer bg-primary" style="color: white;">
                                 <div class="small">Logeado como:</div>
                             <?php
                            echo $_SESSION['nombre'], " ",  $_SESSION['apellido'];
                            ?>
                            </div>
                            <?php }  ?>
                </nav>

            </div>