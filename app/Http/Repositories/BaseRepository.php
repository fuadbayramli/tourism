<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 */
class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records
     *
     * @param array $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {
      return  $this->model->all();
    }

    /**
     * Create New Record
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * Bulk insert
     *
     * @param array $data
     * @return mixed
     */
    public function insert(array $data): mixed
    {
        return $this->model->insert($data);
    }

    /**
     * Update existing record by id
     *
     * @param array $params
     * @param int $id
     * @return mixed
     */
    public function update(int $id, array $params): mixed
    {
        $record = $this->model::findOrFail($id);

        $record->update($params);

        return $record;
    }

    /**
     * Delete records requested ids
     *
     * @param integer $id
     * @return mixed
     */
    public function delete(int $id): mixed
    {
        return $this->model::find($id)->delete();
    }

    /**
     * Find record by id
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed
    {
        return $this->model::findOrFail($id);
    }
}
