<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;
class TvsViewModel extends ViewModel
{
    public $popularTv,$topRatedTv,$genres ;
    public function __construct($popularTv,$topRatedTv,$genre)
    {
        $this->popularTv = $popularTv;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genre;
    }

    public function popularTv() {
        return $this->formatTv($this->popularTv);
    }
    public function topRatedTv() {
        return  $this->formatTv( $this->topRatedTv);
    }
    public function genres(){
       return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function formatTv($tv){
      
        return collect($tv)->map(function ($tvshow) {
            $genreFormatted = collect($tvshow['genre_ids'])->mapWithKeys( function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return collect($tvshow)->merge([
                'poster_path'=> 'https://image.tmdb.org/t/p/w185'.$tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] *10 .'%',
                'first_air_date' =>Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres' => $genreFormatted,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'name', 'vote_average', 'overview', 'first_air_date', 'genres',
            ]);
        });
    }
}
