<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 19:19
 */

namespace App\Controller;


use FOS\RestBundle\FOSRestBundle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\ValueObjects;

/**
 * Class BeerController
 * @package App\Controller
 * @Route("/api", name="api_")
 */
class BeerController extends FOSRestBundle
{
    /** @var string */
    private const API_URL = 'https://api.punkapi.com/v2/beers/';

    /**
     * @Route("/beer", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getBeersByFoodAction (Request $request): JsonResponse
    {
        $food = $request->get('food','');
        $status = Response::HTTP_NO_CONTENT;
        $data = [];
        if (!empty($food)) {
            $newBeer = [];
            $client = new Client();
            $responseBeers = $client->get(self::API_URL.'?food='.$food);
            try {
                if (null !== $responseBeers && 200 === $responseBeers->getStatusCode()) {
                    $beersByFood = $responseBeers->json();
                    if (!empty($beersByFood)) {
                        foreach ($beersByFood as $beer) {
                            $newBeer[] = new ValueObjects\Beer($beer);
                        }
                        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array(new JsonEncoder()));
                        $jsonData = $serializer->serialize($newBeer, 'json', ['json_encode_options' => \JSON_PRESERVE_ZERO_FRACTION]);
                        $data = json_decode($jsonData, true);

                        $status = Response::HTTP_OK;
                    }
                }
            } catch (ClientException $exception) {
                $status = Response::HTTP_NOT_FOUND;
            }
        } elseif (null === $request->get('food')) {
            $status = Response::HTTP_BAD_REQUEST;
        }

        $response = new JsonResponse();
        $response->setData([
            'beers'  => $data,
            'status' => $status
        ]);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/beer/detail", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getBeerDetailByIdAction(Request $request): JsonResponse
    {
        $id = $request->get('id','');
        $status = Response::HTTP_NO_CONTENT;
        $data = [];

        if (!empty($id)) {
            $newBeer = [];
            $client = new Client();
            $responseBeers = $client->get(self::API_URL.'?ids='.$id);
            try {
                if (null !== $responseBeers && 200 === $responseBeers->getStatusCode()) {
                    $beersByDetail = $responseBeers->json();
                    if (!empty($beersByDetail)) {
                        foreach ($beersByDetail as $beer) {
                            $newBeer[] = new ValueObjects\BeerDetail($beer);
                        }
                        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array(new JsonEncoder()));
                        $jsonData = $serializer->serialize($newBeer, 'json', ['json_encode_options' => \JSON_PRESERVE_ZERO_FRACTION]);
                        $data = json_decode($jsonData, true);

                        $status = Response::HTTP_OK;
                    }
                }
            } catch (ClientException $exception) {
                $status = Response::HTTP_NOT_FOUND;
            }
        } elseif (null === $request->get('id')) {
            $status = Response::HTTP_BAD_REQUEST;
        }

        $response = new JsonResponse();
        $response->setData([
            'beers'  => $data,
            'status' => $status
        ]);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}