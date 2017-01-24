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

  /**
  * param : string $id
  * param : string $title
  * param : string $content
  */
  public function saveArticle($id, $title, $content)
  {
    if ( !empty($id) && !empty($title) && !empty($content) ) {
      $sql = "UPDATE `article` SET title= :title , content= :content WHERE id= :id";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content,
        ]);
    }
  }

  /**
  * param : string $id
  * param : string $title
  * param : string $content
  */
  public function removeArticle($id)
  {
    if ( !empty($id) ) {
      $sql = "DELETE FROM `article` WHERE id= :id";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        ]);
    }
  }

  /**
  * param : string $title
  * param : string $content
  * param : string $autor
  */
  public function createArticle($title, $content, $autor)
  {
    if ( !empty($title) && !empty($content) && !empty($autor) ) {
      $id = $this->getMaxIdArticle()+1;
      $sql = "INSERT INTO `article` (`id`, `title`, `content`, `autor`, `active`, `created_at`, `updated_at`) 
              VALUES (:id, :title, :content, :autor, 1, NOW(), NOW())";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'autor' => $autor,
        ]);
    }
  }

  /**
  * return : string $maxId
  */
  public function getMaxIdArticle()
  {
    $sql = "SELECT MAX(id) FROM `article`";
    $req = $this->pdo->prepare($sql);
    $req->execute();
    $maxId = $req->fetch(MyPDO::FETCH_ASSOC);
    return (string)$maxId['MAX(id)'];
  }

}
