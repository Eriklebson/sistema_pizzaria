<section>
    <div class="row">
        <div class="col-md-6 px-3">
            <h2>Configuração da conta</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="javascript:history.back()" data-bs-toggle="tooltip" data-bs-title="Voltar">
                <div class="back text-end mb-3 mx-3">
                    <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="card p-4">
        <form action="../controllers/selfEdit.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="../../assets/img/perfil_standart.jpg" alt="" width="300" height="300" class="rounded-circle me-2 mb-3">
                </div>
                <div class="col-md-12 p-2">
                    <div class="input-group">
                        <input type="file" class="form-control" name="photo" id="photo">
                        <label class="input-group-text" for="inputGroupFile02">Photo</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="id" id="id" placeholder="id" value="" hidden>
                </div>
                <div class="col-md-12 p-2">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="">
                </div>
                <div class="col-md-12 p-2">
                    <div class="input-group">
                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" aria-label="Recipient's username" aria-describedby="button-addon2" disabled>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" aria-label="Recipient's username" aria-describedby="button-addon2" disabled>
                        <input type="checkbox" class="btn-check" id="show_password" autocomplete="off">
                        <label class="btn btn-outline-secondary" id="label_show_password" for="show_password" data-bs-toggle="tooltip" data-bs-title="Mostras/Ocutar"><i class="fa-solid fa-eye"></i></label>
                    </div>
                </div>
                <div class="col-md-12 px-2">
                    <p class="px-3 text-danger verify_password" style="display: none;">Senha invalida</p>
                    <p class="px-3 text-danger text-end verify_new_password" style="display: none;">Confirmação de senha deve ser igual a nova senha</p>
                </div>
                <div class="col-md-6 p-2">
                    <p class="success text-success" style="display: none;">Cadastrado com sucesso</p>
                    <p class="error text-danger" style="display: none;">Desculpe não foi possivel cadastrar o usuario, por favor entre em contato com o responsavel do sistema</p>
                    <p class="input_null text-danger" style="display: none;">Tem campos vazios</p>
                </div>
                <div class="col-md-6 p-2 text-end">
                    <button type="submit" id="saveEdit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>