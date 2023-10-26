<?php
    namespace app\models\domain\entity;
    use app\models\domain\repository\DAOFactory;

    class animal{
        public int $id = '';
        public string $nombre = '';
        public bool $genero = '';
        public string $direccion = '';
        public int $tipo_dueno = '';
        public int $edad ='';
        public string $especie = '';

        public function load(array $attributes) : static
    {
        foreach($attributes as $key => $value){
            $this->{$key} = $value;
        }

        return $this;
    }

    public static function getById(string $id): static 
    {
        $data = DAOFactory::getProductoDAO()->getById($id);
        $model = new Producto();
        $model->load($data);
        return $model;
    }  
    
    public static function getAll(): array{
        return DAOFactory::getProductoDAO()->getAll();
    }

    public function create() : int {
        return DAOFactory::getProductoDAO()->create($this);
    }    

    public function update() : int {
        return DAOFactory::getProductoDAO()->update($this);
    }

    public function delete() : int {
        return DAOFactory::getProductoDAO()->delete($this);
    }
    
    } 
?>
