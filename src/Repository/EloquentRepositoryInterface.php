<?php
namespace Stephendevs\Lad\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


interface EloquentRepositoryInterface
{
    /**
     * Get all models
     * 
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []) : Collection;

    public function paginate(int $count, array $columns = ['*'], array $relations = []) : LengthAwarePaginator;

    public function find($modelId, $columns = ['*'], array $relations = [], array $appends = []) : ? Model;

    /**
     * Get model using a specific column or columns
     * 
     * @param array $payLoad
     * @param array $columns
     * @param array $appends
     */
    public function get(array $payLoad, array $columns = ['*'], array $relations = [], array $appends = []) : ? Model;

    /**
     * Get the primary keys for all models in the collection
     */
    public function keys() : array;



    public function create(array $payLoad) : ? Model;

    /**
     * Delete model by its id
     * 
     * @param int $modelId
     * @return boolean
     */
    public function destroy(int $modelId) : bool;

    /**
     * Update model
     * 
     * @param int $modelId
     * @param array $payLoad
     * @return boolean
     */
    public function update(int $modelId, array $payLoad) : bool;

}