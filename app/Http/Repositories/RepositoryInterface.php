<?php

namespace App\Http\Repositories;

/**
 * Class RepositoryInterface
 */
interface RepositoryInterface
{
    /**
     * Get all records
     *
     * @param array $params
     * @return mixed
     */
    public function all(array $params = []): mixed;

    /**
     * Create New Record
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed;

    /**
     * Bulk insert
     *
     * @param array $data
     * @return mixed
     */
    public function insert(array $data): mixed;

    /**
     * Update existing record by id
     *
     * @param array $params
     * @param int $id
     * @return mixed
     */

    public function update(int $id, array $params): mixed;

    /**
     * Delete records requested ids
     *
     * @param integer $id
     * @return mixed
     */
    public function delete(int $id): mixed;

    /**
     * Find record by id
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed;
}
