<?php

namespace App\GraphQL;

use App\Entity\User;
use App\Repository\UserRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class UserResolver implements ResolverInterface, AliasedInterface
{
    private UserRepository $userRepository;
    private ArticleDataloader $articleDataloader;

    public function __construct(UserRepository $userRepository, ArticleDataloader $articleDataloader)
    {
        $this->userRepository = $userRepository;
        $this->articleDataloader = $articleDataloader;
    }

    public function findAll()
    {
        return $this->userRepository->findAll();
    }

    public function articles(User $user)
    {
        return $this->articleDataloader->loadMany($user->getArticles());
    }

    public static function getAliases(): array
    {
        return [
            'findAll' => 'user/findAll'
        ];
    }
}
