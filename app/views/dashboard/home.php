<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <?php if(in_array(user()->type_account, [1])){?>
            <div class="col-md-6">
                <a href="dashboard/category">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                        <i class="fa-solid fa-sitemap fs-0"></i>
                        <p class="fs-2 mt-2">Categorias</p>
                    </div>
                </a>
            </div>
            <?php } if(in_array(user()->type_account, [1, 2])){?>
            <div class="col-md-6">
                <a href="dashboard/products">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                    <i class="fa-solid fa-boxes-stacked fs-0"></i>
                        <p class="fs-2 mt-2">Produtos</p>
                    </div>
                </a>
            </div>
            <?php }?>
            <div class="col-md-6">
                <a href="dashboard/pendingOrders">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                        <i class="fa-solid fa-clipboard-question fs-0"></i>
                        <p class="fs-2 mt-2">Pedidos pendentes</p>
                    </div>
                </a>
            </div>
            <?php if(in_array(user()->type_account, [1, 2])){?>
            <div class="col-md-6">
                <a href="dashboard/paidOrders">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                        <i class="fa-solid fa-clipboard-list fs-0"></i>
                        <p class="fs-2 mt-2">Pedidos pagos</p>
                    </div>
                </a>
            </div>
            <?php }?>
            <div class="col-md-6">
                <a href="dashboard/completedOrders">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                        <i class="fa-solid fa-clipboard-check fs-0"></i>
                        <p class="fs-2 mt-2">Pedidos concluidos</p>
                    </div>
                </a>
            </div>
            <?php if(in_array(user()->type_account, [1, 2])){?>
            <div class="col-md-6">
                <a href="dashboard/clients">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                        <i class="fa-solid fa-users fs-0"></i>
                        <p class="fs-2 mt-2">Clientes</p>
                    </div>
                </a>
            </div>
            <?php }if(in_array(user()->type_account, [1])){?>
            <div class="col-md-6">
                <a href="dashboard/users">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                        <i class="fa-solid fa-id-card fs-0"></i>
                        <p class="fs-2 mt-2">Usuarios</p>
                    </div>
                </a>
            </div>
            <?php }?>
            <div class="col-md-6">
                <a href="dashboard/selfConfig">
                    <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                        <i class="fa-solid fa-gears fs-0"></i>
                        <p class="fs-2 mt-2">Configurações</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>