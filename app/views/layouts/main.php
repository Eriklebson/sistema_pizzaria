<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ASSETS?>/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title><?=$title?></title>
</head>
<body>
    <nav class="container-fluid p-3 menu-horizontal">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0"><i class="fa-solid title fa-pizza-slice me-1 active"></i>Pizza</h3>
                    <small class="text-uppercase active">delicous</small>
                </div>
                <div class="d-flex">
                    <div class="desktop justify-content-end align-items-center">
                        <a href="/" class="me-5 fw-semibold <?php if($title == 'Home'){echo 'active';}?>">Home</a>
                        <a href="/menu" class="me-5 fw-semibold <?php if($title == 'Cardápio'){echo 'active';}?>">Cardápio</a>
                        <a href="/about" class="me-5 fw-semibold <?php if($title == 'Sobre'){echo 'active';}?>">Sobre</a>
                        <a href="/contact" class="me-5 fw-semibold <?php if($title == 'Contato'){echo 'active';}?>">Contato</a>
                        <?php if(logged()){?>
                            <a href="/dashboard/<?php echo user()->id;?>/" class="me-5 fw-semibold">Painel De Controle</a>
                        <?php } else{?>
                            <a href="/login" class="me-5 fw-semibold">Login</a>
                        <?php }?>
                    </div>
                    <div class="cart">
                        <a href="/generateOrder" class="me-5 fw-semibold <?php if($title == 'Comanda'){echo 'active';}?>"><i class="fa-solid fa-cart-shopping"></i></a>
                        <p class="count-cart">4</p>
                    </div>
                    <div class="text-end mobile">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item"><a class="nav-link <?php if($title == 'Home'){echo 'active';}?>" href="/">Home</a></li>
                                    <li class="nav-item"><a class="nav-link <?php if($title == 'Cardápio'){echo 'active';}?>" href="/menu">Cardápio</a></li>
                                    <li class="nav-item"><a class="nav-link <?php if($title == 'Sobre'){echo 'active';}?>" href="/about">Sobre</a></li>
                                    <li class="nav-item"><a class="nav-link <?php if($title == 'Contato'){echo 'active';}?>" href="/contact">Contato</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php if($title != 'login' && $title != 'Comanda'){?>
    <header class="container-fluid text-center banner">
        <h1 class="mb-0"><i class="fa-solid fa-pizza-slice me-1 active title"></i>Pizza</h1>
        <small class="text-uppercase active fs-4">delicous</small>
    </header>
    <?php } require VIEWS.$view?>
    <footer class="container-fluid mb-0 p-4">
        <div class="container text-center">
            <p>Copyright &copy;2024 Todos direitos reservados | Configurado Por Eriklebson</p>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="<?=ASSETS?>/assets/js/jquery.mask.js"></script>
    <script src="<?=ASSETS?>/assets/js/script.js"></script>
    <script src="<?=ASSETS?>/assets/js/apiCEP.js"></script>
</body>
</html>