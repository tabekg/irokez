<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post/show');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post/delete');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post/edit');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post/create');
    }

}
