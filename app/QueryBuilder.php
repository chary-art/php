<?php

namespace App;

use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder
{
    private $pdo;
    private $queryFactory;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
//        $this->pdo = new PDO('mysql:host=localhost;dbname=app3;charset=utf8', 'root', '');
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function getAll($table)
    {

        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from('posts');
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    }



    public function insert($data, $table)
    {
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);
        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($data, $id, $table)
    {
        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)                  // update this table
            ->cols($data)
            ->where('id = :id')      // bind this value to the condition
            ->bindValue('id', $id);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }

    public function delete($id, $table)
    {
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from($table)                   // FROM this table
            ->where('id = :id')           // AND WHERE these conditions
            ->bindValue('id', $id);   // bind one value to a placeholder
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }
}




