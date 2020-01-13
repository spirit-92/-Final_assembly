<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Fake_users;
use App\model\Country;
use Illuminate\Validation\ValidationException;
use App\model\Add_fakeUsers;

class RestRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrys = Country::all();
        return view('form.form',[
            'country'=>$countrys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:10|min:3',
                'country' => 'required|exists:country,id',
                'dateBirthday' => 'required|date|before:tomorrow',
                'city' => "required|exists:city,city,id_country,$request->country",
                'img'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'aboutUser'=> 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->with([
                'errors' => $e->errors()
            ]);
        }
//        $nameUser = $request->post('name');
//
//        $imgUrl = $request->file('img')->store("public/img/$nameUser");
     $urlImg = 'public/img/Дмитрийs/kMYgapEgqZtKYlJsLge7jw29rRuDt7khWGJnVN5p.png';
        return view('form.main',[
            'img'=>$urlImg
        ]);

//      $addFakeUser = new Add_fakeUsers([
//          'username'=>$request->post('name'),
//          'img'=>$imgUrl,
//          'date_birth'=>$request->post('dateBirthday'),
//          'gender'=>$request->post('gender'),
//          'country'=>$request->post('country'),
//          'city'=>$request->post('city'),
//          'about_user' =>$request->post('aboutUser')
//      ]);
//      $addFakeUser->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
