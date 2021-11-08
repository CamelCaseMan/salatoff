<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Client\ClientService;
use Auth;

class ProfileController extends Controller
{
    private $clientProfile;

    /*public function __construct(ClientService $clientService)
    {
        $this->clientProfile = $clientService;
    }*/

    public function getProfile(ClientService $clientService)
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)
            ->where('status', '1')
            ->get();



       // $id = Auth::user()->id;
        /*$orders = $clientService->getAllOrders($id);
        */

        //return view('client.index', compact('orders', 'user'));
        return view('client.index', compact('user', 'orders'));
    }

/*    public function changeInfo(ChangeProfileClientRequest $request)
    {
        $id = Auth::user()->id;
        $this->clientProfile->updateProfile($id, $request);

        return redirect()
            ->route('profile')
            ->with(['status' => 'Данные успешно изменены']);
    }*/

/*    public function changePassword(ChangePasswordClientRequest $request)
    {
        $id = Auth::user()->id;
        $res = $this->clientProfile->updatePassword($id, $request);
        if ($res) {
            return redirect()
                ->route('profile')
                ->with(['status' => 'Пароль успешно изменен']);
        } else {
            return redirect()
                ->route('profile')
                ->with(['status' => 'Вы не верно указали старый пароль!']);
        }
    }*/
}
