<?php
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
    $user->email ="eliseu@yetosys.com";
    $user->senha = "12@eliseu";
    $resultado = $user->iniciar();
    $mensagem = $resultado==""?"Usuário não encontrado":"Logado com sucesso";

    echo$mensagem;
   
?>