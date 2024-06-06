<section class="vh-auto d-flex align-items-center pt-5">
        <div class="container-fluid pt-5">
            <div class="container p-5 text-center">
                <div class="card p-5">
                    <?=getFlash('message');?>
                    <h3>Login</h3>
                    <form action="/register" method="POST">
                        <input type="text" name="name" id="name" class="form-control mt-3" placeholder="Nome">
                        <?=getFlash('name');?>
                        <input type="text" name="email" id="email" class="form-control mt-3" placeholder="Email">
                        <?=getFlash('email');?>
                        <input type="text" name="phone" id="phone" class="form-control mt-3" placeholder="Celular">
                        <?=getFlash('phone');?>
                        <input type="Password" name="password" id="password" class="form-control mt-3" placeholder="Senha">
                        <?=getFlash('password');?>
                        <input type="Password" name="password_conf" id="password_conf" class="form-control mt-3" placeholder="Confirmação de senha">
                        <?=getFlash('password_conf');?>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="/login">Entrar</a>
                            <input type="submit" class="btn btn-primary" value="Criar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>