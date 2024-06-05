<section>
    <div class="row">
        <div class="col-md-6 px-3">
            <h2>Pedidos pagos</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="addproduct" data-bs-toggle="tooltip" data-bs-title="Adicionar produto">
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
        <?php if (isset($_GET['msg'])) {
            if ($_GET['msg'] == 'true') { ?>
                <p class="text-success text-center fs-4">Produto cadastrado com sucesso</p>
            <?php } else { ?>
                <p class="text-danger text-center fs-4">Não foi possivel cadastrado o Produto</p>
        <?php }
        } ?>
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
            </tbody>
        </table>
    </div>
</section>