<?php
namespace App\Entity;

use App\database\Database;
use PDO;

class Category{

    public $id_categoria;
    public $categoria;

    public function cadastrar(){
        $database =  new Database('tm_categories');

        $lastId = $database->insert(['categoria'=>$this->categoria]);
        return $lastId;
    }

    public function actualizar(){
        $database =  new Database('tm_categories');

        $database->update($this->id_categoria,['categoria'=>$this->categoria]);
        return $database;

    }

    public function remover(){
        $database =  new Database('tm_categories');
        $database->remove("id_categoria = $this->id_categoria");

        return true;
    }

    public static function buscar($where=null, $order=null, $limit=null){
       return (new Database('tm_categories'))->select($where, $order, $limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }


    public static function buscarPorId($id){
        return (new Database('tm_categories'))->select(" id_categoria = '$id'")
         ->fetchObject(self::class);
     }




}



?>