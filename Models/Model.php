<!-- DBとやりとり -->
<?php

// require_once dirname(__FILE__) . '/../dbconnect.php';
require_once('dbconnect.php');


class Model
{

    protected $table;
    protected $db_manager;

    public function __construct()
    {
      $this->db_manager = new DbManager();
      $this->db_manager->connect();

    }

    public function getAll()
    {
      $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);
      $stmt->execute();
      $posts = $stmt->fetchAll();
      return $posts;

    }

    public function delete($data)
    {
        // 削除処理

        // 準備
        $stmt = $this->db_manager->dbh->prepare('DELETE FROM ' . $this->table . ' WHERE id = ?');

        // 実行
        return $stmt->execute($data);
    }

      // 編集機能
      public function findById($id)
      {
              $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table. ' WHERE id = ?');
  
              $stmt->execute($id);
  
              $posts = $stmt->fetch();
  
              return $posts;
      }


}