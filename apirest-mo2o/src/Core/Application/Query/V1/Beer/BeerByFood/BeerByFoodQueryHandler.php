<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:16
 */

namespace App\Core\Application\Query\V1\Beer\BeerByFood;


use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class BeerByFoodQueryHandler implements MessageHandlerInterface
{
    /** @var BeerByFoodQueryService */
    private $beerByFoodQueryService;

    /**
     * BeerByFoodQueryHandler constructor.
     * @param BeerByFoodQueryService $beerByFoodQueryService
     */
    public function __construct(BeerByFoodQueryService $beerByFoodQueryService)
    {
        $this->beerByFoodQueryService = $beerByFoodQueryService;
    }

    /**
     * @param BeerByFoodQuery $beerByFoodQuery
     * @return array
     */
    public function __invoke(BeerByFoodQuery $beerByFoodQuery)
    {
        $food = $beerByFoodQuery->food();
        return $this->beerByFoodQueryService->execute($food);
    }
}