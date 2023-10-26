<?php

namespace app\models\domain\repository;

use PDO;
use Yii;
use app\models\domain\entity\Animal;

class AnimalDAO{

    public function getAll(): array
    {

        $cmd = Yii::$app->db->createCommand("
            SELECT *
            FROM paciente_animal
            ORDER BY nombre_animal
            .
        ");
        return $cmd->queryAll();

    }

    public function getById(string $id): array
    {
        
        $cmd = Yii::$app->db->createCommand("
            SELECT *
            FROM paciente_animal
            WHERE id_animal = :id_animal
        ");

        $cmd->bindValue(':id_animal', $id, PDO::PARAM_INT);

        return $cmd->queryOne();

    }


    public function create(Animal $animal) : int
    {
        $cmd = Yii::$app->db->createCommand("
            INSERT INTO animal (id, nombre_animal, genero, zona_direccion, tipo_dueno, edad, especie) 
            VALUES(:id, :nombre_animal, :genero, :zona_direccion, :tipo_dueno, :edad, :especie);
        ");

        $cmd->bindValues([
            ':id' => $animal->id,
            ':nombre' => $animal->nombre,
            ':genero' => $animal -> genero,
            'zona_direccion'=> $animal -> direccion,
            'tipo_dueno' => $animal -> tipo_dueno,
            'edad' => $animal -> edad,
        ]);

        return $cmd->execute();
    }

    public function update(Animal $animal) : int
    {
        $cmd = Yii::$app->db->createCommand("
            UPDATE paciente_animal SET
            nombre = :nombre,
            WHERE id = :id            
        ");

        $cmd->bindValues([
            ':id' => $animal->id,
            ':nombre' => $animal->nombre,
            ':genero' => $animal -> genero,
            'zona_direccion'=> $animal -> direccion,
            'tipo_dueno' => $animal -> tipo_dueno,
            'edad' => $animal -> edad,
        ]);

        return $cmd->execute();
    }

    public function delete(Producto $producto) : int
    {
        
        $cmd = Yii::$app->db->createCommand("
            DELETE FROM producto
            WHERE id = :id            
        ");

        $cmd->bindValues([
            ':id' => $producto->id,
        ]);

        return $cmd->execute();
    }

}
