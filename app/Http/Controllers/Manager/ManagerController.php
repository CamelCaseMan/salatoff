<?php

namespace App\Http\Controllers\Manager;

class ManagerController
{
    public function showMainPage()
    {
        $name = 'Андрей';
        return view('manager.index', compact('name'));
    }
}