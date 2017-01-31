<?php

namespace tests\Models;

use App\Models\ArticleModel;

/**
 *
 */
class ArticleModelTest extends \PHPUnit_Framework_TestCase
{

  private $idTest;

  public function testCreateArticle()
  {
    $articleModel = new ArticleModel();
    $this->idTest = $articleModel->createArticle('testphpunit', 'testphpunit', 'testphpunit');
    $data = $articleModel->getOneArticle($this->idTest);

    $this->assertequals($data['title'], 'testphpunit');
    $this->assertequals($data['content'], 'testphpunit');
    $this->assertequals($data['autor'], 'testphpunit');
  }

  public function testRemoveArticle()
  {
    $articleModel = new ArticleModel();
    $articleModel-> removeArticle($this->idTest);
    $data = $articleModel->getOneArticle($this->idTest);

    $this->assertequals(count($data), 0);
  }


  // public function testConcat()
  // {
  //   $exo = new Exo();
  //   $response = $exo->concat('my', ' test');
  //
  //   $this->assertequals($response, 'my test');
  // }
  //
  // public function testConcatWithError()
  // {
  //   $this->expectException('\RuntimeException');
  //
  //   $exo = new Exo();
  //   $exo->concat('my', 2);
  // }

}
