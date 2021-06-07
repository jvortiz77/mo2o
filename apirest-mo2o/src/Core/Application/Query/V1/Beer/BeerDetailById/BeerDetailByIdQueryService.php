<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:26
 */

namespace App\Core\Application\Query\V1\Beer\BeerDetailById;


use App\Core\Infraestructure\Repository\BeerRepository;

class BeerDetailByIdQueryService
{
    /** @var BeerRepository */
    private $beerRepository;

    /** @var BeerDetailByIdQueryDataTransformer */
    private $dataTransformer;

    /**
     * BeerDetailByIdQueryService constructor.
     * @param BeerRepository $beerRepository
     * @param BeerDetailByIdQueryDataTransformer $dataTransformer
     */
    public function __construct(
        BeerRepository $beerRepository,
        BeerDetailByIdQueryDataTransformer $dataTransformer
    ) {
        $this->dataTransformer = $dataTransformer;
        $this->beerRepository = $beerRepository;
    }

    /**
     * @param string $id
     * @return array
     */
    public function execute(string $id): array
    {
        $responseSearch = $this->beerRepository->findBeersById($id);

        $status = $responseSearch['status'];
        $beers = $responseSearch['beers'];
        if (200 === $status && !empty($beers)) {
            $this->dataTransformer->write(new BeerDetailByIdQueryResponse($beers));
        }

        return [
            'beers'     => !empty($beers) ? $this->dataTransformer->read() : [],
            'status'    => $status
        ];
    }
}