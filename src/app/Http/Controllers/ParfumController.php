<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\services\Parfume;
use App\Models\AddParfume;

class ParfumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function create(Request $request)
    {
        $data = $request->post();
        $addParfume = new AddParfume(['name'=>$data['name'],'slug'=>$data['slug'],'description'=>$data['description'],'big_img'=>$data['big_icon'],'small_img'=>$data['small_icon'],'category'=>$data['category']]);
//        $addParfume->save();
        return redirect()->back([
            'error'=> 'no valid'
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
