<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:15
 */

namespace App\Core\Application\Query\V1\Beer\BeerByFood;


use App\Core\Domain\Bus\Query;

class BeerByFoodQuery implements Query
{
    /** @var string */
    private $food;

    /**
     * BeerByFoodQuery constructor.
     * @param string $food
     */
    public function __construct(string $food)
    {
        $this->food = $food;
    }

    /**
     * @return string
     */
    public function food(): string
    {
        return $this->food;
    }
}