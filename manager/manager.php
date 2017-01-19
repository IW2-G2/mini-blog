<?php
namespace Manager;
use Manager\MyPDO;

require dirname(__FILE__) . '/my_pdo.php';

/**
*
*/
class Manager
{
    private $pdo;
    

    public function __construct()
    {
        $this->pdo = new MyPDO(dirname(dirname(__FILE__)) . '/core/my_setting.ini');
    }



    /*-------------------------------------------- get --------------------------------------------*/


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


    /*--------------------------------------- set --------------------------------------------------*/

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
