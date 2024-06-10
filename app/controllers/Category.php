<?php
namespace app\controllers;

class Category{
    public function index(){
        permissions(user(), [1]);
        $categorys =  findAll('category');
        return[
            'view' => 'dashboard/category.php',
            'data' => ['title' => 'Categoria', 'categorys' => $categorys]
        ];
    }
    public function edit($params){
        permissions(user(), [1]);
        if(!isset($params['editCategory'])){
            return redirect("/dashboard/category");
        }
        $category = findBy('category', 'where id='.$params['editCategory']);
        return[
            'view' => 'dashboard/editCategory.php',
            'data' => ['title' => 'Edit Categoria', 'category' => $category]
        ];
    }
    public function store(){
        //Editar quando fazer o cadastro de usuario
        permissions(user(), [1]);
        $validate = validade([
            'name' => 'required|unique:category'
        ]);
        if(!$validate){
            return redirect('/dashboard/category');
        }
        array_splice_assoc($validate, -1, 1, array('created_at' => date('Y-m-d H:m:s')));
        $created = create('category', $validate)[0];
        if(!$created){
            return setMessageAndRedirect('error', 'Ocorreu um erro ao cadastrar a categoria, tente novamente em alguns segundos', '/dashboard/category');
        }
        return setMessageAndRedirect('success', 'Categoria cadastrada com sucesso', '/dashboard/category');
    }
    public function update(){
        permissions(user(), [1]);
        $id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
        $name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
        $validate['name'] = $name;
        if(!$validate){
            return redirect('/dashboard/editCategory/'.filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW));
        }
        array_splice_assoc($validate, -1, 1, array('updated_at' => date('Y-m-d H:m:s')));
        array_splice_assoc($validate, -1, 1, array('updated_by' => user()->id));
        $update = update("category", $validate, $id);
        if(!$update){
            return setMessageAndRedirect('error', 'Ocorreu um erro na atualização, tente novamente em alguns segundos', '/dashboard/editCategory/'.$id);
        }
        $user = findBy("users", "where id=".user()->id);
        return setMessageAndRedirect('success', 'Usuario Atualizado com sucesso', '/dashboard/editCategory/'.$id);
    }
}
?>