<x-layout>
<nav class="mt-4">
    <ul class="flex gap-2">
        <li>
        <a href="{{route('post.index')}}">Home</a>
        </li>
        <li>→</li>
        <li>
        {{auth()->user()->name}}: Posts
        </li>
    </ul>
</nav>
<div class="mt-4">
<button class="rounded-lg border bg-blue-700 text-white text-md font-medium p-1">
 <a href="{{route('my-posts.create')}}">Add New Post</a>   
</button>

</div>
<div class="mt-8">
@forelse ($posts as $post)
    <div class="border border-blue-700 rounded-lg p-2 mb-4 text-center text-slate-900 font-medium bg-slate-300">
        {{$post->title}}
        @if (!$post->deleted_at)
        <div class="flex gap-4 justify-center">
            <form method="POST" action="{{route('my-posts.destroy', $post)}}">
        @csrf
        @method('DELETE')
        <button class="border rounded-lg bg-blue-700 text-white p-1 hover:bg-slate-400 hover:text-black">Delete</button>
        </form>
            <a class="border rounded-lg bg-blue-700 text-white p-1 hover:bg-slate-400 hover:text-black" href="{{route('post.show', $post)}}">Show</a>
        </div>
        @else
        <div class="flex gap-2 justify-center ">

        <div class="border rounded-lg bg-red-700 text-white p-1">
        Deleted
        </div>
        </div>
        @endif
        
    </div>
@empty
<div class="border border-blue-700 rounded-lg p-2 mb-4 text-center text-slate-900 font-medium bg-slate-300">
        You Have No Posts Yet. <a class="text-blue-900" href="">Create Post</a>
    </div>  
@endforelse

</div>


</x-layout>