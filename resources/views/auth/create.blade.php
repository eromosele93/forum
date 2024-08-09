<x-layout>
    
    <h1 class="my-8 text-center text-4xl font-medium text-slate-700">Sign into your account</h1>
   
    <div class="border p-16 rounded-lg border-blue-700">
   <form action="{{route('auth.store')}}" method="POST">
   @csrf
   <div class="mb-8">
       <label  for="email">E-mail</label>
       <input class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2" type="text" name="email" placeholder="Enter your email"/>
   </div>
   <div class="mb-8">
       <label for="password" >Password</label>
       <input class="w-full rounded-md px-2 py-1 text-sm ring-1  placeholder:text-slate-400 focus:ring-2" type="password" name="password" type="password" placeholder="Enter your password"/>
   </div>
   <div class="flex justify-between mb-8 text-sm font-medium">
<div>
   <div class="flex items-center space-x-2">
   <input class="rounded-sm border-slate-500" type="checkbox" name="remember">
<label for="remember">Remeber me</label>
   </div>
 
</div>
<div><a class="text-indigo-700 hover:underline" href="">Forgot password?</a></div>

   </div>
   <button class="w-full text-white bg-blue-700 rounded-md border border-blue-700 px-2 py-1
  text-center text-sm font-semibold shadow-md
  hover:bg-slate-100 hover:text-black"> Login </button>
   </form>
    </div>

</x-layout>