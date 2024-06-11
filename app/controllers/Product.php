<?php
namespace app\controllers;

class Product{
    public function index(){
        permissions(user(), [1, 2]);
        $limit = 15;
        $pagination = pagination("products", $limit);
        $products = findAll("products inner join category on category.id = products.category order by products.id DESC LIMIT {$pagination['start']}, {$limit};", 'products.*, category.name as category ');
        return[
            'view' => 'dashboard/products.php',
            'data' => ['title' => 'Produtos', 'products' => $products, 'amount' => $pagination['amount'], 'page' => $pagination['page']]
        ];
    }
    public function addProduct(){
        permissions(user(), [1, 2]);
        $categorys =  findAll('category ORDER BY name ASC');
        return[
            'view' => 'dashboard/addProduct.php',
            'data' => ['title' => 'Adicionar Produtos', 'categorys' => $categorys]
        ];
    }
    public function editProduct($params){
        permissions(user(), [1, 2]);
        if(!isset($params['editProduct'])){
            return redirect("/dashboard/products");
        }
        $product = findBy('products', 'where id='.$params['editProduct']);
        $categorys =  findAll('category ORDER BY name ASC');
        return[
            'view' => 'dashboard/editProduct.php',
            'data' => ['title' => 'Edit Produtos', 'product' => $product, 'categorys' => $categorys]
        ];
    }
    public function store(){
        permissions(user(), [1, 2]);
        $validate = validade([
            'category' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if(!$validate){
            return redirect('/dashboard/addProduct');
        }

        $validate['price'] = str_replace(',', '.',str_replace('.', '', $validate['price']));
        array_splice_assoc($validate, -1, 1, array('created_at' => date('Y-m-d H:m:s')));
        $created = create('products', $validate);
        $lastId = $created[1];

        $photos = $_FILES['imagens'];
        $fold = "products";
        mkdir("../../storage/img/$fold/$lastId/");
        $image = new Image();
        $image->store($fold, $lastId, $photos);
        if(!$created[0]){
            return setMessageAndRedirect('error', 'Ocorreu um erro ao cadastrar, tente novamente em alguns segundos', '/dashboard/addProduct');
        }
        return setMessageAndRedirect('success', 'Produto cadastrado com sucesso', '/dashboard/addProduct');
    }
    public function update(){
        permissions(user(), [1]);
        $validate = validade([
            'category' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
        if(!$validate){
            return redirect('/dashboard/editProduct/'.filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW));
        }
        $validate['price'] = str_replace(',', '.',str_replace('.', '', $validate['price']));
        array_splice_assoc($validate, -1, 1, array('updated_at' => date('Y-m-d H:m:s')));
        array_splice_assoc($validate, -1, 1, array('updated_by' => user()->id));
        $update = update("products", $validate, $id);
        if(!$update){
            return setMessageAndRedirect('error', 'Ocorreu um erro na atualização, tente novamente em alguns segundos', '/dashboard/products/');
        }
        $user = findBy("users", "where id=".user()->id);
        return setMessageAndRedirect('success', 'Produto Atualizado com sucesso', '/dashboard/products');
    }
}
?>