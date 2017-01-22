<?php

namespace App\Models;

use core\MyPDO;

class CommentModel
{

  private $pdo;


  public function __construct()
  {
      $this->pdo = new MyPDO();
  }

  /**
  * param : int $limit
  * param : int $offset
  * return : array
  */
  public function getListOfComment($id, $limit = null, $offset = null)
  {
    if (!empty($id) && is_int($limit) && is_int($offset)) {
      $sql = "SELECT * FROM `comment` WHERE article_id = :id LIMIT :limit OFFSET :offset";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        'limit' => $limit,
        'offset' => $offset,
        ]);
      $comment = $req->fetchAll(MyPDO::FETCH_ASSOC);
      return $comment;
    } else if (!empty($id)) {
      $sql = "SELECT * FROM `comment` WHERE article_id = :id";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        ]);
      $comment = $req->fetchAll(MyPDO::FETCH_ASSOC);
      return $comment;
    } else {
      return null;
    }

  }

}
