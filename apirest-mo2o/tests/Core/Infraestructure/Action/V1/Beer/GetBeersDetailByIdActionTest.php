<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:33
 */

namespace App\Tests\Core\Infraestructure\Action\V1\Beer;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class GetBeersDetailByIdActionTest extends WebTestCase
{
    /** @test */
    public static function shouldReturnBeerDetailById()
    {
        $client = static::createClient();
        $client->request('GET', 'api/v1/beer/detail?id=1');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /** @test */
    public function shouldReturnBadRequestBeersDetailById()
    {
        $client = static::createClient();
        $client->request('GET', 'api/v1/beer/detail?idfadasfd=4');

        $request = $this->createMock(Request::class);
        $request->expects($this->any())->method('getUri')->willReturn('https://api.punkapi.com/v2/beers/?fofdsafs=chicken');
        self::assertNull($request->get('food'));
    }

    /** @test */
    public function shouldNotReturnBeerDetailById()
    {
        $client = static::createClient();
        $client->request('GET', 'api/v1/beer/detail?id=4dfasdfasf');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }
}