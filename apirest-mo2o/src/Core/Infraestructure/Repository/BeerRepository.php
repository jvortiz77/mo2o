<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:22
 */

namespace App\Core\Infraestructure\Repository;


use App\Core\Domain\Model\Beer\Beer;
use App\Core\Domain\Model\Beer\BeerDetail;
use App\Core\Domain\Model\Beer\BeerRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\Response;

final class BeerRepository implements BeerRepositoryInterface
{
    /** @var string */
    private const API_URL = 'https://api.punkapi.com/v2/beers/';

    /**
     * @param $food
     * @return array
     */
    public function findBeersByFood($food): array
    {
        $status = Response::HTTP_NO_CONTENT;
        $client = new Client();
        $newBeer = [];
        $responseBeers = $client->get(self::API_URL.'?food='.$food);
        try {
            if (null !== $responseBeers && 200 === $responseBeers->getStatusCode()) {
                $beersByFood = $responseBeers->json();
                if (!empty($beersByFood)) {
                    foreach ($beersByFood as $beer) {
                        $newBeer[] = new Beer($beer);
                    }
                    $status = Response::HTTP_OK;
                }
            }
        }
            // @codeCoverageIgnoreStart
        catch (ClientException $exception) {
            $status = Response::HTTP_NOT_FOUND;
        }
        // @codeCoverageIgnoreEnd

        return [
            'beers'     => $newBeer,
            'status'    => $status
        ];
    }

    /**
     * @return array
     */
    public function findBeersById($id): array
    {
        $status = Response::HTTP_NO_CONTENT;
        $client = new Client();
        $newBeer = [];
        $responseBeers = $client->get(self::API_URL.'?ids='.$id);
        try {
            if (null !== $responseBeers && 200 === $responseBeers->getStatusCode()) {
                $beersByFood = $responseBeers->json();
                if (!empty($beersByFood)) {
                    foreach ($beersByFood as $beer) {
                        $newBeer[] = new BeerDetail($beer);
                    }
                    $status = Response::HTTP_OK;
                }
            }
        }
            // @codeCoverageIgnoreStart
        catch (ClientException $exception) {
            $status = Response::HTTP_NOT_FOUND;
        }
        // @codeCoverageIgnoreEnd

        return [
            'beers'     => $newBeer,
            'status'    => $status
        ];
    }
}