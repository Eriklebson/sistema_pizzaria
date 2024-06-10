<?php
namespace app\controllers;

class Product{
    public function index(){
        permissions(user(), [1, 2]);
        $products = findAll('products inner join category on category.id = products.category order by products.id DESC;', 'products.*, category.name as category ');
        return[
            'view' => 'dashboard/products.php',
            'data' => ['title' => 'Produtos', 'products' => $products]
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
        mkdir("../../storage/img/products/$lastId/");

        for($i = 0; $i < count($photos['name']); $i++){
            $img = [];
            $name = md5(date('d-m-Y h:i:s').$photos['name'][$i]).'.'.explode('.', $photos['name'][$i])[1];
            $direct = "../../storage/img/products/".$lastId."/".$name;
            $largura =  getimagesize($photos['tmp_name'][$i])[0];
            $altura =  getimagesize($photos['tmp_name'][$i])[1];
            if($largura > 2000 || $altura > 2000){
                $image_redimencionada = imagecreatetruecolor(floor($largura/3), floor($altura/3));
                imagecopyresampled($image_redimencionada, imagecreatefromjpeg($photos['tmp_name'][$i]), 0,0,0,0, floor($largura/3), floor($altura/3), $largura, $altura);
                imagejpeg($image_redimencionada, $direct);
                array_splice_assoc($img, -1, 1, array('name' => $name));
                array_splice_assoc($img, -1, 1, array('order_' => $i+1));
                array_splice_assoc($img, -1, 1, array('id_product' => $lastId));
            }
            else{
                if(move_uploaded_file($photos['tmp_name'][$i], $direct)){
                    array_splice_assoc($img, -1, 1, array('name' => $name));
                    array_splice_assoc($img, -1, 1, array('order_' => $i+1));
                    array_splice_assoc($img, -1, 1, array('id_product' => $lastId));
                }
                else{
                    return setMessageAndRedirect('error', 'Ocorreu um erro no upload das imagens, por favor entre em contato com o suporte', '/dashboard/addProduct');
                }
            }
            $created = create('photos', $img);
            if(!$created[0]){
                return setMessageAndRedirect('error', 'Ocorreu um erro no upload das imagens, por favor entre em contato com o suporte', '/dashboard/addProduct');
            }
        }  
        if(!$created[0]){
            return setMessageAndRedirect('error', 'Ocorreu um erro ao cadastrar, tente novamente em alguns segundos', '/dashboard/addProduct');
        }
        return setMessageAndRedirect('success', 'Produto cadastrado com sucesso', '/dashboard/addProduct');
    }
}
?>