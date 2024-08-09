<x-layout>
<nav class="mt-4">
    <ul class="flex gap-2">
        <li>
        <a href="{{route('post.index')}}">Home</a>
        </li>
        <li>→</li>
        <li>
        {{auth()->user()->name}}
        </li>
    </ul>
</nav>
<div class="border border-blue-700 rounded-lg mt-4 p-4">
<div>
    @if (!$user->profile)
      <img class="mx-auto mb-2" width="60" height="60" src="{{asset('/images/profile.PNG')}}" alt="Profile">
      <form class="mb-4" action="{{route('profile.store')}}" method="POST"
      enctype="multipart/form-data">
    @csrf
        <div class="text-center">
        <label  for="photo">Upload Photo:</label>
        <input required class="border border-blue-700 rounded-lg p-1" type="file" name="photo">
        </div>
        <div class="flex justify-center">
        <button class="ml-16 w-80 bg-blue-700 text-white border-blue-700 mt-2 rounded-lg">Upload</button>
        </div>
    
      </form>
      @else
      <img class="mx-auto mb-2 rounded-lg" width="60" height="60" src="{{asset('storage/images/'.$user->profile->name)}}" alt="Profile">
      <form class=" mb-4" action="{{route('profile.update', $user)}}" method="POST"
      enctype="multipart/form-data">
      @method('PUT')
    @csrf
        <div class="text-center">
        <label  for="photo">Update Photo:</label>
        <input required class="border border-blue-700 rounded-lg p-1" type="file" name="photo">
        </div>
        <div class="flex justify-center">
        <button class="justify-center w-80 bg-blue-700 text-white border-blue-700 mt-2 rounded-lg">Update</button>
        </div>
    
      </form>
    @endif
</div>
<div class="text-center font-medium text-slate-700 text-sm">
    Name: {{$user->name}}<br>
    Email: {{$user->email}}<br>
    Date Registered: {{$user->created_at}}
</div>
</div>

</x-layout>