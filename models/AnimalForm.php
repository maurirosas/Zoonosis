<?php

namespace app\models;

use yii\base\Model;
use app\models\domain\entity\Animal;

class AnimalForm extends Model
{
    public $id_animal;
    public $nombre_animal;
    public $genero;
    public $zona_direccion;
    public $tipo_dueno ;
    public $edad;
    public $especie;

    public function rules()
{
    return [
        [['nombre_animal', 'genero', 'zona_direccion', 'tipo_dueno', 'edad', 'especie'], 'required'],
        [['nombre_animal', 'genero', 'zona_direccion', 'especie', 'edad'], 'string'],
        [['tipo_dueno'], 'integer'],
    ];
}


    public function create() : bool{
        $this->id_animal = uniqid();
        
        $animal = new Animal();
        $animal->load($this->attributes);        
        return $animal->create() > 0;
    }
    
    public function update() : bool{
        $animal = Animal::getById($this->id_animal);
        $animal->nombre_animal = $this->nombre_animal;
        $animal->genero = $this->genero;
        $animal->zona_direccion = $this->zona_direccion;
        $animal->tipo_dueno = $this->tipo_dueno;
        $animal->edad = $this->edad;
        $animal->especie = $this->especie;

        return $animal->update() > 0;
    }
}