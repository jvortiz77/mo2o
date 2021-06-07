<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:19
 */

namespace App\Core\Application\Query\V1\Beer\BeerByFood;


use App\Core\Domain\Bus\QueryResponse;

class BeerByFoodQueryResponse implements QueryResponse
{
    /** @var array */
    private $beers;

    /**
     * BeerByFoodQueryResponse constructor.
     * @param array $beers
     */
    public function __construct(array $beers)
    {
        $this->beers = $beers;
    }

    /**
     * @return array
     */
    public function beers(): array
    {
        return $this->beers;
    }
}