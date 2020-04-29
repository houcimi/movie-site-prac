@extends('layouts.main')

@section('content')

<div class="tv-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex">
        <img src="{{ $tvshow['poster_path']}}" alt="">
        <div class="ml-24">
            <h2 class="text-4xl font-semibold">{{ $tvshow['name'] }}</h2>
            <div class="flex items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                        <span class="ml-1"> {{$tvshow['vote_average'] }}</span>
                        <span class="mx-2">|</span>
                        <span>{{$tvshow['first_air_date']}}</span>
                        <span class="mx-2">|</span>
                        <span>
                           
                                {{$tvshow['genres']}}
                        </span>
            </div>

            <p class="text-gray-300 mt-8">
                {{ $tvshow['overview']}}
            </p>    

        <div class="mt-12">
        
            <div class="flex mt-4">
              @foreach($tvshow['created_by'] as $crew)
                <div class="mr-8">
                    <div>{{$crew['name']}}</div>
                    <div class="text-sm text-gray-400"> Creator</div>
                </div>
                @endforeach
            </div>
        </div>
        @if($tvshow['videos']['results'] != null)
        <div class="mt-12">
            <a href="https://www.youtube.com/watch?v={{ $tvshow['videos']['results'][0]['key'] }}" class="flex inline-flex items-center bg-orange-500 text-gray-800 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
            <span class="ml-2">Play Trailer</span>
            </a>
        </div>
        @endif
        </div>
       
    </div>
</div>
<!-- END MOVIE INFO SEC-->

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gab-8">
        @foreach($tvshow['cast'] as $cast)
           
            <div class="mt-8">
                    <a href="{{ route('actors.show' , $cast['id']) }}">
                         <img src="{{ 'https://image.tmdb.org/t/p/w185'.$cast['profile_path']}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                <div class="mt-2">
                    
                    <div class="flex items-center text-lg mt-2">
                       <a href="{{ route('actors.show' , $cast['id']) }}">{{$cast['name']}}</a>
                    </div>
                    <div class="text-gray-400 text-sm">
                    <span>{{$cast['character']}}</span>
                    </div>
                </div>
            </div>
        
        @endforeach
        </div>
    </div>
</div>
<!-- END ACTORS INFO SEC-->
<div class="movie-images">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($tvshow['images'] as $image)
          
                <div class="mt-8">
                    <a href="">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500'.$image['file_path']}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
          
        @endforeach
        </div>
    </div>
</div>

@endsection