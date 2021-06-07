<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:26
 */

namespace App\Core\Application\Query\V1\Beer\BeerDetailById;


use App\Core\Domain\Bus\QueryResponse;

class BeerDetailByIdQueryResponse implements QueryResponse
{
    /** @var array */
    private $beers;

    /**
     * BeerDetailByIdQueryResponse constructor.
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