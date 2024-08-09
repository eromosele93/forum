<x-layout>
<nav class="mt-4">
    <ul class="flex gap-2">
        <li>
        <a href="{{route('post.index')}}">Home</a>
        </li>
        <li>→</li>
        <li>
        {{$post->title}}
        </li>
    </ul>
</nav>

<div class="border border-blue-700 rounded-lg p-4 mt-4">
    <div class="text-center underline text-3xl text-black mb-4">{{$post->title}}</div>
    <div class="text-sm font-medium flex">
    <div>
    @if (!$post->user->profile)
        <img class="rounded-lg" width="50px" height="40px" src="{{asset('/images/profile.PNG')}}"/>
        @else
        <img class="rounded-lg" width="50px" height="40px" src="{{asset('storage/images/'.$post->user->profile->name)}}"/>
        @endif
    </div> 
        
        <div class="ml-1 pt-4">
         By {{$post->user->name}} on {{$post->created_at}}
        </div>
   </div>
<div class="mt-2 text-sm font-medium ml-4">
    {{$post->comments()->count()}} {{Str::plural('comment',$post->comments()->count())}}
</div>
    <div class="mt-4  text-black bg-blue-200 rounded-lg p-4 ">
        
        {{$post->post}}
    </div>
<div class="mt-16 mb-4 "> 
    <div class="text-center font-bold mb-4">
        Add Comments
    </div>
    <div>
<form action="{{route('post.comment.store', $post)}}" method="POST">
    @csrf
<label  for="post">Comment*</label>
      <textarea class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2"name="comment">


      </textarea>
      @error('comment')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
<button class="w-full text-white bg-blue-700 rounded-md border border-blue-700 px-2 py-1
 text-center text-sm font-semibold shadow-md
 hover:bg-slate-100 hover:text-black"> Add Comment </button>
</form>
    </div>
</div>
    <div class="bg-slate-50 mt-8 p-4">

    
    <div class="text-center font-bold mb-4 ">
        Comments
    </div>
    
        @forelse ($post->comments as $comment)
        <div class="mb-4 border border-slate-300 p-4">
        <div class="flex text-sm mb-4">
            @if (!$comment->user->profile)
            <img class="rounded-lg" width="50px" height="40px" src="{{asset('/images/profile.PNG')}}"/>
            @else
            <img class="rounded-lg" width="50px" height="40px" src="{{asset('storage/images/'.$comment->user->profile->name)}}"/>
            @endif
          <div class="ml-2 pt-4">
       {{$comment->user->name}}
       <div>
            {{$comment->created_at->diffForHumans()}}
          </div>
          </div>
        
        </div> 

        <div class="text-sm text-blue-700 mb-4">
            {{$comment->comment}}
        </div>
        @auth
        @if (auth()->user()->id === $comment->user_id)
    <form action="{{route('post.comment.destroy', [$post, $comment])}}" method="POST">
@csrf
@method('DELETE')
<button class="text-white bg-red-500 rounded-md border border-red-500 px-2 py-1
 text-center text-sm font-semibold shadow-md
 hover:bg-slate-100 hover:text-black">
    Delete
</button>
</form>
        
    @endif  
        @endauth
    
        
        </div>
          
        @empty
            <div class="text-center">No Comments yet</div>
        @endforelse

</div>
</div>

<div class="">
    <div class="text-center text-xl font-bold text-slate-900 mt-16">
        Other Posts by Author
    </div>
    @foreach ($post->user->posts as $other)
        <div class="text-center underline mb-2 text-blue-700">
           <a href="{{route('post.show', $other)}}">•{{$other->title}}</a> 
        </div>
    @endforeach
</div>


</x-layout>