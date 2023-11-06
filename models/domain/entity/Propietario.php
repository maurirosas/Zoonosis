<?php

namespace app\models\domain\entity;

use app\models\domain\repository\DAOFactory;

class propietario
{
    public int $id = 0;
    public int $celular = 0;
    public string $direccion = '';
    public int $tipo_dueno = 0;
    public string $nombre = '';
    public string $apellidos = '';
    public int $telefono = 0;

    public function load(array $attributes): static
    {
        foreach ($attributes as $key => $value) {
            if ($key === 'id') {
                $this->{$key} = intval($value);
            } else if ($key === 'celular') {
                $this->{$key} = intval($value);
            } else if ($key === 'tipo_dueno') {
                $this->{$key} = intval($value);
            } else if ($key === 'telefono') {
                $this->{$key} = intval($value);
            }else {
                $this->{$key} = $value;
            }
        }
        return $this;
    }

    public static function getById(string $id): static
    {
        $data = DAOFactory::getAnimalDAO()->getById($id);
        $model = new Animal();
        $model->load($data);
        return $model;
    }

    public static function getAll(): array
    {
        return DAOFactory::getPropietarioDAO()->getAll();
    }

    public function create(): int
    {
        return DAOFactory::getPropietarioDAO()->create($this);
    }

    public function update(): int
    {
        return DAOFactory::getPropietarioDAO()->update($this);
    }

    public function delete(): int
    {
        return DAOFactory::getPropietarioDAO()->delete($this);
    }
}