<?php

namespace App\GraphQL;

use App\Repository\UserRepository;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class UserResolver implements ResolverInterface, AliasedInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findAll(ResolveInfo $info)
    {
        $selectedFields = $info->getFieldSelection(1);
        $query = $this->userRepository->createQueryBuilder('u');

        if (isset($selectedFields['articles'])) {
            $query
                ->leftJoin('u.articles', 'a')
                ->addSelect('a');
        }

        return $query->getQuery()->getResult();
    }

    public static function getAliases(): array
    {
        return [
            'findAll' => 'user/findAll'
        ];
    }
}
