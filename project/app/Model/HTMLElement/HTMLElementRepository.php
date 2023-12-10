<?php

namespace App\Model;

use App\Model\BaseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\ResultSetMapping;
class HTMLElementRepository extends BaseRepository
{
    protected function getEntityName(): string
    {
        return 'HTMLElement';
    }
}
