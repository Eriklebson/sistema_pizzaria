<?php
namespace app\controllers;

class Image{
    public function editProductImg($params){
        permissions(user(), [1, 2]);
        if(!isset($params['editProductImg'])){
            return redirect("/dashboard/products");
        }
        $product = findBy('products', 'where id='.$params['editProductImg']);
        $images =  findAll("photos where id_product = {$params['editProductImg']} ORDER BY order_ ASC");
        return[
            'view' => 'dashboard/productImage.php',
            'data' => ['title' => 'Edit Produtos', 'product' => $product, 'images' => $images]
        ];
    }
    public function upload(){
        $id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
        $photos = $_FILES['imagens'];
        $fold = "products";
        $image = new Image();
        $image->store($fold, $id, $photos);
    }
    public function store($fold, $lastId, $photos){
        for($i = 0; $i < count($photos['name']); $i++){
            $img = [];
            $name = md5(date('d-m-Y h:i:s').$photos['name'][$i]).'.'.explode('.', $photos['name'][$i])[1];
            $direct = "../../storage/img/$fold/$lastId/$name";
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
        return setMessageAndRedirect('success', 'Imagens enviadas com sucesso', '/dashboard/editProductImg/'.$lastId);
        
    }
    public function delete($params){
        $id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
        $name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
        $direct = filter_input(INPUT_POST, 'direct', FILTER_UNSAFE_RAW);
        if($direct != 'products' && $direct != 'users'){
            return setMessageAndRedirect('error', 'Ocorreu um erro ao apagar a imagen, por favor entre em contato com o suporte', "/dashboard/editProductImg/{$params['deleteImg']}");
        }
        delete('photos', $id);
        unlink("../../storage/img/{$direct}/{$params['deleteImg']}/{$name}");
        return setMessageAndRedirect('success', 'Imagem apagada com sucesso', "/dashboard/editProductImg/{$params['deleteImg']}");
    }
}
?>