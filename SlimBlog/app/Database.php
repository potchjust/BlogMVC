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

    public function query($statement, $attributes = false, $class_name = false, $one = false)
    {
        if ($attributes) {
            $request = $this->pdo->prepare($statement);
            $request->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $request->execute($attributes);
            if ($one) {
                $datas = $request->fetch();
            } else {
                $datas = $request->fetchAll();
            }
        } else {
            $request = $this->pdo->query($statement);
            $datas = $request->fetchAll(PDO::FETCH_CLASS, $class_name);
        }
        return $datas;
    }
}