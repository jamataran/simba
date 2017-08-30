<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UsuariosRepository extends EntityRepository implements UserLoaderInterface
{

    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function loadUserByUsername($username)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT u FROM
           AppBundle:Usuarios u
           WHERE u.username = :username
           OR u.email = :username')
            ->setParameters(array(
                'username' => $username
            ))
            ->getOneOrNullResult();
    }

    public function supportsClass($class)
    {
        return $class === 'AppBundle\Entity\Usuarios';
    }
}