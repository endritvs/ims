@extends("layouts.layout")

@section('content')

<title>My Reviews</title>
<link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

<div class="w-full bg-gray-800">
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
       
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

    </section>
</div>

@endsection
