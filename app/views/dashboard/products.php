<section>
    <div class="row">
        <div class="col-md-6 px-3">
            <h2>Produtos</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="addProduct" data-bs-toggle="tooltip" data-bs-title="Adicionar produto">
                <div class="back text-end mb-3 mx-3">
                    <i class="fa-solid fa-plus fs-3 px-3 py-2"></i>
                </div>
            </a>
            <a href="javascript:history.back()" data-bs-toggle="tooltip" data-bs-title="Voltar">
                <div class="back text-end mb-3 mx-3">
                    <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="card px-4 py-2 mb-3">
        <h3>Procurar:</h3>
        <div class="row">
            <form id="search">
                <div class="input-group my-2">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <input type="text" id="price" name="price" class="form-control" placeholder="Preço" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <select class="form-select" name="category" id="category" aria-label="Default select example">
                        <option value="">Escolha</option>
                        <?php
                        if ($result = $categorys) {
                            while ($category = $result->fetch_object()) {
                        ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <button class="btn btn-outline-secondary" type="submit" for="search" id="button-addon2">Procurar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card p-4">
        <div class="text-center">
            <?=getFlash('success', 'color: green;');?>
            <?=getFlash('error');?>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Peço</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <?php foreach($products as $product){?>
                <tr>
                    <th scope="row"><?=$product->id?></th>
                    <td><?=$product->name?></td>
                    <td>R$ <?=number_format($product->price, 2, ',', '.');?></td>
                    <td><?=$product->category?></td>
                    <td class="text-center">
                        <a href='editProduct/<?=$product->id?>' class='btn btn-primary' data-bs-toggle='tooltip' data-bs-title='Editar Produto'><i class='fa-solid fa-pen-to-square'></i></a>
                        <a href='editProductImg/<?=$product->id?>' class='btn btn-primary' class='btn btn-primary' data-bs-toggle='tooltip' data-bs-title='Editar Imagens'><i class='fa-solid fa-images'></i></a>
                    </td>
                <tr>
                <?php }?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-3">
                <li class="page-item">
                <a class="page-link" href="?pg=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
                <?php if($page != 1){?>
                <li class="page-item"><a class="page-link disabled" href="#" aria-disabled="true">...</a></li>
                <li class="page-item"><a class="page-link" href="?pg=<?=$page-1?>"><?=$page-1?></a></li>
                <?php }?>
                <li class="page-item"><a class="page-link active fw-bold" href="#"><?=$page?></a></li>
                <?php if($page != $amount){?>
                <li class="page-item"><a class="page-link" href="?pg=<?=$page+1?>"><?=$page+1?></a></li>
                <li class="page-item"><a class="page-link disabled" href="#" aria-disabled="true">...</a></li>
                <?php }?>
                <li class="page-item">
                <a class="page-link" href="?pg=<?=$amount?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
</section>