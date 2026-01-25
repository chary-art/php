<?php

namespace App;
use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder
{
    public function getAll($table)
    {
        $queryFactory = new QueryFactory('mysql');
        $select = $queryFactory->newSelect();
        $select->cols(['*'])
            ->from('posts');
        $pdo = new PDO('mysql:host=localhost;dbname=app3;charset=utf8', 'root', '');
        $sth = $pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    }
}




