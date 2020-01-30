<?php

namespace App\Http\Controllers;

use App\helpers\SearchHelper;
use App\Http\Requests\StoreBookAdd;
use App\model\Audition;
use App\model\BaseReader;
use App\model\Book;
use App\model\Owner;
use Illuminate\Http\Request;
use App\model\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class RouteBookController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'owners' => Owner::all(),
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
            'book_name' => $request->name,
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
        if (session('key')) {
            return view('bookView.book', [
                'books' => Book::all(),
                'authors' => Author::all()
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
            'books' => Book::all(),
            'authors' => Author::all(),
            'status' => 'книга добавлена'
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
        return view('bookView.EditBook', [
            'book' => Book::find($id),
            'authors' => Author::all(),
            'owners' => Owner::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookAdd $request, $id)
    {
        Book::find($id)->update([
            'book_name' => $request->post()['name'],
            'author_id' => $request->post()['authors'],
            'year' => $request->post()['years'],
            'audition_id' => $request->post()['auditions']
        ]);

        return redirect('/books')->with('status', 'книга обновена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BaseReader::where('id_book', $id)->delete();
        Book::destroy($id);
        return redirect()->back();
    }

    public function searchBook(Request $request)
    {
       $books = SearchHelper::search($request);
        return view('bookView.book', [
            'searchBook' => $books,
            'authors' => Author::all(),

        ]);

    }

}
