<?php

namespace app\models\domain\repository;

use PDO;
use Yii;
use app\models\domain\entity\Rabia;

class RabiaDAO{

    public function getAll(): array
    {

        $cmd = Yii::$app->db->createCommand("
            SELECT *
            FROM documento_rabia
            ORDER BY id_doc_rabia
        ");
        return $cmd->queryAll();

    }

    public function getById(string $id): array
    {
        
        $cmd = Yii::$app->db->createCommand("
            SELECT *
            FROM documento_rabia
            WHERE id_doc_rabia = :id_doc_rabia
        ");

        $cmd->bindValue(':id_doc_rabia', $id, PDO::PARAM_INT);

        return $cmd->queryOne();

    }


    public function create(Rabia $rabia) : int
    {
        $cmd = Yii::$app->db->createCommand("
            INSERT INTO documento_rabia (id_doc_rabia, municipio, area, json, id_dueno, id_animal) 
            VALUES(:id_doc_rabia, :municipio, :area, :json, :id_dueno, :id_animal);
        ");

        $cmd->bindValues([
            ':id_doc_rabia' => $rabia->id,
            ':municipio' => $rabia->municipio,
            ':area'=>$rabia -> area,
            ':json'=> $rabia -> json,
            ':id_dueno' => $rabia -> id_dueno,
            ':id_animal' => $rabia -> id_animal,
        ]);

        return $cmd->execute();
    }

    public function update(Rabia $rabia) : int
    {
        $cmd = Yii::$app->db->createCommand("
            UPDATE documento_rabia SET
            municipio = :municipio,
            area = :area,
            json = :json,
            id_dueno = :id_dueno,
            id_animal = :id_animal,
            WHERE id = :id_doc_rabia            
        ");

        $cmd->bindValues([
            ':id_doc_rabia' => $rabia->id,
            ':municipio' => $rabia->municipio,
            ':area'=>$rabia -> area,
            //':fecha_registro_rabia' => $rabia -> fecha,
            ':json'=> $rabia -> json,
            ':id_dueno' => $rabia -> id_dueno,
            ':id_animal' => $rabia -> id_animal,
        ]);

        return $cmd->execute();
    }

    public function delete(Rabia $rabia) : int
    {
        
        $cmd = Yii::$app->db->createCommand("
            DELETE FROM documento_rabia
            WHERE id_rabia = :id            
        ");

        $cmd->bindValues([
            ':id_doc_rabia' => $rabia->id,
        ]);

        return $cmd->execute();
    }

}
