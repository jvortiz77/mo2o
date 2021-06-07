<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:12
 */

namespace App\Core\Domain\Model\Beer;


class BeerDetail extends Beer
{
    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $slogan;

    /**
     * @var string
     */
    private $firstBrewed;

    /**
     * BeerDetail constructor.
     * @param mixed $beer
     */
    public function __construct($beer)
    {
        parent::__construct($beer);
        $this->image = $beer['image_url'];
        $this->slogan = $beer['tagline'];
        $this->firstBrewed = $beer['first_brewed'];
    }

    /**
     * @return string
     */
    public function image(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function slogan(): string
    {
        return $this->slogan;
    }

    /**
     * @return string
     */
    public function firstBrewed(): string
    {
        return $this->firstBrewed;
    }
}