<?php

namespace tests\Models;

use App\Models\ArticleModel;

/**
 *
 */
class ArticleModelTest extends \PHPUnit_Framework_TestCase
{

  public function testCreateArticle()
  {
    $articleModel = new ArticleModel();

    $id = $articleModel->createArticle('testphpunit', 'testphpunit', 'testphpunit');
    $data = $articleModel->getOneArticle($id);

    $this->assertequals($data['title'], 'testphpunit');
    $this->assertequals($data['content'], 'testphpunit');
    $this->assertequals($data['autor'], 'testphpunit');
    return $id;
  }

  /**
  * @depends testCreateArticle
  */
  public function testEditArticle($id)
  {
    $articleModel = new ArticleModel();
    $articleModel->saveArticle($id, 'testphpunit2', 'testphpunit2');
    $data = $articleModel->getOneArticle($id);

    $this->assertequals($data['title'], 'testphpunit2');
    $this->assertequals($data['content'], 'testphpunit2');
    $this->assertequals($data['autor'], 'testphpunit');
  }

  /**
  * @depends testCreateArticle
  */
  public function testRemoveArticle($id)
  {
    $articleModel = new ArticleModel();
    $articleModel->removeArticle($id);
    $data = $articleModel->getOneArticle($id);
    $this->assertequals($data, false);
  }

}
