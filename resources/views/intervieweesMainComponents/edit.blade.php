
    @extends("layouts.layout")

    @section('content')
        <form class="shadow rounded-md w-[500px] m-8" method="POST"action="{{ route('interviewees.update',$interviewees->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="p-4">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-700">Name:</label>
                <input type="text" value="{{$interviewees->name}}" name="name" id="name" autocomplete="given-name" placeholder="Name" class="@error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('name')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
            </div>
            <div class="p-4">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-700">Surname:</label>
                <input type="text" value="{{$interviewees->surname}}" name="surname" id="name" autocomplete="given-name" placeholder="Surname" class="@error('surname') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('surname')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
            </div>
            @php

            $link = explode("/", $interviewees -> img);
            $cv = explode("/", $interviewees -> cv_path);
          @endphp
            <div class="p-4">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-700">Insert CV:</label>
                <a href="/storage/cv_path/{{$cv[2]}}" download class="underline">Download the Current CV</a>
                <input type="file" class="@error('cv_path') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="cv_path" name="cv_path" >
                @error('cv_path')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
            </div>
            <div class="p-4">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-700">External CV Path:</label>
                <input type="text" value="{{$interviewees->external_cv_path	}}" name="external_cv_path" id="name" autocomplete="given-name" placeholder="external_cv_path" class="@error('external_cv_path') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('external_cv_path')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
            </div>
            <div class="p-4">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-700">IMG</label>
                <input type="file" class="@error('img') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="img" name="img" value="{{$interviewees->img}}"><br>
                 @error('img')
                <div class="alert alert-danger error-login">{{ $message }}</div>
                 @enderror
                Current img:
                <img src="/storage/images/{{ $link[2] }}" width="100px" height="100px">
                @error('external_cv_path')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
            </div>
            <div class="p-4">
                <label for="interviewee_attributes_id">Interviewee Types:</label><br>
                <select class="@error('interviewee_types_id') is-invalid @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="interviewee_types_id" id="interviewee_types_id">
                    @foreach ($intervieweesT as $i)   
                         @if($i->id===$interviewees->interviewee_types_id)
                    <option value="{{$i->id}}">{{$i->name}}</option>
                     @break
                         @endif
                   @endforeach
                @foreach ($intervieweesT as $i) 
                @if($i->id!==$interviewees->interviewee_types_id)
                <option value="{{$i->id}}">{{$i->name}}</option>
                     @endif
                @endforeach
                
                </select>
                @error('interviewee_types_id')
                <div class="alert alert-danger error-login">{{ $message }}</div>
                @enderror
            </div>
            <div class="p-4">
                <label for="interviewee_attributes_id">Interviewee Attribute:</label><br>
                <select class="@error('interviewee_attributes_id') is-invalid @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="interviewee_attributes_id" id="interviewee_attributes_id">
                    @foreach ($intervieweesA as $i)   
                         @if($i->id===$interviewees->interviewee_attributes_id)
                    <option value="{{$i->id}}">{{$i->name}}</option>
                     @break
                         @endif
                   @endforeach
                @foreach ($intervieweesA as $i) 
                @if($i->id!==$interviewees->interviewee_attributes_id)
                <option value="{{$i->id}}">{{$i->name}}</option>
                     @endif
                @endforeach
                
                </select>
                @error('interviewee_attributes_id')
                <div class="alert alert-danger error-login">{{ $message }}</div>
                @enderror
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
            </div>
        </form>
    @endsection
{{-- 
    <form method="POST" action="{{ route('interviewees.update',$interviewees->id) }}" enctype="multipart/form-data">
        @csrf

        <label for="fname">Name:</label><br>
        <input type="text" class="@error('name') is-invalid @enderror" id="name" name="name" value="{{$interviewees->name}}"><br>
        @error('name')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror


        <label for="fname">Surname:</label><br>
        <input type="text"  class="@error('surname') is-invalid @enderror" id="surname" name="surname" value="{{$interviewees->surname}}"><br>
        @error('surname')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror

        @php

        $link = explode("/", $interviewees -> img);
        $cv = explode("/", $interviewees -> cv_path);
      @endphp
        <label for="fname">CV:</label><br>
        <a href="/storage/cv_path/{{$cv[2]}}" download>Download the Current CV</a><br>
        <input type="file" class="@error('cv_path') is-invalid @enderror" id="cv_path" name="cv_path" value=""><br>
        
        @error('cv_path')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror


        <label for="fname">CV File Path (Dont edit)</label><br>
        <input type="text" class="@error('external_cv_path') is-invalid @enderror" id="external_cv_path" name="external_cv_path" value="{{$interviewees->external_cv_path}}"><br> 
        @error('external_cv_path')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        

        <label for="fname">Profile image:</label><br>
        <input type="file" class="@error('img') is-invalid @enderror" id="img" name="img" value="{{$interviewees->img}}"><br>
        @error('img')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        <img src="/storage/images/{{ $link[2] }}" width="50px" height="50px"><br>
        
        
        <label for="interviewee_types_id">Interviewee Type:</label><br>
        <select class="@error('interviewee_types_id') is-invalid @enderror" name="interviewee_types_id" id="interviewee_types_id">
            @foreach ($intervieweesT as $i)   
                 @if($i->id===$interviewees->interviewee_types_id)
            <option value="{{$i->id}}">{{$i->name}}</option>
             @break
                 @endif
           @endforeach
        @foreach ($intervieweesT as $i) 
        @if($i->id!==$interviewees->interviewee_types_id)
        <option value="{{$i->id}}">{{$i->name}}</option>
             @endif
        @endforeach
        
        </select><br>
        @error('interviewee_types_id')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror

        <label for="interviewee_attributes_id">Interviewee Attribute:</label><br>
        <select class="@error('interviewee_attributes_id') is-invalid @enderror" name="interviewee_attributes_id" id="interviewee_attributes_id">
            @foreach ($intervieweesA as $i)   
                 @if($i->id===$interviewees->interviewee_types_id)
            <option value="{{$i->id}}">{{$i->name}}</option>
             @break
                 @endif
           @endforeach
        @foreach ($intervieweesT as $i) 
        @if($i->id!==$interviewees->interviewee_types_id)
        <option value="{{$i->id}}">{{$i->name}}</option>
             @endif
        @endforeach
        
        </select><br>
        @error('interviewee_attributes_id')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-2">Edit</button>
   
      </form>  --}}
