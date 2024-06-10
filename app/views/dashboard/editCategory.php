<div class="card px-4 py-2 mb-3">
    <h3>Editar categoria:</h3>
    <form action="/dashboard/editCategory" method="POST">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="id" id="id" value="<?=$category->id?>" hidden require>
            </div>
            <div class="col-md-12 p-2">
                <input type="text" class="form-control" name="name" id="name" placeholder="Categoria" value="<?=$category->name?>" require>
                <div class="text-center">
                    <?= getFlash('success', 'color: green;'); ?>
                    <?= getFlash('error'); ?>
                    <?= getFlash('name'); ?>
                </div>
            </div>
            <div class="col-md-12 p-2 text-end">
            <p class="text-muted">Criada em <?=date_create($category->created_at)->format('d/m/Y - H:i:s')?></p>
                <?php if(isset($category->updated_at)){?>
                <p class="text-muted">Atualizado em <?=date_create($category->updated_at)->format('d/m/Y - H:i:s')?> por <?php 
                    $userBy = findBy('users', 'where id='.$category->updated_by);
                    echo $userBy->name?>
                </p>
                <?php }?>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </form>
</div>