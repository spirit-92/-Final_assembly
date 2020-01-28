<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBaseReaders;
use App\model\BaseReader;
use App\model\Book;
use App\model\RateBook;
use App\model\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('bookView.AddReader', [
            'readers' => Reader::all(),
            'books' => Book::all(),
            'rate' => RateBook::all()
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaseReaders $request)
    {
        $checkRepeat = BaseReader::where('id_reader', $request->reader)->where('id_book', $request->book)->count();
        if ($checkRepeat) {
            BaseReader::where('id_reader', $request->reader)->where('id_book', $request->book)->update(['id_rate' => $request->rate]);
            return redirect('/books');
        } else {
            $saveBaseReader = new BaseReader([
                'id_reader' => $request->reader,
                'id_book' => $request->book,
                'id_rate' => $request->rate
            ]);
            $saveBaseReader->save();
            return redirect('/books');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
