<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 19:25
 */

namespace App\ValueObjects;


/**
 * Class BeerDetail
 */
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
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getSlogan(): string
    {
        return $this->slogan;
    }

    /**
     * @return string
     */
    public function getFirstBrewed(): string
    {
        return $this->firstBrewed;
    }

}