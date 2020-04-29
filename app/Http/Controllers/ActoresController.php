<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\ActorsViewModel;
use App\ViewModels\ActorViewModel;
class ActoresController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
         $tokenA = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzYzQxNTMzNTRjOGQ1MjMzNTkzN2YzZGQ2YWQ3OTViMiIsInN1YiI6IjVlYTU5YjUwNzM5MGMwMDAyMGE2MzQ3MiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.n7HU200gm03rC0lo-D-3xoxV8YeiuPUfAC8QqCaLzcA';
        $popularActors = Http::withToken($tokenA)->get('https://api.themoviedb.org/3/person/popular?page='.$page)->json()['results'];

        $viewModel = new ActorsViewModel($popularActors ,$page);
        return view('actors.index',$viewModel);
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
        $tokenA = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzYzQxNTMzNTRjOGQ1MjMzNTkzN2YzZGQ2YWQ3OTViMiIsInN1YiI6IjVlYTU5YjUwNzM5MGMwMDAyMGE2MzQ3MiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.n7HU200gm03rC0lo-D-3xoxV8YeiuPUfAC8QqCaLzcA';
        $actor = Http::withToken($tokenA)->get('https://api.themoviedb.org/3/person/'.$id)->json();

        $social = Http::withToken($tokenA)->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')->json();
        $credits = Http::withToken($tokenA)->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')->json();
        $viewModel = new ActorViewModel($actor,$social,$credits);
        return  view('actors.show',$viewModel);
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
