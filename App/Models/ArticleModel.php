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
  * param : string $mail
  * return : bool
  */
  public function getCheckMail($email)
  {
      $sql = "SELECT * FROM `user` WHERE `email`= :email";
      $req = $this->pdo->prepare($sql);
      $req->execute([
        'email' => $email,
        ]);
      $data = $req->fetch();

      if (empty($data)){
        return true;
      }
      return false;
  }


  /**
  *  param : string $cadeauName
  *  param : int $userId
  */
  public function setAjouterCadeau($cadeauName, $userId)
  {
      $sql = "INSERT INTO `cadeau`(`nom`, `user_id`) VALUES (:nom, :userid)";
      $req = $this->pdo->prepare($sql);
      $req->execute(array(
        'userid' => $userId,
        'nom' => $cadeauName
      ));
  }

}
