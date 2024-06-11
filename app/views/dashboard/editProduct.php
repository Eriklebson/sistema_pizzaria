<div class="row">
    <div class="col-md-9 px-3">
        <h2>Editar produto <?= $product->name ?></h2>
    </div>
    <div class="col-md-3 d-flex justify-content-end">
        <a href="/dashboard/products" data-bs-toggle="tooltip" data-bs-title="Voltar">
            <div class="back text-end mb-3 mx-3">
                <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
            </div>
        </a>
    </div>
</div>
<div class="card p-4">
    <form action="/dashboard/editProduct" method="POST">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="id" id="id" placeholder="id" value="<?=$product->id?>" hidden require>
            </div>
            <div class="col-md-12 p-2">
                <select class="form-select" name="category" aria-label="Default select example">
                    <?php foreach ($categorys as $category) {?>
                        <option value="<?= $category->id ?>" <?php if($product->category == $category->id){echo 'selected';}?>><?= $category->name ?></option>
                    <?php }?>
                </select>
            </div>
            <?=getFlash('category');?>
            <div class="col-md-12 p-2">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome" value="<?= $product->name?>" require>
            </div>
            <?=getFlash('name');?>
            <div class="col-md-12 p-2">
                <div class="input-group mb-3">
                    <span class="input-group-text">R$</span>
                    <input type="text" class="form-control" name="price" id="price" value="<?= number_format($product->price, 2, ',', '') ?>" placeholder="Preço" require>
                </div>
            </div>
            <?=getFlash('price');?>
            <div class="col-md-12 p-2">
                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Descrição" required><?=$product->description?></textarea>
            </div>
            <?=getFlash('description');?>
            <div class="col-md-6 p-2">
                <?=getFlash('success', 'color: green;');?>
                <?=getFlash('error');?>
            </div>
            <div class="col-md-6 p-2 text-end">
                <p class="text-muted">Criada em <?=date_create($product->created_at)->format('d/m/Y - H:i:s')?></p>
                <?php if(isset($product->updated_at)){?>
                <p class="text-muted">Atualizado em <?=date_create($product->updated_at)->format('d/m/Y - H:i:s')?> por <?php 
                    $userBy = findBy('users', 'where id='.$product->updated_by);
                    echo $userBy->name?>
                </p>
                <?php }?>
                <button type="submit" for="editProduct" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </form>
</div>