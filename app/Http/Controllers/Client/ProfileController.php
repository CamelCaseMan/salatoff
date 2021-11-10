<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ChangeProfileRequest;
use App\Services\Client\ClientService;
use Auth;

class ProfileController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Страница профиля клиента
     */
    public function getProfile()
    {
        $user = Auth::user();
        $orders = $this->clientService->getAllOrders($user->id);
        return view('client.index', compact('user', 'orders'));
    }

    /**
     * @param ChangeProfileRequest $request
     * @return $this
     * Обновление данных клиента
     */
    public function changeInfo(ChangeProfileRequest $request)
    {
        $id = Auth::user()->id;
        $this->clientService->updateProfile($id, $request);

        return redirect()
            ->route('client.profile')
            ->with(['status' => 'Данные успешно изменены']);
    }

}
