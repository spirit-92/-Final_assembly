<?php


namespace App\helpers;


use App\model\Book;
use Illuminate\Http\Request;

class SearchHelper
{
    static function search(Request $request)
    {
        $books = [
            'book'=>[],
            'author'=>[],
            'owner'=>[],
            'country'=>[],
            'city'=>[],
        ];
        if ($request->book !== null) {
         $bookName = Book::where('book_name', 'LIKE', "$request->book%")->get();
            $books['book'][] = $bookName;
        }
        if ($request->author !== null) {
             $bookAuthor= Book::join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.*', 'authors.author_name')
               ->where('authors.author_name', 'LIKE', "$request->author%")->get();
                $books['author'][] = $bookAuthor;
        }
        if ($request->owner !== null) {
            $bookOwner = Book::join('auditions', 'books.audition_id', '=', 'auditions.owner')
                ->join('owner', 'auditions.owner', '=', 'owner.id')
                ->select('books.*', 'owner.owner_name')->where('owner.owner_name', 'LIKE', "$request->owner%")->get();
                $books['owner'][] = $bookOwner;
        }
        if ($request->country !== null) {
            $bookCounrty = Book::join('auditions', 'books.audition_id', '=', 'auditions.city')
                ->join('city', 'auditions.city', '=', 'city.id')
                ->join('country', 'city.country_id', '=', 'country.id')
                ->select('books.*', 'country.country_name')->where('country.country_name', 'LIKE', "$request->country%")->get();
                $books['country'][] = $bookCounrty;
        }
        if ($request->city !== null) {
                $bookCity = Book::join('auditions', 'books.audition_id', '=', 'auditions.city')
                ->join('city', 'auditions.city', '=', 'city.id')
                ->select('books.*', 'city.city_name')->where('city.city_name', 'LIKE', "$request->city%")->get();
                $books['city'][] = $bookCity;
        }
        return $books;

    }

}
