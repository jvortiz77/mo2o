<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 19:40
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class BeerControllerTest extends WebTestCase
{
    /** @test */
    public function shouldReturnBeersByFood()
    {
        $client = static::createClient();
        $client->request('GET', 'api/beer?food=orange');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /** @test */
    public function shouldReturnBadRequestBeersByFood()
    {
        $client = static::createClient();
        $client->request('GET', 'api/beer?fdasfafasfa=orange');

        $request = $this->createMock(Request::class);
        $request->expects($this->any())->method('getUri')->willReturn('https://api.punkapi.com/v2/beers/?fofdsafs=chicken');
        self::assertNull($request->get('food'));
    }

    /** @test */
    public function shouldNotReturnBeersByFood()
    {
        $client = static::createClient();
        $client->request('GET', 'api/beer?food=123123112123');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /** @test */
    public static function shouldReturnBeerDetailById()
    {
        $client = static::createClient();
        $client->request('GET', 'api/beer/detail?id=1');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /** @test */
    public function shouldReturnBadRequestBeersDetailById()
    {
        $client = static::createClient();
        $client->request('GET', 'api/beer/detail?idfadasfd=4');

        $request = $this->createMock(Request::class);
        $request->expects($this->any())->method('getUri')->willReturn('https://api.punkapi.com/v2/beers/?fofdsafs=chicken');
        self::assertNull($request->get('food'));
    }

    /** @test */
    public function shouldNotReturnBeerDetailById()
    {
        $client = static::createClient();
        $client->request('GET', 'api/beer/detail?id=4dfasdfasf');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }
}