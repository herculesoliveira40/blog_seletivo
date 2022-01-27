<?php

    Class Conexao { 
                // definições de host, database, usuário e senha
               public $servername = "localhost";
               public $database = "blog";
               public $username = "root";
               public $password = "1234";
               public $port = "3306";
               public $conpdo;
               public $statement;

     public function __construct() 
     {  
        $dns =  'mysql:host='.$this->servername.';port='.$this->port.';dbname='.$this->database; 
        $opcoes = [
          PDO::ATTR_PERSISTENT => true, 
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];  

          try {
              $this->conpdo = new PDO($dns, $this->username, $this->password, $opcoes);  echo "Connected $this->servername em $this->database";
    
              } catch (PDOException $e) {
                echo "Error Database: " . $e->getMessage() . "<hr>";
                die();
              }          
     } 


      public function query($sql) {
        $this->statement = $this->conpdo->prepare($sql);
      }

      public function bind($parametro, $valor, $tipo = null) {
          if(is_null($tipo)):
            switch (true):
                case is_int($valor):
                  $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                  $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):   
                  $tipo = PDO::PARAM_NULL;
                break;
                default:
                $tipo = PDO::PARAM_STR;
            endswitch;       
        endif;
        // vincula um valor a um parametro
        $this->statement->bindValue($parametro, $valor, $tipo);
      }

      public function executa() {
        return $this->statement->execute();
      }

      public function resultado() {
        $this->executa();
        return $this->statement->fetch(PDO::FETCH_OBJ);
      }

      public function resultados() {
        $this->executa();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
      }
      public function totalResultados() {
        return $this->statement->rowCount();
      }

      public function ultimoIdInsert() {
        return $this->conpdo->lastInsertId();
      }
  }
?>   

