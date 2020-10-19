<?php


namespace App\Interfaces;


interface LinkRepository
{
    public function all();

    public function paginate($perPage = 15);

    public function create(array $data, $user = null);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function findBy($attribute, $value);

    public function findAllWhere($attribute, $value);

    public function findAllWherein($attribute, array $in);

}
