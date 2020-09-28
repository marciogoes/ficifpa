<?php

class Manager extends Conexao {

  public function insertAluno($table, $data) {
     $pdo = parent::get_instance();
     $fields = implode(", ", array_keys($data));
     $values = ":".implode(", :", array_keys($data));
     $sql = "INSERT INTO $table ($fields) VALUES ($values)";
     $statement = $pdo->prepare($sql);
     foreach($data as $key => $value) {
         $statement->bindValue(":$key", $value, PDO::PARAM_STR);
     }
     $statement->execute();
  }

  public function listAluno($table) {
      $pdo = parent::get_instance();
      $sql = "SELECT * FROM $table ORDER BY name ASC";
      $statement = $pdo->query($sql);
      $statement->execute();

      return $statement->fetchAll();
  }

  public function deleteAluno($table, $id){
    $pdo = parent::get_instance();
    $sql = "DELETE FROM $table WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":id", $id);
    $statement->execute();
  }

  public function getInfo($table, $id){
     $pdo = parent::get_instance();
     $sql = "SELECT * FROM $table WHERE id = :id";
     $statement = $pdo->prepare($sql);
     $statement->bindValue(":id", $id);
     $statement->execute();

     return $statement->fetchAll();
  }

  public function updateAluno($table, $data, $id){
    $pdo = parent::get_instance();
    $new_value = "";
    foreach ($data as $key => $value) {
       $new_value .= "$key=:$key, ";
    }
    $new_value = substr($new_value, 0, -2);
    $sql = "UPDATE $table SET $new_value WHERE id = :id";
    $statement = $pdo->prepare($sql);
    foreach ($data as $key => $value) {
       $statement->bindValue(":$key", $value, PDO::PARAM_STR);
    }
    $statement->execute();
  }

}

?>