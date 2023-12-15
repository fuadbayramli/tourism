<?php

namespace App\Http\Repositories\PhoneInfo;

use App\Http\Repositories\BaseRepository;
use App\Models\PhoneInfo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class PhoneInfo Repository
 */
class PhoneInfoRepository extends BaseRepository
{
    /**
     * PhoneInfoRepository Constructor
     *
     * @param PhoneInfo $model
     */
    public function __construct(PhoneInfo $model)
    {
        parent::__construct($model);
    }

    /**
     * Get article by id
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed
    {
        $collection = $this->model::findOrFail($id);

        if (!$collection) {
            return null;
        }

        return $collection;
    }

    /**
     * * Get all articles
     *
     * @param array $params
     * @return LengthAwarePaginator|null
     */
    public function all(array $params = []): ?LengthAwarePaginator
    {
        $currentPage = request()->input('page', 1);
        Cache::forget('phoneInfoData'. $currentPage);

        $collection = $this->model::query()->select(['id', 'name', 'surname', 'phone', 'email', 'address']);

        if (isset($params['name']) && $params['name']) {
            Cache::forget('phoneInfoData'. $currentPage);
            $collection = $collection->whereRaw("concat(name, ' ', surname) like '%" . $params['name'] . "%' ");
        }
        if (isset($params['phone']) && $params['phone']) {
            Cache::forget('phoneInfoData'. $currentPage);
            $collection = $collection->where('phone', $params['phone']);
        }
        if (isset($params['email'])) {
            Cache::forget('phoneInfoData'. $currentPage);
            $collection = $collection->where('email', $params['email']);
        }
        if (isset($params['address'])) {
            Cache::forget('phoneInfoData'. $currentPage);
            $collection = $collection->where('address', $params['address']);
        }
        if (isset($params['sort'])) {
            Cache::forget('phoneInfoData'. $currentPage);
            $collection = $collection->orderBy($params['sortBy'], $params['sort']);;
        }

        $collection = $collection->paginate(10);

        if (!$collection) {
            return null;
        }

        return Cache::remember('phoneInfoData' . $currentPage, now()->addHour(), function () use ($collection, $params) {
            return $collection->appends($params);
        });
    }

    /**
     * Find phone info by ID
     *
     * @param int $id
     * @return mixed|null
     */
    public function findById(int $id): mixed
    {
        return $this->model::findOrFail($id);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function bulkDelete(Request $request): JsonResponse
    {
        $selectedPhoneInfos = $this->model::findOrFail($request->s_id);
        foreach ($selectedPhoneInfos as $data) {
            $delete = $data->delete();
        }

        if (isset($delete)) {
            return response()->json(['status' => 'success'], 200);
        }

        return response()->json("error");
    }
}
