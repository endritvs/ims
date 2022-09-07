@extends("layouts.layout")

@section('content')

<title>My Upcoming Interviews</title>
@if(Auth::user()->role==="interviewer")


<link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>


<div class="h-full ml-14 mb-10 md:ml-64">
  <div class="mt-[145px] mx-4">
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full">
              <caption class="p-5 relative text-lg font-semibold text-left  text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  Your upcoming interviews
                  <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products designed to help you work, grow your business, and more. (Fix this text)</p>
                 
              </caption>
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
             
                <th class="px-4 py-3">Questioner</th>
                <th class="px-4 py-3">Candidate</th>
                <th class="px-4 py-3">Candidate CV</th>
                <th class="px-4 py-3">Candidate Type</th>
                <th class="px-4 py-3">Candidate Attribute</th>
                <th class="px-4 py-3">Interview Date</th>
                <th class="px-4 py-3">Rate Interview</th>
           
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach ($interview as $a) 
          
            
              @php
              date_default_timezone_set("Europe/Belgrade");
           
          
              $today = date("Y-m-d H:i:s");


              $date = $a->interview_date;
              $link = explode('/', $a->interviewees->img);
              $cv = explode('/', $a->interviewees->cv_path);
          @endphp

         
              <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
               
                <td class="px-4 py-3 text-sm capitalize ">
                  {{ $a -> user->name }}
                </td>
                <td class="px-4 py-3 text-sm capitalize ">
                  {{ $a -> interviewees -> name }}
                </td>
                <td class="px-4 py-3 text-sm capitalize ">
                  <button type="button" data-modal-toggle="defaultModal{{$a->id}}"
                  class="bg-gray-500 hover:bg-gray-700 text-white p-1 rounded">See CV</button>
   
                </td>
                <td class="px-4 py-3 text-sm capitalize ">
                  {{ $a->interviewees ->interviewee_type->name}}
                </td>
                   <td class="px-4 py-3 text-sm capitalize ">
                @foreach ($a->interviewees->interviewee_type->interviewee_attributes as $s)
                {{ $s->name.","}}
                @endforeach
              </td>
              <td class="px-4 py-3 text-sm capitalize ">
              {{$a->interview_date}}
              </td>
 
              <td class="px-4 py-3 text-sm  ">
               {{-- {{dd($review)}} --}}

               @if ($today > $date &&  !App\Models\review::where('candidate_id', $a->interviewees->id )->exists())
              <button  data-modal-toggle="RatingModal{{ $a->id }}"
                                                    class="bg-blue-700 text-white p-1 rounded">Rate
                                                    Now</button>
                                            @else
                                                <button data-tooltip-target="tooltip-default" 
                                                    class="bg-red-500  text-white p-1 rounded">Can't rate
                                                    now!</button>
                                                <div id="tooltip-default" role="tooltip"
                                                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700"
                                                    data-popper-reference-hidden="" data-popper-escaped=""
                                                    data-popper-placement="top"
                                                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(344px, 44px, 0px);">
                                                    The interview has not been held yet or you already rated it!
                                                    <div class="tooltip-arrow" data-popper-arrow=""
                                                        style="position: absolute; left: 0px; transform: translate3d(58.4px, 0px, 0px);">
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
              </tr>
              <div id="defaultModal{{$a->id}}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                CV
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{$a->id}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                          <iframe class="w-full" src={{ "/storage/cv_path/".$cv[2] }} height="600px">
                          </iframe>
                        </div>
                        <!-- Modal footer -->
                      
                    </div>
                </div>
            </div>
           
            <div id="RatingModal{{$a->id}}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
                <div class="relative p-4 w-auto max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Rate
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="RatingModal{{$a->id}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                        <form method="POST" action="{{ route('review.store') }}" class="relative bg-white rounded-lg shadow dark:bg-gray-700" >
                                            @csrf
                                                  <div class="hidden">
                                                    <label for="candidate_id">Candidate</label>
                                                    
                                                      <select  name="candidate_id"  id="candidate_id" class="@error('candidate_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">
                                                        <option class="capitalize" value="{{$a -> interviewees -> id}}">{{ $a -> interviewees -> name }}</option>
                                                      </select>
                                                            @error('candidate_id')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                        @enderror 
                                                  </div>
                                                  <div>
                                                    <label for="questionnaire_id" class="hidden">Questionnaire</label>
                                                      <select  name="questionnaire_id"  id="questionnaire_id" class="hidden @error('questionnaire_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">
                                                        <option class="capitalize hidden" value="{{ $a -> user->id }}"> {{ $a -> user->name }}</option>
                                                      </select>
                                                            @error('questionnaire_id')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger hidden">{{ $message }}</div>
                                                        @enderror 
                                                  </div>
                                                  <div>
                                              
                                                    <input value="{{ $a ->id }}" name="interview_id" id="interview_id" class="hidden @error('interview_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white " type="hidden">
                                                  
                                                            @error('interview_id')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                        @enderror 
                                                  </div>
                                                

                                                  <div>
                                                    <label for="rating_amount">Choose a grade:</label>

                                                    <div class="rating rating-lg rating-half">
  <input type="radio" name="rating_amount" id="star0" class="rating-hidden" />
  <input type="radio" value="1"  name="rating_amount" id="star1"  class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="2"  name="rating_amount" id="star2"  class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="3"  name="rating_amount" id="star3"  class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="4"  name="rating_amount" id="star4"  class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="5"  name="rating_amount" id="star5"  class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="6"  name="rating_amount" id="star6"  class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="7"  name="rating_amount" id="star7"  class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="8"  name="rating_amount" id="star8"  class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="9"  name="rating_amount" id="star9"  class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
  <input type="radio" value="10" name="rating_amount" id="star10" class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
</div>

                                                            @error('rating amount')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                        @enderror 
                                                  </div>
                                                    

                                            <div
                                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                <button type="submit" data-modal-toggle="RatingModal{{ $a->id }}"
                                                    class="btn btn-info">Rate</button>
                                            </div>
                                        </form>
                        </div>
                 
                      
                    </div>
                </div>
            </div>
              @endforeach
            </tbody>
        </table>
        <div class="dark:bg-gray-800 p-3">
          {{ $interview->links() }}
      </div>
        </div>
      </div>
  </div>
</div>
  @else

@endif
@endsection('content')