<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:32
 */

namespace App\Tests\Core\Infraestructure\Action\V1\Beer;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class GetBeersByFoodActionTest extends WebTestCase
{
    /** @test */
    public function shouldReturnBeersByFood()
    {
        $client = static::createClient();
        $client->request('GET', 'api/v1/beer?food=orange');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /** @test */
    public function shouldReturnBadRequestBeersByFood()
    {
        $client = static::createClient();
        $client->request('GET', 'api/v1/beer?fdasfafasfa=orange');

        $request = $this->createMock(Request::class);
        $request->expects($this->any())->method('getUri')->willReturn('https://api.punkapi.com/v2/beers/?fofdsafs=chicken');
        self::assertNull($request->get('food'));
    }

    /** @test */
    public function shouldNotReturnBeersByFood()
    {
        $client = static::createClient();
        $client->request('GET', 'api/v1/beer?food=123123112123');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }
}