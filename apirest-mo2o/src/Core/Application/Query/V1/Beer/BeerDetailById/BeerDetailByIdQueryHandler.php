<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:26
 */

namespace App\Core\Application\Query\V1\Beer\BeerDetailById;


use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class BeerDetailByIdQueryHandler implements MessageHandlerInterface
{
    /** @var BeerDetailByIdQueryService */
    private $beerDetailByIdQueryService;

    /**
     * BeerDetailByIdQueryHandler constructor.
     * @param BeerDetailByIdQueryService $beerDetailByIdQueryService
     */
    public function __construct(BeerDetailByIdQueryService $beerDetailByIdQueryService)
    {
        $this->beerDetailByIdQueryService = $beerDetailByIdQueryService;
    }

    /**
     * @param BeerDetailByIdQuery $beerDetailByIdQuery
     * @return array
     */
    public function __invoke(BeerDetailByIdQuery $beerDetailByIdQuery)
    {
        $id = $beerDetailByIdQuery->id();
        return $this->beerDetailByIdQueryService->execute($id);
    }
}