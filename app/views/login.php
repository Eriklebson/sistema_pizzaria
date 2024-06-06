<section class="vh-auto d-flex align-items-center">
        <div class="container-fluid">
            <div class="container p-5 text-center">
                <div class="card p-5">
                    <h3>Login</h3>
                    <form action="/login" method="POST">
                        <input type="text" name="email" id="email" class="form-control mb-3" placeholder="Email">
                        <input type="Password" name="password" id="password" class="form-control mb-3" placeholder="Password">
                        <?php echo getFlash('verify');?>
                        <div class="d-flex justify-content-between">
                            <a href="/register">Criar conta</a>
                            <input type="submit" class="btn btn-primary" value="Entrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>