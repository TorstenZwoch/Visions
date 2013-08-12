<?php

namespace Libetto\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UploadControllerTest extends WebTestCase
{
    public function testUpload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/upload');
    }

}
