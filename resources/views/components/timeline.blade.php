
<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
    <div class="w-full bg-white dark:bg-gray-800 ">
      <section class=" mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <!-- component -->
        @include('components.dashboardHeader')
        <style>
       
          @layer utilities {
  
            /* Chrome, Safari and Opera */
            .no-scrollbar::-webkit-scrollbar {
              display: none;
            }
  
            .no-scrollbar {
              -ms-overflow-style: none;
              /* IE and Edge */
              scrollbar-width: none;
              /* Firefox */
            }
          }
        </style>
        <ol class="text-center sm:flex no-scrollbar overflow-x-auto h-auto">
  
          @for($index = 0 ; $index < count($interview); $index++)

          @php
                  
                  date_default_timezone_set("Europe/Belgrade");
                  $today = date("Y-m-d H:i:s");
                  $sot = date("Y-m-d");
                  $date = $interview[$index]->interview_date;
                  $link = explode('/', $interview[$index]->interviewees->img);
                  $cv = explode('/', $interview[$index]->interviewees->cv_path);

          @endphp
            <div class="flex items-center mt-100 relative ">
              <div class="absolute w-[195px] px-10 flex z-10 justify-center items-center h-10 bg-blue-200 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                
              @if(date("M jS, Y", strtotime($interview[$index]->interview_date)) === date("M jS, Y", strtotime($sot)))  
                    Today
                @else
                  {{date("M jS, Y", strtotime($interview[$index]->interview_date))}}
                @endif
              </div>
              <hr class="absolute w-[450px] ">
            </div>
  
            @if($flip == 0)
            <li class="mx-[10px] relative mb-6 sm:mb-0 min-w-[350px]">
  
  
              @php
              $flip = 1;
              @endphp
              @else
  
            <li class="mx-[10px] relative mb-6 sm:mb-0 min-w-[350px] mt-[26.8rem]">
  
              @php
              $flip = 0;
              @endphp
  
              @endif
  
  
  
              <!-- ==================================== -->
              <!-- ========== Card => Start =========== -->
              <!-- ==================================== -->
              <div class="relative block p-6 overflow-hidden border border-gray-400 rounded-xl">
                <span class="absolute inset-x-0 bottom-0 h-2  bg-gradient-to-r from-blue-300 via-blue-500 to-blue-600"></span>
  
                <div class="justify-between items-center sm:flex">
                  <div>
                    <h2 class="text-[30px] pl-[15px]  font-bold text-white">
  
                      {{ $interview[$index] -> interviewees -> name }}
  
                    </h2>
  
                  </div>
  
                  <div class="flex-shrink-0 p-[10px] hidden sm:block">
                    <img class="object-cover w-16 h-16  rounded-lg shadow-sm" src="/storage/images/{{ $link[2] }}" alt="" />
                    <button type="button" data-modal-toggle="defaultModal{{ $interview[$index]->id }}" class="mt-[7px] text-gray-900 bg-white border float-left border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-1.5 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                      Show CV
                    </button>
                  </div>
                </div>
              <div class="space-y-4">
                
                  <p class="text-[25px] font-[500] text-white">
                    {{$interview[$index]->interviewees->interviewee_type->name}}
                  </p>
               
  
                  
                  <p class="text-[14px] inline-flex items-center font-bold leading-sm uppercase px-3 bg-blue-200 text-blue-700 rounded-full">
                  |  
                    @foreach ($interview[$index]->interviewees->interviewee_type->interviewee_attributes as $s)
                      {{ $s->name . ' |' }}
                    @endforeach
                  </p>
  
                <div class="text-center">
                  <div class="flex text-[15px] flex-col-reverse">
                    {{$interview[$index]->interview_date}}
  
                  </div>
                </div>
                <div class="flex justify-center">
                  @if ($today > $date && !(App\Models\review::where('candidate_id', $interview[$index]->interviewees->id )->where('questionnaire_id', $interview[$index]->user->id )->where('interview_id', $interview[$index]->id)->exists()))
                  <button data-modal-toggle="RatingModal{{ $interview[$index]->id }}" class="bg-blue-700 text-white p-1 rounded">Rate Now</button>
                  @else
                  <button data-tooltip-target="tooltip-default" class="bg-red-500  text-white p-1 rounded">Can't rate now!</button>
                  <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(344px, 44px, 0px);">
                    The interview has not been held yet or you already rated it!
                    <div class="tooltip-arrow" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(58.4px, 0px, 0px);">
                    </div>
                  </div>
                  @endif
  
                </div>
              </div>
            </li>
            <div id="defaultModal{{ $interview[$index]->id }}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
              <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
  
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
  
                  <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      CV
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{ $interview[$index]->id }}">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
  
                  <div class="p-6 space-y-6">
                    <iframe class="w-full" src={{ '/storage/cv_path/' . $cv[2] }} height="600px">
                    </iframe>
                  </div>
  
  
                </div>
              </div>
            </div>
            <div id="RatingModal{{$interview[$index]->id}}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
              <div class="relative p-4 w-auto max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Rate
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="RatingModal{{$interview[$index]->id}}">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-6 space-y-6">
                    <form method="POST" action="{{ route('review.store') }}" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      @csrf
                      <div class="hidden">
                        <label for="candidate_id">Candidate</label>

                        <select name="candidate_id" id="candidate_id" class="@error('candidate_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">
                          <option class="capitalize" value="{{$interview[$index] -> interviewees -> id}}">{{ $interview[$index] -> interviewees -> name }}</option>
                        </select>
                        @error('candidate_id')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div>
                        <label for="questionnaire_id" class="hidden">Questionnaire</label>
                        <select name="questionnaire_id" id="questionnaire_id" class="hidden @error('questionnaire_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">
                          <option class="capitalize hidden" value="{{ $interview[$index] -> user->id }}"> {{ $interview[$index] -> user->name }}</option>
                        </select>
                        @error('questionnaire_id')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger hidden">{{ $message }}</div>
                        @enderror
                      </div>
                      <div>

                        <input value="{{ $interview[$index] -> id }}" name="interview_id" id="interview_id" class="hidden @error('interview_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white " type="hidden">

                        @error('interview_id')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>


                      <div>
                        <label for="rating_amount">Choose a grade:</label>

                        <div class="rating rating-lg">
                          <input type="radio" name="rating_amount" id="star0" class="rating-hidden" />
                          <input type="radio" value="1" name="rating_amount" id="star1" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="2" name="rating_amount" id="star3" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="3" name="rating_amount" id="star5" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="4" name="rating_amount" id="star7" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="5" name="rating_amount" id="star9" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                        </div>

                        @error('rating amount')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" data-modal-toggle="RatingModal{{ $interview[$index]->id }}" class="btn btn-info">Rate</button>
                      </div>
                    </form>
                  </div>


                </div>
              </div>
            </div>
            @endfor
            
        </ol>
  
      </section>
      <div class="mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
    <table class="w-full">
                        <caption
                            class="p-5 relative text-lg font-semibold text-left  text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                             Your past Interviews                           
                        </caption>
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"> 
                           
                            <th class="px-4 py-3">Interviewer</th>
                            <th class="px-4 py-3">CV</th>
                            <th class="px-4 py-3">Candidate</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Candidate Types</th>
                            <th class="px-4 py-3">Candidate Attribute</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($pastInterview as $i)
                        @php
                        
                        $link = explode('/', $i->interviewees->img);
                        $cv = explode('/', $i->interviewees->cv_path);
                        @endphp
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm ">
                                    {{ $i->user->name }}
                                </td>
                                <td class="px-4 py-3 text-sm capitalize ">
                                    <a href="/storage/cv_path/{{ $cv[2] }}" download>
                                        <button
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span> Download CV</span>
                                    </button>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm capitalize">
                                    {{ $i->interviewees->name . ' ' . $i->interviewees->surname }}
                                </td>
                                <td class="px-4 py-3 text-sm capitalize">
                                    {{ $i->interview_date }}
                                </td>
                             
                                <td class="px-4 py-3 text-sm capitalize">
                                {{ $i->interviewees->interviewee_type->name }}
                                </td>
                                <td class="px-4 py-3 text-sm capitalize">
                                @foreach ($i->interviewees->interviewee_type->interviewee_attributes as $a)
                                        {{ $a->name }}
                                @endforeach
                                    </td>
                                
          </tr>
        @endforeach
      </tbody>
    </table>
        </div>
        <div class="dark:bg-gray-800 p-3 ">
                {{$pastInterview->links() }}
            </div>
        </div>
        </div>
    </div>
  </div>