<?php

namespace App\Models;

use core\MyPDO;

class ArticleModel
{

  private $pdo;


  public function __construct()
  {
      $this->pdo = new MyPDO();
  }



  /**
  * param : int $id
  * return : array
  */
  public function getOneArticle($id)
  {
      $sql = "SELECT * FROM `article` WHERE `id`= :id AND active = 1";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        ]);
      $article = $req->fetch(MyPDO::FETCH_ASSOC);
      return $article;
  }

  /**
  * param : int $limit
  * param : int $offset
  * return : array
  */
  public function getListOfArticles($limit = null, $offset = null)
  {
    if (is_int($limit) && is_int($offset)) {
      $sql = "SELECT * FROM `article` WHERE active = 1 LIMIT :limit OFFSET :offset";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'limit' => $limit,
        'offset' => $offset,
        ]);
    } else {
      $sql = "SELECT * FROM `article` WHERE active = 1";
      $req = $this->pdo->prepare($sql);
      $req->execute();
    }

    $article = $req->fetchAll(MyPDO::FETCH_ASSOC);
    return $article;
  }

}
