<?php


namespace App\Repositories;


use App\Interfaces\LinkRepository;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Log;

abstract  class  MainRepositry implements  LinkRepository
{
    /**
     * [$app description]
     * @var [type]
     */
    private $app;

    /**
     * [$model description]
     * @var [type]
     */
    protected $model;

    public function __construct( App $app)
    {
        $this->app=$app;
        $this->makeModel();
    }
    /**
     * [model Especifica el model a ejecutar]
     * @return [type] [description]
     */
    abstract protected function model();

    /**
     * [get Obtiene un objeto de la información]
     * @return [type] [description]
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * [all Obtiene la información del modelo ]
     * @return [type] [description]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * [paginate description]
     * @param integer $perPage [description]
     * @return [type]           [description]
     */
    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }

    /**
     * [create Crea un registro en la entidad]
     * @param array $data [description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function create(array $data, $user = null)
    {
        // Convierte a mayusculas la información
        $data = array_map('mb_strtoupper', $data);
        return $this->model->create($data);
    }

    /**
     * [update Actualiza la información]
     * @param array $data [description]
     * @param  [type] $id        [description]
     * @param string $attribute [description]
     * @return [type]            [description]
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $data = array_map('mb_strtoupper', $data);
        return $u = $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * [delete Elimina la información de la entidad]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * [find Consulta la información de la entidad]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function find($id)
    {
        $data = $this->model->find($id);

        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
    }

    /**
     * [findBy Realiza búsqueda por un filtro y obtiene un registro]
     * @param  [type] $attribute [description]
     * @param  [type] $value     [description]
     * @return [type]            [description]
     */
    public function findBy($attribute, $value)
    {
        return $this->model->where($attribute, '=', $value)->first();
    }

    /**
     * [findAllWhere Realiza búsqueda por un filtro y obtiene un objeto]
     * @param  [type] $attribute [description]
     * @param  [type] $value     [description]
     * @return [type]            [description]
     */
    public function findAllWhere($attribute, $value)
    {
        $data = $this->model->where($attribute, '=', $value)->get();

        if (isset($data[0])) {
            return $data;
        } else {
            return false;
        }
    }

    /**
     * [findAllwherein realiza búsqueda mediante un arreglo]
     * @param  [type] $attribute [description]
     * @param array $in [description]
     * @return [type]           [description]
     */
    public function findAllWherein($attribute, array $in)
    {
        $data = $this->model->whereIn($attribute, $in)->get();

        if (!is_null($data)) {
            return $data;
        } else {
            return false;
        }
    }

    /**
     * [findLike Busqueda por una cedena]
     * @param  [type] $attribute [description]
     * @param  [type] $value     [description]
     * @return [type]            [description]
     */
    public function findLike($attribute, $value)
    {
        $data = $this->model->where($attribute, 'like', $value)->get();

        if (!is_null($data)) {
            return $data;
        } else {
            return false;
        }
    }

    /**
     * [updateWhereIn Actualiza la información]
     * @param array $data [description]
     * @param array $id [description]
     * @param string $attribute [description]
     * @return [type]            [description]
     */
    public function updateWhereIn(array $data, array $id, $attribute = "id")
    {
        $data = array_map('mb_strtoupper', $data);
        return $u = $this->model->whereIn($attribute, $id)->update($data);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Model
     * @throws ErrorException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new \ErrorException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

}
