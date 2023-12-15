<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PhoneInfo\PhoneInfoRepository;
use App\Http\Requests\PhoneInfoCreateRequest;
use App\Http\Requests\PhoneInfoUpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 *  PhoneInfoController
 */
class PhoneInfoController extends Controller
{
    /**
     * @var PhoneInfoRepository
     */
    protected PhoneInfoRepository $phoneInfoRepository;

    /**
     * @param PhoneInfoRepository $phoneInfoRepository
     */
    public function __construct(
        PhoneInfoRepository $phoneInfoRepository
    ) {
        $this->phoneInfoRepository = $phoneInfoRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $phoneInfoData = $this->phoneInfoRepository->all($params);

        return view('site.phone_infos.index', compact('phoneInfoData'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('site.phone_infos.create');
    }

    /**
     * @param PhoneInfoCreateRequest $phoneInfoCreateRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function store(PhoneInfoCreateRequest $phoneInfoCreateRequest)
    {
        $data = $phoneInfoCreateRequest->validated();
        $this->phoneInfoRepository->create($data);

        return redirect(route('phone-infos.index'));
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $phoneInfoData = $this->phoneInfoRepository->findById($id);

        return view('site.phone_infos.edit', compact('phoneInfoData'));
    }

    /**
     * @param int $id
     * @param PhoneInfoUpdateRequest $phoneInfoUpdateRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function update(
        int $id,
        PhoneInfoUpdateRequest $phoneInfoUpdateRequest,
    ) {
        $params = $phoneInfoUpdateRequest->validated();
        $this->phoneInfoRepository->update($id, $params);

        return redirect(route('phone-infos.index'));
    }

    /**
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(int $id)
    {
        $this->phoneInfoRepository->delete($id);

        return redirect(route('phone-infos.index'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function bulkDestroy(Request $request)
    {
        $this->phoneInfoRepository->bulkDelete($request);

        return redirect(route('phone-infos.index'));
    }
}
