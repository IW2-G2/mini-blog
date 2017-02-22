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
  * param : string $title
  * param : string $content
  * param : string $autor
  *
  * return : string $id
  */
  public function createComment($title, $content, $autor, $article_id)
  {
    if ( !empty($title) && !empty($content) && !empty($autor) && !empty($article_id) ) {
      $id = $this->getMaxIdComment()+1;
      $sql = "INSERT INTO `comment` (`id`, `title`, `content`, `autor`, `article_id`, `created_at`, `updated_at`)
              VALUES (:id, :title, :content, :autor, :article_id, NOW(), NOW())";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'autor' => $autor,
        'article_id' => $article_id
        ]);
    }
    return $id;
  }

  /**
  * param : string $id
  * param : string $title
  * param : string $content
  */
  public function saveComment($id, $title, $content)
  {
    if ( !empty($id) && !empty($title) && !empty($content) ) {
      $sql = "UPDATE `comment` SET title= :title , content= :content WHERE id= :id";
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
  */
  public function removeComment($id)
  {
    if ( !empty($id) ) {
      $sql = "DELETE FROM `comment` WHERE id= :id";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'id' => $id,
        ]);
    }
  }

  /**
  * param : int $id
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

  /**
  * param : string $id
  * return : array
  */
  public function getComment($id)
  {
    if (!empty($id)) {
      $sql = "SELECT * FROM `comment` WHERE id = :id";
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

  /**
  * return : int $maxId
  */
  public function getMaxIdComment()
  {
    $sql = "SELECT MAX(id) FROM `comment`";
    $req = $this->pdo->prepare($sql);
    $req->execute();
    $maxId = $req->fetch(MyPDO::FETCH_ASSOC);
    return (int)$maxId['MAX(id)'];
  }
}
