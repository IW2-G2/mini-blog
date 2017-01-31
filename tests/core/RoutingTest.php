<?php

namespace tests\core;

use core\Routing;

/**
 *
 */
class RoutingTest extends \PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    require_once __dir__."/../../config/constants.php";
  }

  /** @dataProvider providerURI */
  public function testCheckRoute($uri, $bool)
  {
    $_SERVER["REQUEST_URI"] = $uri;
    $routing = new Routing();
    $this->assertequals($routing->checkRoute(), $bool);
  }

  public function providerURI()
  {
      return [
        ['/mini-blog/', true],
        ['/mini-blog/laroutedelimposible', false],
        ['/mini-blog/article/view', true]
      ];
  }

}
