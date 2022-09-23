@extends("layouts.layout")

@section('content')

<title>My Reviews</title>
{{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" /> --}}
<script src="https://cdn.tailwindcss.com"></script>

<div class="h-full ml-14  mb-10 md:ml-64">
  <div class="mt-[145px] mx-4">
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
       
    <div class="text-center pb-12">    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($pastInterview as $p)

          @php
            $link = explode('/', $p->interviewees->img);
          @endphp

            <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36" src="/storage/images/{{ $link[2] }}" alt="photo">
                </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">{{$p->interviewees->name." ".$p->interviewees->surname}}</p>
                    <p class="text-base text-gray-400 font-normal">{{$p->interviewees->interviewee_type->name}}</p>
                </div>
            </div>

          @endforeach
        </div>

    </div>
        </div>
      </div>
  </div>

@endsection
