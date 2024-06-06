<section class="container p-5">
    <form action="">
        <label for="" class="form-label my-3">Informações pra contato</label>
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control contact-form" placeholder="Nome*">
            </div>
            <div class="col-md-6">
                <input type="text" id="phone" class="form-control contact-form" placeholder="Celular*">
            </div>
        </div>
        <input type="text" class="form-control mb-3 contact-form" placeholder="Email*">
        <label for="" class="form-label my-3">Endereço</label>
        <div class="row">
            <div class="col-md-4">
                <input type="text" id="cep" class="form-control mb-3 contact-form" placeholder="CEP* Ex. 01001-000">
            </div>
            <div class="col-md-4">
                <input type="text" id="logradouro" class="form-control mb-3 contact-form" placeholder="Rua/Avenida*">
            </div>
            <div class="col-md-4">
                <input type="text" id="bairro" class="form-control mb-3 contact-form" placeholder="Bairro*">
            </div>
            <div class="col-md-4">
                <input type="text" id="estado" class="form-control mb-3 contact-form" placeholder="Estado*">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control mb-3 contact-form" placeholder="Numero*">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control mb-3 contact-form" placeholder="Complemento*">
            </div>
        </div>
        <textarea class="contact-form form-control mb-3" cols="30" rows="7" name="" id="" placeholder="Observação"></textarea>
        <div class="text-end">
            <button class="mb-2 send-contact" type="button" data-bs-toggle="collapse" data-bs-target="#showOrder" aria-expanded="false" aria-controls="showOrder">Vizualizar pedido</button>
            <button class="send-contact">Finalizar</button>
        </div>
        <div class="collapse mb-2" id="showOrder">
            <div class="card card-body">
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
            </div>
        </div>
    </form>
</section>