<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
        <title>Blue Forum</title>
        @vite('resources/css/app.css')
       
    </head>
    <body class=" mx-auto mt-10 max-w-6xl  text-slate-700">
      <div class="border border-blue-700 rounded-lg p-4">
<div class=" p-2 w-32 mx-auto mb-4">
<a  href="{{route('post.index')}}"><img class="rounded-lg" width="150px" height="150px" src="{{asset('/images/logo.PNG')}}" alt="Logo"/></a>
</div>
<div class=" p-2 flex gap-2">
<div class="mx-auto">
@auth

<ul class="flex gap-4">
    <li class="text-lg font-medium text-slate-800"><a class="border bg-slate-500 rounded-lg p-1 text-white font-medium" href="{{route('my-posts.index')}}">{{auth()->user()->name}}:My Posts</a></li>
    <li>|</li>
   
    <li><a href="{{route('profile.index')}}" class="border bg-slate-500 rounded-lg p-1 text-white font-medium">My Profile</a></li>
    <li>|</li>
    <li>
        <form action="{{route('auth.destroy')}}" method="POST">
@csrf
@method('DELETE')
<button class="text-red-500">Logout</buttton>
        </form>
    </li>
</ul>


@else
<div class="flex gap-2">
<div><a href="{{route('register.create')}}" class="border bg-slate-500 rounded-lg p-1 text-white font-medium">Register</a></div>
<div><a href="{{route('auth.create')}}" class="border bg-slate-500 rounded-lg p-1 text-white font-medium">Login</a></div>
 
</div>
@endauth
</div>
</div>

</div>
@if (session('success'))
<div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-200 p-4 text-green-700 opacity-75">

<p class="font-bold">Success</p>
<p>{{session('success')}}</p>
</div>
@endif
@if (session('error'))
<div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-200 p-4 text-red-700 opacity-75">
<p class="font-bold">Error</p>
<p>{{session('error')}}</p>
</div>
@endif

       {{$slot}}



       <div class="mt-40 bg-slate-300 w-full h-40 flex justify-between border rounded-lg border-blue-700">
<div class="mt-4 ml-4"></div> 
<div class=" mt-16 text-sm font-medium text-blue-700">Developed by Eromosele Okoudoh</div>
<div class="mt-16 mr-10">

<a href="http://linkedin.com/in/eromosele-okoudoh-54b694162" target="blank"><img class="rounded-lg" width="50px" height="40px" src="{{asset('/images/link.PNG')}}" alt="linkedin"/></a>
 
</div>
   
</div>
    </body>
</html>
