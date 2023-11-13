<?php

namespace app\models;

use yii\base\Model;
use app\models\domain\entity\Rabia;

class RabiaForm extends Model
{
    public $id;
    public $municipio;
    public $area;
    public $fecha;
    public $json;
    public $id_dueno;
    public $id_animal;

    public function rules()
{
    return [
        [['municipio', 'area','json', 'id_dueno', 'id_animal'], 'required'],
        [['municipio', 'json'], 'string'],
        [['area'], 'boolean'],
    ];
}


    public function create() : bool{
        $this->id = uniqid();
        
        $animal = new Rabia();
        $animal->load($this->attributes);        
        return $animal->create() > 0;
    }
    
    public function update() : bool{
        $animal = Rabia::getById($this->id);
        $animal->nombre = $this->nombre;
        return $animal->update() > 0;
    }
}