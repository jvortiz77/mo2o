<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:14
 */

namespace App\Core\Domain\Model\Beer;


interface BeerRepositoryInterface
{
    /**
     * @param $food
     * @return array
     */
    public function findBeersByFood($food): array;

    /**
     * @param $id
     * @return array
     */
    public function findBeersById($id): array;
}