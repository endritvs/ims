@extends("layouts.layout")

@section('content')
<form class="shadow rounded-md w-[500px]" method="POST" action="{{ route('interviewer.update',$interviewer->id) }}">
    @csrf
    <div class="p-4 bg-gray-800">
        <label for="first-name" class="block mb-2 text-sm font-medium text-white">Interviewee Type:</label>
        <input type="text" value={{$interviewer->name}} name="name" id="name" autocomplete="given-name" placeholder="Interviewee Type Name"  class="@error('interviewee_types_id') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        @error('name')
        <div class="alert alert-danger error-login">{{ $message }}</div>
    @enderror
    </div>
    <div class="p-4 bg-gray-800">
        <label for="first-name" class="block mb-2 text-sm font-medium text-white">Email:</label>
        <input type="email"  value={{$interviewer->email}} name="email" id="email" autocomplete="given-name" placeholder="email"  class="@error('email') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        @error('email')
        <div class="alert alert-danger error-login">{{ $message }}</div>
    @enderror
    </div>
   
    <div class="p-4 bg-gray-800">
        <label for="first-name" class="block mb-2 text-sm font-medium text-white">Role:</label>
        {{-- <input type="text"  value={{$interviewer->role}} name="role" id="role" autocomplete="given-name" placeholder="role"  class="@error('role') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
        <select name="role"  class="@error('interviewees_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" id="interviewees_id" >
           @if($interviewer->role==="admin")
            <option value="admin">Admin</option>
            <option value="interviewer">Interviwer</option>
            @elseif($interviewer->role==="interviewer")
           <option value="interviewer">Interviewer</option>
           <option value="admin">Admin</option>
           @endif   
           
         
       </select>
        @error('role')
        <div class="alert alert-danger error-login">{{ $message }}</div>
    @enderror
    </div>
    <div class="px-4 py-3 bg-gray-400 text-right sm:px-6">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
    </div>
</form>

@endsection