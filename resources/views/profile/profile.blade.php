@extends("layouts.layout")

@section('content')
<title>My Profile</title>
<div class="h-full ml-14 mb-10 md:ml-64">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1">
        
        <div tabindex="0" aria-label="form" class="focus:outline-none w-full bg-white p-10 dark:bg-gray-800">
            <div class="md:flex items-center border-b pb-6 border-gray-200">
                <div  class="flex items-center md:mt-0 mt-4">
                    <div class="w-full h-8 p-2 bg-indigo-700 rounded flex items-center justify-center">
                        <p  tabindex="0" class="focus:outline-none text-base font-medium leading-none text-white">My Profile</p>
                    </div>
                
                </div>
           
            </div>
            <h1 tabindex="0" role="heading" aria-label="profile information" class="focus:outline-none text-3xl font-bold text-gray-800 mt-12 dark:text-white">Profile info</h1>
            <p    tabindex="0" class=" focus:outline-none text-sm font-light leading-tight text-gray-600 mt-4 dark:text-white">Fill in the data for profile. It will take a couple of minutes. <br />You only need a passport</p>
            <h2  tabindex="0" class="focus:outline-none text-xl font-semibold leading-7 text-gray-800 mt-10 dark:text-white">Personal data</h2>
            <p tabindex="0" class="focus:outline-none text-sm font-light leading-none text-gray-600 mt-0.5 dark:text-white">Your details and place of birth</p>
            <form action="">
            <div class="mt-8 md:flex items-center">
                <div class="flex flex-col">
                    <label class="mb-3 text-sm leading-none text-gray-800 dark:text-white">Name</label>
                    <input type="name" tabindex="0" aria-label="Enter first name" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" value="{{Auth::user()->name}}" />
                </div>
                <div class="flex flex-col md:ml-12 md:mt-0 mt-8">
                    <label class="mb-3 text-sm leading-none text-gray-800 dark:text-white">Email</label>
                    <input type="name" tabindex="0" aria-label="Enter last name" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" value="{{Auth::user()->email}}" />
                </div>
            </div>
            @php
                                    
            $link = explode('/', Auth::user()->img);
            
        @endphp
            <div class="mt-12 md:flex items-center">
                <div class="flex flex-col">
                    <label class="mb-3 text-sm leading-none text-gray-800 dark:text-white">Image</label>
                    <input type="file" tabindex="0" aria-label="Enter place of birth" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" />
                
            
                   
                    @if (Auth::user()->img==="public/noProfilePhoto/nofoto.jpg")
                                   
                    <img class="mt-3 rounded" src="{{asset('/noProfilePhoto/'.$link[2])}}" width="50px" height="50px">
                
                @else
                <img class="mt-3 rounded" src="/storage/img/{{$link[2]}}" width="50px" height="50px">
                @endif
             </div>
            </div>
      
            <button role="button" aria-label="Next step" class="flex items-center justify-center py-4 px-7 focus:outline-none bg-white border rounded border-gray-400 mt-7 md:mt-14 hover:bg-gray-100  focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 hover:bg-gray-400">
                <span class="text-sm font-medium text-center text-gray-800 capitalize">Save</span>

            </button>
        </form>
        </div>
        <div tabindex="0" aria-label="form" class="focus:outline-none w-full bg-white p-10 dark:bg-gray-800">
            <div class="md:flex items-center border-b pb-6 border-gray-200">
                <div  class="flex items-center md:mt-0 mt-4">
                    <div class="w-full h-8 p-2 bg-indigo-700 rounded flex items-center justify-center">
                        <p  tabindex="0" class="focus:outline-none text-base font-medium leading-none text-white">Change Password</p>
                    </div>
                
                </div>
           
            </div>
            <h1 tabindex="0" role="heading" aria-label="profile information" class="focus:outline-none text-3xl font-bold text-gray-800 mt-12 dark:text-white">Change Password</h1>
            <p    tabindex="0" class=" focus:outline-none text-sm font-light leading-tight text-gray-600 mt-4 dark:text-white">Fill in the data for profile. It will take a couple of minutes. <br />You only need a passport</p>
            <h2  tabindex="0" class="focus:outline-none text-xl font-semibold leading-7 text-gray-800 mt-10 dark:text-white">Personal data</h2>
            <p tabindex="0" class="focus:outline-none text-sm font-light leading-none text-gray-600 mt-0.5 dark:text-white">Your details and place of birth</p>
            <div class="mt-8 md:flex items-center">
                <div class="flex flex-col">
                    <label class="mb-3 text-sm leading-none text-gray-800 dark:text-white">Current-Password</label>
                    <input placeholder="Current-Password" type="password" tabindex="0" aria-label="Enter current password" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" />
                </div>
                <div class="flex flex-col md:ml-12 md:mt-0 mt-8">
                    <label class="mb-3 text-sm leading-none text-gray-800 dark:text-white">New-Password</label>
                    <input placeholder="New-Password" type="password" tabindex="0" aria-label="New-Password" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200"  />
                </div>
            </div>
            <div class="mt-12 md:flex items-center">
                <div class="flex flex-col">
                    <label class="mb-3 text-sm leading-none text-gray-800 dark:text-white">Confirm-New-Password</label>
                    <input placeholder="Confirm New Password" type="password" tabindex="0" aria-label="Confirm New Password" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200"  />
                </div>

            </div>
        
      
            <button role="button" aria-label="Next step" class="flex items-center justify-center py-4 px-7 focus:outline-none bg-white border rounded border-gray-400 mt-7 md:mt-14 hover:bg-gray-100  focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 hover:bg-gray-400">
                <span class="text-sm font-medium text-center text-gray-800 capitalize">Save</span>

            </button>
        </div>
    </div>
</div>
        <style>
            .checkbox:checked + .check-icon {
                display: flex;
            }
        </style>
    @endsection('content')