<?php

namespace app\models;

use yii\base\Model;
use app\models\domain\entity\Esterilizacion;

class EsterilizacionForm extends Model
{
    public $id;
    public $nombre;

    public function rules()
    {
        return [
            ['nombre', 'required'],
            ['nombre', 'string', 'min' => 3],
            ['id', 'safe'],
        ];
    }

    public function create() : bool{
        $this->id = uniqid();
        
        $esterilizacion = new Esterilizacion();
        $esterilizacion->load($this->attributes);        
        return $esterilizacion
        ->create() > 0;
    }
    
    public function update() : bool{
        $producto = Esterilizacion::getById($this->id);
        $producto->id = $this->id;
        return $producto->update() > 0;
    }
}