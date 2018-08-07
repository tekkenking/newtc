<?php

namespace App\Http\Repos;

class BaseRepo
{
    public $model;
    private $rootModel;

    public function __construct()
    {
        $this->model = $this->rootModel = $this->boot();
    }

    public function boot()
    {
        dd('Base Repo can not be used directly.. Must be inherited by another Repo file');
    }

    public function model( $data = '' )
    {
        return ( $data =='' )
            ? new $this->model()
            : new $this->model($data);
    }

    public function all(Array $fields=['*'])
    {
        return $this->rootModel->all($fields);
    }

    public function find($id)
    {
        return $this->rootModel->find($id);
    }

    public function create(Array $data)
    {
        return $this->model->create($data);
    }

    public function update($key, Array $data, $field = 'id')
    {
        return $this->rootModel
            ->where($field, $key)
            ->update($data);
    }

}