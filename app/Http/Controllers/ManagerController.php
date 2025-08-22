<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('managers.index'); // This should match the blade file you'll create
    }

    public function create()
    {
        return view('managers.create'); // This should match the blade file you'll create
    }

     public function addManager(Request $req)
    {

        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'job_title' => 'required',
            'experties' => 'required',
            'job_contract_type' => 'required',
            'number' => 'required|numeric',

            'address' => 'required',
        ]);

        return $req->all();
    }
}

