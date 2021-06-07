<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:11
 */

namespace App\Core\Domain\Model\Beer;


class Beer
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /**
     * Beer constructor.
     * @param mixed $beer
     */
    public function __construct($beer)
    {
        $this->id = $beer['id'];
        $this->name = $beer['name'];
        $this->description = $beer['description'];
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }
}