<?php

namespace app\models\domain\repository;

use PDO;
use Yii;
use app\models\domain\entity\Esterilizacion;

class EsterilizacionDAO{

    public function getAll(): array
    {

        $cmd = Yii::$app->db->createCommand("
            SELECT *
            FROM documento_esterilizacion
            ORDER BY id_esterilizacion
        ");
        return $cmd->queryAll();

    }

    public function getById(string $id): array
    {
        
        $cmd = Yii::$app->db->createCommand("
            SELECT *
            FROM documento_esterilizacion
            WHERE id = :id
        ");

        $cmd->bindValue(':id', $id, PDO::PARAM_INT);

        return $cmd->queryOne();

    }

    //Pendiente para preguntar
    public function create(Esterilizacion $esterilizacion) : int
    {
        $cmd = Yii::$app->db->createCommand("
            INSERT INTO producto (id, nombre) 
            VALUES(:id, :nombre);
        ");

        $cmd->bindValues([
            ':id' => $esterilizacion->id,
            ':nombre' => $esterilizacion->tatuaje
        ]);

        return $cmd->execute();
    }

    public function update(Esterilizacion $esterilizacion) : int
    {
        $cmd = Yii::$app->db->createCommand("
            UPDATE producto SET
            nombre = :nombre
            WHERE id = :id            
        ");

        $cmd->bindValues([
            ':id' => $esterilizacion->id,
            ':nombre' => $esterilizacion->tatuaje
        ]);

        return $cmd->execute();
    }

    public function delete(Esterilizacion $esterilizacion) : int
    {
        
        $cmd = Yii::$app->db->createCommand("
            DELETE FROM producto
            WHERE id = :id            
        ");

        $cmd->bindValues([
            ':id' => $esterilizacion->id,
        ]);

        return $cmd->execute();
    }

}