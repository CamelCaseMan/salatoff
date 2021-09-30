<?php

namespace App\Http\Controllers\Manager;

class ManagerController
{
    public function showMainPage()
    {
        return view('manager.index');
    }
}