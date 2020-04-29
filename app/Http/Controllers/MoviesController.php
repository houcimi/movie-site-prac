<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=3c4153354c8d52335937f3dd6ad795b2')->json()['results'];
       
        $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=3c4153354c8d52335937f3dd6ad795b2')->json()['results'];


        $genre = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=3c4153354c8d52335937f3dd6ad795b2')->json()['genres'];


        
        //dump($popularMovies);
      /* return view('index',[
           'popularMovies' => $popularMovies,
           'nowPlayingMovies' => $nowPlayingMovies,
           'genres' => $genre,
       ]);*/

        $movieModel = new MoviesViewModel ($popularMovies,$nowPlayingMovies,$genre);

       return view('movies.index',$movieModel
    );
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=3c4153354c8d52335937f3dd6ad795b2&append_to_response=credits,videos,images')->json();
       
        $viewModel = new MovieViewModel($movie);
        //dump($movie);
        return view('movies.show' , $viewModel);
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
