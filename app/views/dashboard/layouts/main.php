<?php
    $URL_ATUAL= "$_SERVER[SCRIPT_NAME]";
    if(!logged()){
        redirect('/login');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR" id="theme" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=ASSETS?>/assets/css/dashboard.css">
    <title><?=$title?></title>
</head>
<body>
    <div class="row container-fluid p-0">
        <div class="col-md-3 menu">
            <div class="d-flex flex-column flex-shrink-0 p-3 menu-dashboar" style="width: 100%; min-height: 100vh">
                <div class="d-flex justify-content-between">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <span class="fs-4">Sistema</span>
                    </a>
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input id="check-darkm" type="checkbox" class="btn-check" autocomplete="off">
                        <label class="btn btn-outline-primary pt-2" for="check-darkm"><i class="fa-solid fa-moon"></i></label>
                    </div>
                </div>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/dashboard/1/" class="nav-link link-dark <?php if($title == 'Dashboard'){echo 'active';}?>" aria-current="page">
                        <i class="fa-solid fa-house me-2"></i>
                        Inicio
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/1/category" class="nav-link link-dark <?php if($title == 'Categoria'){echo 'active';}?>">
                        <i class="fa-solid fa-sitemap me-2"></i>
                        Categorias
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/1/products" class="nav-link link-dark <?php if($title == 'Produtos'){echo 'active';}?>">
                        <i class="fa-solid fa-boxes-stacked me-2"></i>
                        Produtos
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/1/pendingOrders" class="nav-link link-dark <?php if($title == 'Pedidos Pendentes'){echo 'active';}?>">
                        <i class="fa-solid fa-clipboard-question me-2"></i>
                        Pedidos pendentes
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/1/paidOrders" class="nav-link link-dark <?php if($title == 'Pedidos Pagos'){echo 'active';}?>">
                        <i class="fa-solid fa-clipboard-list me-2"></i>
                        Pedidos pagos
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/1/completedOrders" class="nav-link link-dark <?php if($title == 'Pedidos Concluidos'){echo 'active';}?>">
                        <i class="fa-solid fa-clipboard-check me-2"></i>
                        Pedidos concluidos
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/1/clients" class="nav-link link-dark <?php if($title == 'Clientes'){echo 'active';}?>">
                        <i class="fa-solid fa-users me-2"></i>
                        Clientes
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/1/users" class="nav-link link-dark <?php if($title == 'Usuarios'){echo 'active';}?>">
                        <i class="fa-solid fa-id-card me-2"></i>
                        Usuarios
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?=ASSETS?>/assets/img/perfil_standart.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>Admin</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="/dashboard/1/selfConfig">Configurações da Conta</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 p-3 overflow-auto" style="max-height: 100vh">
            <?php require VIEWS.$view?>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="<?=ASSETS?>/assets/js/jquery.mask.js"></script>
    <script src="<?=ASSETS?>/assets/js/script.js"></script>
    <script src="<?=ASSETS?>/assets/js/apiCEP.js"></script>
</body>
</html>