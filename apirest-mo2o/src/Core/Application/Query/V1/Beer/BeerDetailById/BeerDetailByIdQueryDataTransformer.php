<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:26
 */

namespace App\Core\Application\Query\V1\Beer\BeerDetailById;


use App\Core\Application\DataTransformer\DataTransformer;
use App\Core\Domain\Bus\QueryResponse;
use App\Core\Domain\Model\Beer\BeerDetail;

class BeerDetailByIdQueryDataTransformer implements DataTransformer
{
    /** @var BeerDetailByIdQueryResponse */
    private $beersDetailByIdQueryResponse;

    /**
     * @param QueryResponse $object
     */
    public function write(QueryResponse $object)
    {
        $this->beersDetailByIdQueryResponse = $object;
    }

    /**
     * @return array
     */
    public function read(): array
    {
        return
            array_map(function (BeerDetail $beer) {
                return [
                    'id'            => $beer->id(),
                    'name'          => $beer->name(),
                    'description'   => $beer->description(),
                    'image'         => $beer->image(),
                    'slogan'        => $beer->slogan(),
                    'firstBrewed'   => $beer->firstBrewed()
                ];
            }, $this->beersDetailByIdQueryResponse->beers());
    }
}