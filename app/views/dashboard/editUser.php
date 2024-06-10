<div class="row">
    <div class="col-md-6 px-3">
        <h2>Edit User</h2>
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
    <div class="text-center">
        <?=getFlash('error');getFlash('success', 'color: green;');?>
    </div>
    <form action="/dashboard/update" method="POST">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="id" id="id" value="<?=$user->id?>" hidden require>
            </div>
            <div class="col-md-12 p-2">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome" value="<?=$user->name?>" require>
            </div>
            <?=getFlash('name');?>
            <div class="col-md-12 p-2">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Celular" value="<?=$user->phone?>" require>
            </div>
            <?=getFlash('phone');?>
            <div class="col-md-12 p-2">
                <input type="email" class="form-control" name="email" id="email" value="<?=$user->email?>" placeholder="Email" require>
                <p class="verify_email text-danger mb-0 px-2" style="display: none;">Email ja cadastrado</p>
            </div>
            <?=getFlash('email');?>
            <div class="col-md-12 p-2">
                <select class="form-select" name="type_account" id="type_account" aria-label="Default select example">
                    <option value="1" <?php if ($user->type_account == 1) {echo 'selected';} ?>>Admin</option>
                    <option value="2" <?php if ($user->type_account == 2) {echo 'selected';} ?>>Funcionario</option>
                    <option value="3" <?php if ($user->type_account == 3) {echo 'selected';} ?>>Cliente</option>
                </select>
            </div>
            <?=getFlash('type_account');?>
            <div class="col-md-12 p-2">
                <div class="input-group">
                    <input type="text" class="form-control" name="password" id="password" placeholder="Password" aria-label="Recipient's username" aria-describedby="button-addon2" require>
                    <button class="btn btn-outline-secondary" type="button">Gerar</button>
                </div>
            </div>
            <?=getFlash('password');?>
            <div class="col-md-6 p-2">
                <p class="success text-success" style="display: none;">Editado com sucesso</p>
                <p class="error text-danger" style="display: none;">Desculpe não foi possivel editar o usuario, por favor entre em contato com o responsavel do sistema</p>
                <p class="input_null text-danger" style="display: none;">Tem campos vazios</p>
            </div>
            <div class="col-md-6 p-2 text-end">
                <p class="text-muted">Criada em <?=date_create($user->created_at)->format('d/m/Y - H:i:s')?></p>
                <?php if(isset($user->updated_at)){?>
                <p class="text-muted">Atualizado em <?=date_create($user->updated_at)->format('d/m/Y - H:i:s')?> por <?php 
                    $userBy = findBy('users', 'where id='.$user->updated_by);
                    echo $userBy->name?>
                </p>
                <?php }?>
                <button type="submit" for="editUser" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>