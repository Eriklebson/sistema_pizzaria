<div class="row">
    <div class="col-md-6 px-3">
        <h2>Add Product</h2>
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
    <form action="/dashboard/addProduct" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12" hidden>
                <input type="text" class="form-control" name="id_user" id="id_user" placeholder="id_user" value="<?= $_GET['id'] ?>" require>
            </div>
            <div class="col-md-12 p-2">
                <label for="formFileMultiple" class="form-label">Imagens</label>
                <input class="form-control" type="file" id="imagens" name="imagens[]" multiple require>
            </div>
            <div class="col-md-12 p-2">
                <select class="form-select" name="category" aria-label="Default select example" require>
                    <?php foreach ($categorys as $category) {?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-md-12 p-2">
                <input type="text" class="form-control" name="name" id="name" placeholder="Titulo" require>
                <?=getFlash('name');?>
            </div>
            <div class="col-md-12 p-2">
                <div class="input-group mb-3">
                    <span class="input-group-text">R$</span>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Preço" require>
                </div>
                <?=getFlash('price');?>
            </div>
            <div class="col-md-12 p-2">
                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Descrição" require></textarea>
                <?=getFlash('description');?>
            </div>
            <div class="col-md-6 p-2">
                <?=getFlash('success', 'color: green;');?>
                <?=getFlash('error');?>
            </div>
            <div class="col-md-6 p-2 text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>