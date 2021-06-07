<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:24
 */

namespace App\Core\Infraestructure\Action\V1\Beer;


use App\Core\Application\Query\V1\Beer\BeerByFood\BeerByFoodQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

final class GetBeersByFoodAction extends AbstractController
{
    /** @var MessageBusInterface */
    private $queryBus;

    /**
     * GetBeersByFoodAction constructor.
     * @param MessageBusInterface $queryBus
     */
    public function __construct(MessageBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    /**
     * Lists Beer by food.
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): Response
    {
        $status = Response::HTTP_NO_CONTENT;
        if (null === $request->get('food')) {
            $status = Response::HTTP_BAD_REQUEST;
        } else {
            $food = $request->get('food','');
            $beers = new BeerByFoodQuery($food);
            if (!empty($beers->food())) {
                $result = $this->queryBus->dispatch($beers)->last(HandledStamp::class)->getResult();
            }
        }

        $response = new JsonResponse();
        $response->setData([
            'beers'     => $result['beers'] ?? [],
            'status'    => $result['status'] ?? $status
        ]);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}