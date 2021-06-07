<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:25
 */

namespace App\Core\Application\Query\V1\Beer\BeerDetailById;


use App\Core\Domain\Bus\Query;

class BeerDetailByIdQuery implements Query
{
    /** @var string */
    private $id;

    /**
     * BeerDetailByIdQuery constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}