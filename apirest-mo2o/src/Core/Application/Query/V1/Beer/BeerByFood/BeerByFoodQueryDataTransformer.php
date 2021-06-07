<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:15
 */

namespace App\Core\Application\Query\V1\Beer\BeerByFood;


use App\Core\Application\DataTransformer\DataTransformer;
use App\Core\Domain\Bus\QueryResponse;
use App\Core\Domain\Model\Beer\Beer;

class BeerByFoodQueryDataTransformer implements DataTransformer
{
    /** @var BeerByFoodQueryResponse */
    private $beersByFoodQueryResponse;

    /**
     * @param QueryResponse $object
     */
    public function write(QueryResponse $object)
    {
        $this->beersByFoodQueryResponse = $object;
    }

    /**
     * @return array
     */
    public function read(): array
    {
        return
            array_map(function (Beer $beer) {
                return [
                    'id'            => $beer->id(),
                    'name'        => $beer->name(),
                    'description'   => $beer->description(),
                ];
            }, $this->beersByFoodQueryResponse->beers());
    }
}