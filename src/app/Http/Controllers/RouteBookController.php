<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookAdd;
use App\model\Audition;
use App\model\BaseReader;
use App\model\Book;
use Illuminate\Http\Request;
use App\model\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RouteBookController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'authors' => Author::all(),
            'auditions' => Audition::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $addBook = new Book([
            'name' => $request->name,
            'author_id' => $request->authors,
            'year' => $request->years,
            'audition_id' => $request->auditions
        ]);
        $addBook->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author();

        if (session('key')) {
            return view('bookView.book', [
                'author' => $author,
                'books' => Book::all(),
                'audition' => Audition::all(),
                'baseReader' => BaseReader::all()
            ]);
        }
        try {
            $this->validate($request, StoreBookAdd::createFromBase($request)->rules());
        } catch (ValidationException $e) {
            return redirect()->back()->with([
                'errors' => $e->errors()
            ]);
        }
        session(['key' => true]);
        $this->create($request);
        return view('bookView.book', [
            'author' => $author,
            'books' => Book::all(),
            'audition' => Audition::all(),

        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('bookView.AboutBook', [
            'book' => Book::find($id),
            'author' => new Author(),
//            'baseReader' => Book::all()
        ]);
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
