<?php

namespace Libetto\MaintenanceBundle\Tests\Controller;

use Libetto\MaintenanceBundle\Controller\MasterController;

class MasterControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testCleanTablename() {
        $mc = new MasterController();

        $this->assertEquals('helloworld', $mc->cleanTablename('Hello World'));
        $this->assertEquals('adaywithsymfony2', $mc->cleanTablename('A Day With Symfony2'));
    }
}
