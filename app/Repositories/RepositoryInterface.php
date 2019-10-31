<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function setModel(Model $model);
    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));
    /**
     * @return mixed
     */
    public function countAll();
    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'));
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);
    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id,array $data);
    /**
     * @param array $attributes
     * @param array $data
     * @return mixed
     */
    public function  updateBy($attributes,array $data);
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
    /**
     * @param array $attributes
     * @return mixed
     */
    public function deleteBy(array $attributes);
    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));
    /**
     * @param array $attributes
     * @param array $with
     * @param array $columns
     * @return mixed
     */
    public function findByAttributes(array $attributes,$with = [],$columns = array("*"),$random = false);
    /**
     * @param array $attributes
     * @param null $orderBy
     * @param string $sortOrder
     * @param null $pagination
     * @param array $with
     * @return mixed
     */
    public function getManyByAttributes(array $attributes, $orderBy = null, $sortOrder = 'asc',$pagination = null,$with = []);
    /**
     * @param array $attributes
     * @return mixed
     */
    public function countByAttributes(array $attributes);
}
