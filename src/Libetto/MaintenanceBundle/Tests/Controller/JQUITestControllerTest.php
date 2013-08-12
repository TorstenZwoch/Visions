<?php

namespace Libetto\MaintenanceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JQUITestControllerTest extends WebTestCase
{
    public function testLoadajax()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/loadAjax');
    }

}
