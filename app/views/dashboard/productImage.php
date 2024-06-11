<div class="row">
    <div class="col-md-9 px-3">
        <h2>Editar Fotos do produto <?=$product->name?> - <?=$product->id?></h2>
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
    <div class="row">
        <div class="col-md-12 p-2">
            <p>Segure e arraste para mudar a posição das imagens</p>
        </div>
        <div class="col-md-12 p-2">
            <div class="text-center mb-5">
            <?=getFlash('success', 'color: green;');?>
            <?=getFlash('error');?>
            </div>
            <div class="row justify-content-center" id="photos">
                <?php foreach($images as $image){?>
                    <div class="col-md-2 card card-imgs m-2" id="<?=$image->id?>">
                    <!-- Crie um link Simbolico para a pasta para funcionar -->
                        <form action="/dashboard/deleteImg/<?=$product->id?>" method="POST" class="text-end close">
                            <input type="text" name="direct" id="direct" value="products" hidden>
                            <input type="text" name="id" id="id" value="<?=$image->id?>" hidden>
                            <input type="text" name="name" id="name" value="<?=$image->name?>" hidden>
                            <button type="submit" class="btn btn-danger px-2 py-1"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                        <img src="/storage/img/products/<?=$product->id?>/<?=$image->name?>" alt="" width="100%">
                    </div>
                <?php }?>
            </div>
        </div>
        <form action="/dashboard/addImage" method="POST" enctype="multipart/form-data">
            <div class="col-md-12 p-2">
                <label for="formFileMultiple" class="form-label">Adicionar Imagens</label>
                <input type="text" name="id" id="id" value="<?=$product->id?>" hidden>
                <input class="form-control" type="file" id="imagens" name="imagens[]" multiple require>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>