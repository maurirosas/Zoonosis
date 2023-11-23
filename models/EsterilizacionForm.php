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
        $arrayJson = [ 
            'confinamiento' => $this->confinamiento,
            'comportamiento' => $this-> comportamiento,
            'visita_veterinario' => $this -> visita_veterinario,
            'vacuna_rabia' => $this -> vacuna_rabia,
            'acceso_vacuna_rabia' => $this -> acceso_vacuna_rabia,
            'desparasitado' => $this ->desparasitado,
            'anticonceptiva' => $this -> anticonceptiva,
            'adquisicion' => $this -> adquisicion,
            'parido' => $this -> parido,
            'camada' => $this -> camada,
            'condicion_corporal' => $this -> condicion_corporal,
            'condicion_piel' => $this -> condicion_piel,
            'regreso' => $this -> regreso,
            'nombre_veterinario' => $this -> nombre_veterinario,
            'nombre_ayudante' => $this -> nombre_ayudante,
            'fue_animal' => $this -> fue_animal,
            'sevacuno_animal' => $this -> sevacuno_animal,
            'celo' => $this -> celo,
            'prenada' => $this -> prenada,
            'condicion_presenta_mascota' => $this -> condicion_presenta_mascota
        ];
        
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