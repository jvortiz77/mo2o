<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:16
 */

namespace App\Core\Application\Query\V1\Beer\BeerByFood;


use App\Core\Infraestructure\Repository\BeerRepository;

class BeerByFoodQueryService
{
    /** @var BeerRepository */
    private $beerRepository;

    /** @var BeerByFoodQueryDataTransformer */
    private $dataTransformer;

    /**
     * BeerByFoodQueryService constructor.
     * @param BeerRepository $beerRepository
     * @param BeerByFoodQueryDataTransformer $dataTransformer
     */
    public function __construct(
        BeerRepository $beerRepository,
        BeerByFoodQueryDataTransformer $dataTransformer
    ) {
        $this->dataTransformer = $dataTransformer;
        $this->beerRepository = $beerRepository;
    }

    /**
     * @param string $food
     * @return array
     */
    public function execute(string $food): array
    {
        $responseSearch = $this->beerRepository->findBeersByFood($food);

        $status = $responseSearch['status'];
        $beers = $responseSearch['beers'];
        if (200 === $status && !empty($beers)) {
            $this->dataTransformer->write(new BeerByFoodQueryResponse($beers));
        }

        return [
            'beers'     => !empty($beers) ? $this->dataTransformer->read() : [],
            'status'    => $status
        ];
    }
}