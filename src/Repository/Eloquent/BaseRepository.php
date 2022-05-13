<?php
namespace Stephendevs\Lad\Repository\Eloquent;

use Stephendevs\Lad\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = []) : Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function paginate(int $count, array $columns = ['*'], array $relations = []) : LengthAwarePaginator
    {
        return $this->model->with($relations)->paginate($count, $columns);
    }


    public function find($modelId, $columns = ['*'], array $relations = [], array $appends = []) : ? Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    /**
     * Get model using a specific column or columns
     * 
     * @param array $payLoad
     * @param array $columns
     * @param array $appends
     */
    public function get(array $payLoad, array $columns = ['*'], array $relations = [], array $appends = []) : ? Model
    {
        return $this->model->select($columns)->where($payLoad)->with($relations)->firstOrFail()->append($appends);
    }

    public function keys() : array
    {
        return $this->all()->modelKeys();
    }

    public function create(array $payLoad) : ? Model
    {
        $model = $this->model->create($payLoad);
        return $model->fresh();
    }


    /**
     * Delete Model By Its Id
     * 
     * @param int $modelId
     * @return boolean
     */
    public function destroy(int $modelId) : bool
    {
        return $this->model::destroy($modelId);
    }

    /**
     * Update model by its id
     * 
     * @param $modelId
     * @param $payLoad
     */
    public function update(int $modelId, array $payLoad) : bool
    {
        $model = $this->model->findOrFail($modelId);
        return $model->update($payLoad);
    }



}