<?php

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\User;

require '../vendor/autoload.php';


    $user = new User();
   /* 
    //FAZENDO O INSERT
    $user->nome = "Gaspar";
    $user->email = "gaspar@gmail.com";
    $user->senha = "gaspar";
    $user->estado = 0;
    $reuslt = $user->cadastrar();*/

    //FAZENDO O SELECT
    /*
    $result = $user::buscar();
    foreach($result as $user){
        echo'<pre>';
        print_r($user);
        echo'</pre>';
    }*/

    //EDITAR OS DADOS
   /* $dat = $user::buscarPorId(1);

    $user->id = $dat->id;
    $user->nome = "Eliseu";
    $user->email = "eliseu@yetosys.com";
    $user->senha = "12@eliseu";
    $user->estado = 1;
    echo"<pre>";
    //print_r($data_no_id);
    echo $user->actualizar();
    echo"</pre>";*/

    //REMOVER USUARIO
   //$dat = $user::buscarPorId(2); 
   //$user->id = $dat->id;
   //echo($user->remover());

   //LOGIN DO USUARIO
   /* $user->email ="eliseu@yetosys.com";
    $user->senha = "12@eliseu";
    $resultado = $user->iniciar();
    $mensagem = $resultado==""?"Usuário não encontrado":"Logado com sucesso";

    echo$mensagem;*/

    //C R I A N D O   C R U D   D A S   C A T E G O R I A S
    $category = new Category();

    //Criar categoria
    /*$category->categoria = "Calculadora";
    echo"<pre>";
        print_r($category->cadastrar());
    echo"</pre>";*/

    //Buscar todas as categorias
    /*$category->id_categoria = 1;
    $category->categoria = "Livro";
    echo"<pre>";
    print_r($category->actualizar());
    echo"</pre>";*/

    //remover categoria
   /* $category->id_categoria = 3;
    $category->remover();*/


    //C R U D   F O R N E C E D O R
    $provider = new Provider();

    ///criar fornecedor
    /*
    $provider->nome = "Manuel Miguel";
    $provider->email = "miguel@yeto.com";
    $provider->telefone = "923221122";
    $provider->estado = "1";

    print_r($provider->cadastrar());*/

    //editar fornecedor
    /*
    $provider->id = 2;
    $provider->provider = "Geraldo Alexandro";
    $provider->email = "alexandreo@yeto.com";
    $provider->telefone = "923221122";
    $provider->estado = "1";

    print_r($provider->actualizar());*/

    //remover fornecedor

    //$provider->id = 1;
    //$provider->remover()


    //buscar fornecedor
    /*echo"<pre>";
    print_r($provider::buscar());
    echo"</pre>";*/

     //buscar por id fornecedor
    /*echo"<pre>";
    print_r($provider::buscarPorId(3));
    echo"</pre>";*/

    //C R U D   P R O D U T O S
    $product = new Product();
    
    //criando nova produto
    /*
    $product->fornecedor = 4;
    $product->nome = "A cabra da minha mãe";
    $product->categoria = 1;
    $product->descricao = "Livro de educação financeira";
    $product->quant = 43;
    $product->preco_in = 5000;
    $product->preco_out = 9000;
    $product->datta = date("d/m/Y");
    $product->estado = 1;

    $product->cadastrar();*/

    $fields = "p.id, f.provider, p.nome, c.categoria, p.descricao, p.quant, p.preco_in, p.preco_out, p.datta, p.estado";
    $join = "
    AS p INNER JOIN tm_categories as c ON p.categoria = c.id_categoria 
    INNER JOIN tm_provider as f ON p.fornecedor = f.id ";

    echo('<pre>');
    print_r($product::buscar(null,null,null,$fields,$join));
    echo('</pre>');
    
   
?>