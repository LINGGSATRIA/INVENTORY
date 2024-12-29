<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function Stok(): string
    {
        return view('stokpusat');
    }
    
    public function DataRanpur(): string
    {
        return view('dataranpur');
    }

}
