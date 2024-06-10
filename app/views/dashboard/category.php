<section>
    <div class="row">
        <div class="col-md-6 px-3">
            <h2>Categoria</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="javascript:history.back()" data-bs-toggle="tooltip" data-bs-title="Voltar">
                <div class="back text-end mb-3 mx-3">
                    <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="card px-4 py-2 mb-3">
        <h3>Adicionar categoria:</h3>
        <form action="/dashboard/addCategory" method="POST">
            <div class="row">
                <div class="col-md-12 p-2">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Categoria">
                    <div class="text-center">
                    <?=getFlash('success', 'color: green;');?>
                    <?=getFlash('error');?>
                    <?=getFlash('name');?>
                    </div>
                </div>
                <div class="col-md-12 p-2 text-end">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card px-4 py-2 mb-3">
        <h3>Procurar:</h3>
        <div class="row">
            <form id="search">
                <div class="input-group my-2">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" for="search" id="button-addon2">Procurar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card p-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col" class="text-center">Açoes</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <?php foreach($categorys as $category){?>
                <tr>
                    <th scope="row"><?=$category->id?></th>
                    <td><?=$category->name?></td>
                    <td class="text-center">
                        <a href='editCategory/<?=$category->id?>' class='btn btn-primary' data-bs-toggle='tooltip' data-bs-title='Editar Categoria'><i class='fa-solid fa-pen-to-square'></i></a>
                    </td>
                <tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</section>