<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 19:25
 */

namespace App\ValueObjects;


/**
 * Class Beer
 */
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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}