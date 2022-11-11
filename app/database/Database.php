<?php

namespace App\database;

use PDO;
use PDOException;

class Database{
    const HOST ='localhost';
    const USERNAME ='root';
    const PASS ='';
    const DBNAME ='tysys_db';

    private $tablename;
    private $connection;

    public function __construct($tablename=null){
        $this->tablename = $tablename;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME,self::USERNAME,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("ERRO: ".$e->getMessage());
        }
    }

    public function select($where=null, $order=null, $limit=null, $fields='*'){
        $where = strlen($where)?'WHERE '.$where :'';
        $order = strlen($order)?'ORDER BY '.$order :'';
        $limit = strlen($limit)?'LIMIT '.$limit :'';

        $query = "SELECT $fields FROM $this->tablename $where $order $limit";
        return $this->execute($query);
        
        echo $query; 
    }

    public function insert(array $data){
        
        $fields = array_keys($data);
        $fields = implode(',',$fields);

        $values = array_pad([],count($data),'?');
        $values = implode(',',$values);

        $query = "INSERT INTO $this->tablename ($fields) VALUES ($values)";
      
        $this->execute($query, array_values($data));
        return $this->connection->lastInsertId();
    }

    public function update($id, $data){
        $fields = array_keys($data);
        $values = array_values($data);

        $query = "UPDATE $this->tablename SET ".implode('=?,',$fields)."=? WHERE $id";
        $this->execute($query, $values);

    }

    public function remove($id){

        $query = "DELETE FROM $this->tablename WHERE $id";
        $this->execute($query);

    }
 
    private function execute($query,$params=[]){
        try{
            $stetement = $this->connection->prepare($query);
            $stetement->execute($params);
            return $stetement;
        }catch(PDOException $e){
            die("Usuário não cadastrado ".$e);
        }
    }





}

?>