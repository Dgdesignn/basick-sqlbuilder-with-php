<?php
namespace App\Entity;
use App\database\Database;
use PDO;

class Provider{
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $estado;

    //função para fazer o cadastro
    public function cadastrar(){

        $database = new Database("tm_provider");

        $lastId = $database->insert(array(
                  'nome'=>$this->nome, 
                  'email'=>$this->email,
                  'telefone'=>$this->telefone, 
                  'estado'=>$this->estado
                  ));
    
                return $lastId;
    }

    //actualizar
    public function actualizar(){
        $database = new Database("tm_provider");

        $database->update(" id = $this->id ",array(
                  'nome'=>$this->nome, 
                  'email'=>$this->email,
                  'telefone'=>$this->telefone, 
                  'estado'=>$this->estado
                  ));
                  
                return true;
    }


    //actualizar
    public function remover(){
        $database = new Database("tm_provider");

        $database->remove(" id = $this->id ");
                  
                return true;
    }

    //função para fazer a busca dos dados 
    public static function buscar($where=null, $order=null, $limit=null){
        return (new Database('tm_provider'))->select($where, $order, $limit)
                                        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function buscarPorId($id){
        return (new Database('tm_provider'))->select('id = '.$id)
                                        ->fetchObject(self::class);
    }

    
}

?>