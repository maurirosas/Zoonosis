<?php

namespace app\models;

use yii\base\Model;
use app\models\domain\entity\Animal;

class AnimalForm extends Model
{
    public $id;
    public $nombre;
    public $genero;
    public $direccion;
    public $tipo_dueno ;
    public $edad ;
    public $especie;

    public function rules()
{
    return [
        [['nombre', 'genero', 'direccion', 'tipo_dueno', 'edad', 'especie'], 'required'],
        [['nombre', 'genero', 'direccion', 'especie', 'edad'], 'string'],
        [['tipo_dueno'], 'integer'],
    ];
}


    public function create() : bool{
        $this->id = uniqid();
        
        $animal = new Animal();
        $animal->load($this->attributes);        
        return $animal->create() > 0;
    }
    
    public function update() : bool{
        $animal = Animal::getById($this->id);
        $animal->nombre = $this->nombre;
        return $animal->update() > 0;
    }
}