<?php

namespace app\models\domain\entity;

use app\models\domain\repository\DAOFactory;

class rabia
{
    public int $id = 0;
    public string $municipio = '';
    public bool $area = false;
    public ?date $fecha_registro = null;
    public string $json = '';
    public int $id_dueno = 0;
    public int $id_animal = 0;

    public function load(array $attributes): static
    {
        foreach ($attributes as $key => $value) {
            if ($key === 'id') {
                $this->{$key} = intval($value);
            } else if ($key === 'id_dueno') {
                $this->{$key} = intval($value);
            }else if ($key === 'id_animal') {
                $this->{$key} = intval($value);
            } else {
                $this->{$key} = $value;
            }
        }
        return $this;
    }

    public static function getById(string $id): static
    {
        $data = DAOFactory::getRabiaDAO()->getById($id);
        $model = new Rabia();
        $model->load($data);
        return $model;
    }

    public static function getAll(): array
    {
        return DAOFactory::getRabiaDAO()->getAll();
    }

    public function create(): int
    {
        return DAOFactory::getRabiaDAO()->create($this);
    }

    public function update(): int
    {
        return DAOFactory::getRabiaDAO()->update($this);
    }

    public function delete(): int
    {
        return DAOFactory::getRabiaDAO()->delete($this);
    }
}
