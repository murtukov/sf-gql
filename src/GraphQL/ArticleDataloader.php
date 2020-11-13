<?php

namespace App\GraphQL;

use App\Repository\ArticleRepository;
use Overblog\DataLoader\DataLoader;
use Overblog\PromiseAdapter\PromiseAdapterInterface;

class ArticleDataloader extends DataLoader
{
    public function __construct(PromiseAdapterInterface $promiseFactory, ArticleRepository $repository)
    {
        parent::__construct(
            static function ($ids) use ($repository, $promiseFactory) {
                return $promiseFactory->createAll($repository->findBy(['id' => $ids]));
            },
            $promiseFactory
        );
    }
}
