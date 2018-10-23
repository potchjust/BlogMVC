<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 14:39
 */

namespace App;


use PDO;

class Database
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * Database constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query($statement,$attributes=false)
    {
        if ($attributes)
        {
          $request=$this->pdo->prepare($statement);
          $request->setFetchMode(PDO::FETCH_OBJ);
          $request->execute($attributes);
          $datas=$request->fetch();
        }else{
            $request=$this->pdo->query($statement);
            $datas=$request->fetchAll(PDO::FETCH_OBJ);
        }
        return $datas;
    }
}