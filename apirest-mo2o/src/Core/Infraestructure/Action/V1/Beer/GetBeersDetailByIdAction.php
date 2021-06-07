<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:30
 */

namespace App\Core\Infraestructure\Action\V1\Beer;


use App\Core\Application\Query\V1\Beer\BeerDetailById\BeerDetailByIdQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

final class GetBeersDetailByIdAction extends AbstractController
{
    /** @var MessageBusInterface */
    private $queryBus;

    /**
     * GetBeersDetailByIdAction constructor.
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
        if (null === $request->get('id')) {
            $status = Response::HTTP_BAD_REQUEST;
        } else {
            $id = $request->get('id','');
            $beers = new BeerDetailByIdQuery($id);
            if (!empty($beers->id())) {
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