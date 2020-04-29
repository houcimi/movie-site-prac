

    <div class="relative" x-data ="{isOpen:true}" @click.away="isOpen = false">
        <input 
        wire:model="search" 
        type="text" 
        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" 
        placeholder="Search"
        @focus="isOpen = true"
        @keydown.escape.window="isOpen = false"
        >
        <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
        @if(strlen($search) > 2)
        <div 
        class="absolute bg-gray-800 text-sm rounded w-64 mt-1" 
        x-show="isOpen"
        
        >
        @if($searchResult->count() > 0)
            <ul>

                @foreach($searchResult as $result)
                <li class="border-b border-gray-700">
                    <a href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                        <img src="{{ 'https://image.tmdb.org/t/p/w92'.$result['poster_path']}}" alt="" class="w-8">
                        <span class="ml-4">{{ $result['title']}}</span>
                    </a>
                </li>
               @endforeach
               
            </ul>
        @else
        <div class="px-4 py-4">No Search Results for {{ $search}}</div>
        @endif
        </div>
        @endif
    </div>


