<?php

namespace app\models\domain\entity;

use app\models\domain\repository\DAOFactory;

class Esterilizacion{

    public int $id = 0 ;
    public string $tatuaje= '';
    public ?date $fecha= null;
    public string $dataType='';
    public int $id_dueno=0;
    public int $id_animal=0;


    public function load(array $attributes) : static
    {
        foreach($attributes as $key => $value){
            $this->{$key} = $value;
        }

        return $this;
    }

    public static function getById(string $id): static 
    {
        $data = DAOFactory::getEsterilizacionDAO()->getById($id);
        $model = new Esterilizacion();
        $model->load($data);
        return $model;
    }  
    
    public static function getAll(): array{
        return DAOFactory::getEsterilizacionDAO()->getAll();
    }

    public function create() : int {
        return DAOFactory::getEsterilizacionDAO()->create($this);
    }    

    public function update() : int {
        return DAOFactory::getEsterilizacionDAO()->update($this);
    }

    public function delete() : int {
        return DAOFactory::getEsterilizacionDAO()->delete($this);
    }  
}