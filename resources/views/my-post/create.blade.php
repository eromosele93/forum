<x-layout>
<nav class="mt-4">
    <ul class="flex gap-2">
        <li>
        <a href="{{route('post.index')}}">Home</a>
        </li>
        <li>→</li>
        <li>
        <a href="{{route('my-posts.index')}}">Back</a>
        </li>
    </ul>
</nav>
<h1 class="my-8 text-center text-4xl font-medium text-slate-700">Add a new post</h1>
   
   <div class="border p-16 rounded-lg border-blue-700">
  <form action="{{route('my-posts.store')}}" method="POST">
  @csrf
  <div class="mb-8">
      <label  for="title">Title*</label>
      <input class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2" type="text" name="title" placeholder="Enter a title of your post"/>
      @error('title')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
  </div>
  <div class="mb-8">
      <label  for="category" >Category*</label>
      <select name="category" class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2">
      <option value="Others">Others</option>
  <option value="Politics">Politics</option>
  <option value="Romance">Romance</option>
  <option value="Sports">Sports</option>
  <option value="Jobs Vacancies">Job Vacancies</option>
  <option value="Tech">Tech</option>
  <option value="Education">Education</option>
  <option value="Autos">Autos</option>
  <option value="Health">Health</option>
  <option value="Travel">Travel</option>
  <option value="Religion">Religion</option>
  <option value="Food">Food</option>
  <option value="Pets">Pets</option>

      </select>
      @error('category')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
        </div>
        <div class="mb-8">
      <label  for="post">Post*</label>
      <textarea class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2"name="post">


      </textarea>
      @error('post')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
  </div>

  <button class="w-full text-white bg-blue-700 rounded-md border border-blue-700 px-2 py-1
 text-center text-sm font-semibold shadow-md
 hover:bg-slate-100 hover:text-black"> Add Post </button>
  </form>
   </div>

</x-layout>