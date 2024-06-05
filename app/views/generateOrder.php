<section class="container pt-5 min-vh-100">
    <h3 class="mt-5 pt-5 text-white">Comanda</h3>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Itens</th>
            <th scope="col">Valor</th>
            <th scope="col">Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Pizza meia frango com catupiry meia calabresa</td>
                <td>R$ 36,00</td>
                <td>1</td>
                </tr>
            <tr>
                <th scope="row">2</th>
                <td>Pizza de mussarela</td>
                <td>R$ 25,00</td>
                <td>2</td>
                </tr>
            <tr>
                <th scope="row">3</th>
                <td>Pizza de camarão</td>
                <td>R$ 29,00</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-dark w-100 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Pizzas +</button>
    <div class="collapse mb-2" id="collapseExample">
        <div class="card card-body">
            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
        </div>
    </div>
    <button class="btn btn-dark w-100 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">Bebidas +</button>
    <div class="collapse mb-2" id="collapseExample2">
        <div class="card card-body">
            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
        </div>
    </div>
    <div class="w-100 text-end mb-5">
        <a href="/finalizeOrder" class="btn btn-dark" type="button">Finalizar pedido</a>
    </div>
</section>