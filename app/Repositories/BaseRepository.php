<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class BaseRepository  implements  RepositoryInterface
{

    /**
     * @var
     */
    protected $model;
    /**
     * EloquentBaseRepository constructor.
     * @param $model
     */
    public function setModel(Model $model) {
        $this->model = $model;
    }
    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        return $this->model->get($columns);
    }
    /**
     * @return mixed
     */
    public function countAll() {
        return $this->model->count();
    }
    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 1, $columns = array('*')) {
        return $this->model->paginate($perPage, $columns);
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        return $this->model->create($data);
    }
    /**
     * @param array $id
     * @param array $data
     * @return mixed
     */
    public function update($id,array $data) {
        $row = $this->model->find($id);
        if(!$row)
        {
            return false;
        }
        return $row->fill($data)->save();
    }
    /**
     * @param $attributes
     * @param array $data
     * @return bool
     */
    public function updateBy($attributes,array $data) {
        return $this->model->where($attributes)->update($data);
    }
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        return $this->model->destroy($id);
    }
    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        return $this->model->find($id);
    }
    /**
     * @param array $attributes
     * @param null $orderBy
     * @param string $sortOrder
     * @param null $pagination
     * @param array $with
     * @param array $columns
     * @return mixed
     */
    public function getManyByAttributes(array $attributes,$orderBy = null,$sortOrder = 'asc',$pagination = null,$with = [],$columns = array("*")) {
        $query = $this->queryBuilder($attributes,$orderBy,$sortOrder);
        if(!empty($with)) {
            foreach ($with as $relation) {
                $query = $query->with($relation);
            }
        }
        $query = $pagination == null ? $query->get($columns) : $query->select($columns)->paginate($pagination);
        return $query;
    }
    /**
     * @param array $attributes
     * @return mixed
     */
    public function findByAttributes(array $attributes,$with = [],$columns = array("*"),$random = false )
    {
        $query = $this->queryBuilder($attributes);
        if(!empty($with)) {
            foreach ($with as $relation) {
                    $query = $random ? $query->with([$relation => function($query){
                        $query->inRandomOrder();
                    }]) : $query->with($relation);
            }

        }
        return $query->first($columns);
    }
    /**
     * @param array $attributes
     * @return mixed
     */
    public function countByAttributes(array $attributes)
    {
        $query = $this->queryBuilder($attributes);
        return $query->count();
    }
    /**
     * @param array $attributes
     * @param null $orderBy
     * @param string $sortOrder
     * @return mixed
     */
    protected function queryBuilder(array $attributes,$orderBy = null,$sortOrder = 'asc')
    {
        $query = $this->model->query();
        foreach ($attributes as $field => $value) {
            if($field == 'where_in')
            {
                $query = $query->whereIn(key($value), $value[key($value)]);
            }
            else if($field == 'limit')
            {
                $query = $query->limit($value);
            }
            else if($field == 'like')
            {
                foreach($value as $col=>$like)
                {
                    $query = $query->where($col,'LIKE',$like);
                }
            }
            else if($field == 'not'){
                foreach($value as $col=>$like)
                {
                    $query = $query->where($col,'!=',$value);
                }
            }
            else{
                $query = $query->where($field, $value);
            }
        }
        if (null !== $orderBy) {
            if(!is_array($orderBy))
            {
                $orderBy = [$orderBy];
            }
            foreach($orderBy as $order)
            {
                $query->orderBy($order, $sortOrder);
            }
        }
        return $query;
    }
    /**
     * @param array $attributes
     * @return mixed
     */
    public function deleteBy(array $attributes)
    {
        return $this->model->where($attributes)->delete();
    }
}
