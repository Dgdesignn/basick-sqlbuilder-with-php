<?php
namespace App\Entity;
use App\database\Database;
use PDO;

class Product{
    public $id;
    public $fornecedor;
    public $nome;
    public $categoria;
    public $descricao;
    public $quant;
    public $preco_in;
    public $preco_out;
    public $datta;
    public $estad;

    //função para fazer o cadastro
    public function cadastrar(){

        $database = new Database("tm_products");

        $lastId = $database->insert(array(
                  'fornecedor'=>$this->fornecedor,
                  'nome'=>$this->nome, 
                  'categoria'=>$this->categoria, 
                  'descricao'=>$this->descricao,
                  'quant'=>$this->quant,
                  'preco_in'=>$this->preco_in,
                  'preco_out'=>$this->preco_out,
                  'datta'=>$this->datta,
                  'estado'=>$this->estado,
                  ));
    
                return $lastId;
    }

    //actualizar
    public function actualizar(){
        $database = new Database("tm_products");

        $database->update(" id = $this->id ",array(
                'fornecedor'=>$this->fornecedor,
                'nome'=>$this->nome, 
                'categoria'=>$this->categoria, 
                'descricao'=>$this->descricao,
                'quant'=>$this->quant,
                'preco_in'=>$this->preco_in,
                'preco_out'=>$this->preco_out,
                'datta'=>$this->datta,
                'estado'=>$this->estado,
                  ));
                  
                return true;
    }


    //actualizar
    public function remover(){
        $database = new Database("tm_products");

        $database->remove(" id = $this->id ");
                  
                return true;
    }

    //função para fazer a busca dos dados 
    public static function buscar($where=null, $order=null, $limit=null, $fieilds=null, $join=null,){
        return (new Database('tm_products'))->select($where, $order, $limit, $fieilds, $join)
                                        ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id){
        return (new Database('tm_products'))->select('id = '.$id)
                                        ->fetchObject(self::class);
    }

    
}

?>