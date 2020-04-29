<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class SearchDropdown extends Component
{
    public $tokenA = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzYzQxNTMzNTRjOGQ1MjMzNTkzN2YzZGQ2YWQ3OTViMiIsInN1YiI6IjVlYTU5YjUwNzM5MGMwMDAyMGE2MzQ3MiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.n7HU200gm03rC0lo-D-3xoxV8YeiuPUfAC8QqCaLzcA';
    public $search ="";
    public function render()
    {
        $searchResult = [];
        if(strlen($this->search) > 2) {

        $searchResult = Http::withToken($this->tokenA)
        ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
        ->json()['results'];
        }
        

        return view('livewire.search-dropdown' , [
            'searchResult' => collect($searchResult)->take(7),
        ]);
    }
}
