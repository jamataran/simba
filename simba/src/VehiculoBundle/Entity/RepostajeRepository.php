<?php
/**
 * Created by IntelliJ IDEA.
 * User: jose
 * Date: 30/8/17
 * Time: 22:58
 */

namespace VehiculoBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class RepostajeRepository extends EntityRepository
{

    public function getRepostajePage($page)
    {
        $pageSize = 10;
        $dql = 'SELECT r From VehiculoBundle:Repostaje';
        $paginator = new Paginator($dql);

        $paginator
            ->getQuery()
            ->setFirstResult($pageSize * ($page - 1))// set the offset
            ->setMaxResults($pageSize);

        return $paginator;
    }

}