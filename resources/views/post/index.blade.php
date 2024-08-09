<x-layout>
<div class="w-full mt-8 p-4">

<div class="flex gap-2"><input placeholder="Search by Title and Category" type="text" name="search" class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2">
<button class="rounded-md border border-slate-300 px-2 py-1
 bg-white text-center text-sm font-semibold text-black shadow-md
  hover:bg-slate-100">Search</button>

</div>


    <div class="flex gap-2 justify-center mt-4 text-sm text-blue-700 font-medium">
        <div>
        <a href="{{route('post.index', ['category' => 'Sports'])}}">Sports</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Politics'])}}">Politics</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Romance'])}}">Romance</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Jobs Vacancies'])}}">Jobs Vacancies</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Tech'])}}">Tech</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Education'])}}">Education</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Autos'])}}">Autos</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Health'])}}">Health</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Travel'])}}">Travel</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Religion'])}}">Religion</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Food'])}}">Food</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Pets'])}}">Pets</a>
        </div>
        <div>
            |
        </div>
        <div>
        <a href="{{route('post.index', ['category' => 'Others'])}}">Others</a>
        </div>
</div>

    


</div>

<div class="mt-4 pt-4">
@forelse ($posts as $post )


<ul class="border  p-1 mb-2 rounded-lg bg-slate-200 text-slate-900 font-medium">
        <li class="text-center">
            <a href="{{route('post.show', $post)}}">•{{$post->title}}</a>
            
        </li>
</ul>

  
       
@empty
    <div class="text-center font-medium text-lg ">
        No Posts for this search 
    </div>
@endforelse
@if ($posts->count())
       <nav class="mt-4 mb-4"> {{$posts->links()}}</nav>
    @endif
</div>
</x-layout>