<?php
/**
 * Created by PhpStorm.
 * User: chevi
 * Date: 7/06/21
 * Time: 20:09
 */

namespace App\Core\Application\DataTransformer;


use App\Core\Domain\Bus\QueryResponse;

interface DataTransformer
{
    public function write(QueryResponse $queryResponse);

    public function read(): array;
}