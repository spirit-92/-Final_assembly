<?php

namespace App\Http\Controllers;


use App\Models\AddParfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

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

    }

    public function store(Request $request)
    {

        if (session('key')) {
            return view('my_parfume', [
                'parfume' => session('parfumes')
            ]);

        } else {
            if (!isset($request->allFiles()['small_icon']) || !isset($request->allFiles()['big_icon'])) {
                return redirect()->back()->with([
                    'errors' => ['dont have img']
                ]);
            } else {
                $bigIcon = $request->allFiles()['big_icon'];
                $smallIcon = $request->allFiles()['small_icon'];
                $fileArray = array('big_icon' => $bigIcon, 'small_icon' => $smallIcon);
                $rules = array(
                    'big_icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'small_icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                );
                $validator = Validator::make($fileArray, $rules);
                if ($validator->fails()) {
                    return redirect()->back()->with([
                        'errors' => $validator->errors()->all()
                    ]);
                } else {
                    try {
                        $this->validate($request, [
                            'name' => 'required|unique:userAdd|max:10|min:3',
                            'slug' => 'required|alpha|max:10|min:3|regex:([a-zA-ZO]\s*)',
                            'description' => 'required|min:10',
                            'id' => 'exists:parfume'
                        ]);
                    } catch (ValidationException $e) {
                        return redirect()->back()->with([
                            'errors' => $e->errors()
                        ]);
                    }
                }
            }
            $nameUser = $request->post('name');
            $urlImgBig = $request->file('big_icon')->store("public/img/$nameUser/big_icon");
            $urlImgSmall = $request->file('small_icon')->store("public/img/$nameUser/small_icon");
            $data = $request->post();
            $addParfume = new AddParfume(['name' => $data['name'], 'slug' => $data['slug'], 'description' => $data['description'], 'big_img' => $urlImgBig, 'small_img' => $urlImgSmall, 'category' => $data['category']]);
            $addParfume->save();
            $parfumes = DB::select('select * from userAdd');
            session(['key' => true]);
            session(['parfumes' => $parfumes]);
            return view('my_parfume', [
                'parfume' => $parfumes
            ]);
        }
    }

    public function show($id)
    {

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
