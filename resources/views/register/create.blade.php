<x-layout>
<h1 class="my-8 text-center text-4xl font-medium text-slate-700">Register</h1>
   
   <div class="border p-16 rounded-lg border-blue-700">
  <form action="{{route('register.store')}}" method="POST">
  @csrf
  <div class="mb-8">
      <label  for="email">E-mail*</label>
      <input class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2" type="text" name="email" placeholder="Enter your email"/>
  </div>
  @error('email')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
  <div class="mb-8">
      <label  for="email">Full Name*</label>
      <input class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2" type="text" name="name" placeholder="Enter your Full name"/>
  </div>
  @error('name')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
  <div class="mb-8">
      <label for="password" >Password*</label>
      <input class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2" type="password" name="password" type="password" placeholder="Enter your password"/>
  </div>
  @error('password')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
  <div class="mb-8">
        <label for="confirm_password" :required="true">Confirm Password*</label>
        <input class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2" name="confirm_password" type="password" placeholder="Re-type your password"/>
    </div>
    @error('confirm_password')
   <p class="text-red-500 mb-4">{{$message}}</p> 
@enderror
 
  <button class="w-full text-white bg-blue-700 rounded-md border border-blue-700 px-2 py-1
 text-center text-sm font-semibold shadow-md
 hover:bg-slate-100 hover:text-black"> Register </button>
  </form>
   </div>
</x-layout>