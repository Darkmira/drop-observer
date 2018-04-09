<?php

namespace App\ControllerTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLoginPageIsSuccessful()
    {
        $client = self::createClient();
        $client->request('GET', '/login');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testAdminPageIsRedirect()
    {
        $client = self::createClient();
        $client->request('GET', '/admin');

        $this->assertTrue($client->getResponse()->isRedirection());
    }

    public function testUserIsRoleUser()
    {
        $this->assertSame('ROLE_USER', (new User)->getRoles()[0]);
    }
}