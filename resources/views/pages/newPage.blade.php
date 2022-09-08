@extends("layouts.layout")

@section('content')
<title>My Upcoming Interviews</title>
@if(Auth::user()->role==="interviewer")


<link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
                <button type="button" data-modal-toggle="defaultModal{{$a->id}}" class="bg-gray-500 hover:bg-gray-700 text-white p-1 rounded">See CV</button>

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

                @if ($today > $date && !App\Models\review::where('candidate_id', $a->interviewees->id )->exists())
                <button data-modal-toggle="RatingModal{{ $a->id }}" class="bg-blue-700 text-white p-1 rounded">Rate
                  Now</button>
                @else
                <button data-tooltip-target="tooltip-default" class="bg-red-500  text-white p-1 rounded">Can't rate
                  now!</button>
                <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(344px, 44px, 0px);">
                  The interview has not been held yet or you already rated it!
                  <div class="tooltip-arrow" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(58.4px, 0px, 0px);">
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
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
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
                          <option class="capitalize" value="{{$a -> interviewees -> id}}">{{ $a -> interviewees -> name }}</option>
                        </select>
                        @error('candidate_id')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div>
                        <label for="questionnaire_id" class="hidden">Questionnaire</label>
                        <select name="questionnaire_id" id="questionnaire_id" class="hidden @error('questionnaire_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">
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
                          <input type="radio" value="1" name="rating_amount" id="star1" class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="2" name="rating_amount" id="star2" class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="3" name="rating_amount" id="star3" class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="4" name="rating_amount" id="star4" class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="5" name="rating_amount" id="star5" class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="6" name="rating_amount" id="star6" class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="7" name="rating_amount" id="star7" class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="8" name="rating_amount" id="star8" class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="9" name="rating_amount" id="star9" class="bg-green-500 mask mask-star-2 mask-half-1 @error('rating_amount') is-invalid @enderror" />
                          <input type="radio" value="10" name="rating_amount" id="star10" class="bg-green-500 mask mask-star-2 mask-half-2 @error('rating_amount') is-invalid @enderror" />
                        </div>

                        @error('rating amount')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" data-modal-toggle="RatingModal{{ $a->id }}" class="btn btn-info">Rate</button>
                      </div>
                    </form>
                  </div>


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
<!-- component -->

<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
  <div class="w-full bg-gray-900 dark:bg-gray-800 ">
    <section class=" mx-auto px-4 sm:px-6 lg:px-4 py-12">

      <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="flex items-center p-4 bg-white shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
          <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-md ml-4 font-medium text-gray-600 dark:text-gray-200">
              Upcoming interviews
            </p>
            <p class="text-4xl font-semibold ml-4 text-gray-700 dark:text-gray-200">
              @php
              date_default_timezone_set('Europe/Belgrade');

              $today = date('Y-m-d H:i:s');
              @endphp {{ App\Models\interview::where('interview_date', '>', $today)->get()->count() }}
            </p>
          </div>
        </div>


        <div class="flex items-center p-4 bg-white shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
          <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-md ml-4 font-medium text-gray-600 dark:text-gray-200">
              Interviews held
            </p>
            <p class="text-4xl font-semibold ml-4 text-gray-700 dark:text-gray-200">
              {{ App\Models\interview::where('interview_date', '<', $today)->get()->count() }}
            </p>
          </div>
        </div>


        <div class="flex items-center p-4 bg-white shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
          <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-md ml-4 font-medium text-gray-600 dark:text-gray-200">
              Reviews Made
            </p>
            <p class="text-4xl font-semibold ml-4 text-gray-700 dark:text-gray-200">
              {{ App\Models\review::get()->count() }}
            </p>
          </div>
        </div>

        <div class="flex items-center p-4 bg-white shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
          <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-md ml-4 font-medium text-gray-600 dark:text-gray-200">
              Total Candidates
            </p>
            <p class="text-4xl font-semibold ml-4 text-gray-700 dark:text-gray-200">
              {{ App\Models\interviewee::get()->count() }}
            </p>
          </div>
        </div>


      </div>

      <!-- component -->
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

      <ol class="h-[500px] text-center sm:flex no-scrollbar overflow-x-auto h-auto">
        @foreach($interview as $i)
        <li class="mx-[10px] relative mb-6 sm:mb-0 min-w-[350px] {{$i->id%2==0 ? '' : 'mt-[23.8rem]'}}">
          @if($i->id%2!=0)
          <div class="flex items-center mb-5">
            <div class="flex z-10 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
              {{$i->id}}
            </div>
            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
          </div>
          @endif

          <!-- ==================================== -->
          <!-- ========== Card => Start =========== -->
          <!-- ==================================== -->
          {{-- <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$i -> interviewees -> name}}</h3>
          <p class="text-base font-normal text-white dark:text-white">{{$i->interviewees->interviewee_type->name}}</p>
          <p class="text-base font-normal text-white dark:text-white">@foreach ($i->interviewees->interviewee_type->interviewee_attributes as $s)
            {{ $s->name . ',' }}
            @endforeach
          </p>
          <p class="text-base font-normal text-gray-500 dark:text-white">{{$i -> interview_date}}</p> --}}
          <div class="relative block p-8 overflow-hidden border-2 border-gray-500 rounded-3xl">
            <span class="absolute inset-x-0 bottom-0 h-4  bg-gradient-to-r from-[#4884EE]  to-[#06BCFB]"></span>

            <div class="justify-between items-center sm:flex">
              <div>
                <h2 class="text-[30px]  font-bold text-white">
                  {{$i->interviewees ->name}}
                </h2>

              </div>

              <div class="flex-shrink-0 hidden sm:block">
                <button type="button" class="text-gray-900 bg-white border float-left border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-1.5 py-1.5 mr-3 mt-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">My CV </button>
                <img class="object-cover  rounded-full w-16 h-16  shadow-sm" src="/img/me-about.jpg" alt="" />
              </div>
            </div>

            <div class="mt-4">
              <p class="text-[20px] text-white">
                {{$i->interviewees->interviewee_type->name}}
              </p>
            </div>

            <div class="mt-4">
              <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-300 text-blue-500 rounded-full">
                @foreach ($i->interviewees->interviewee_type->interviewee_attributes as $s)
                {{ $s->name . ' |' }}
                @endforeach
              </p>
            </div>

            <div class=" text-center mt-6">
              <div class="flex flex-col-reverse">
                {{$i->interview_date}}

              </div>
            </div>


            <div x-data="
                            {
                              rating: 0,
                              hoverRating: 0,
                              ratings: [{'amount': 1, 'label':'Terrible'}, {'amount': 2, 'label':'Bad'}, {'amount': 3, 'label':'Okay'}, {'amount': 4, 'label':'Good'}, {'amount': 5, 'label':'Great'}],
                              rate(amount) {
                                if (this.rating == amount) {
                                  this.rating = 0;
                                }
                                else this.rating = amount;
                              },
                              currentLabel() {
                                 let r = this.rating;
                                if (this.hoverRating != this.rating) r = this.hoverRating;
                                let i = this.ratings.findIndex(e => e.amount == r);
                                if (i >=0) {return this.ratings[i].label;} else {return ''};     
                              }
                            }
                            " class="flex flex-col items-center mt-[10px] justify-center space-y-2 rounded  mx-auto">
              <div class="flex space-x-0">
                <template x-for="(star, index) in ratings" :key="index">
                  <button @click="rate(star.amount)" @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating" aria-hidden="true" :title="star.label" class="rounded-sm text-white fill-current focus:outline-none focus:shadow-outline p-1 w-[35px] m-0 cursor-pointer" :class="{'text-yellow-300': hoverRating >= star.amount, 'text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                    <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                  </button>

                </template>
              </div>
              <div class="p-2">
                <template x-if="rating || hoverRating">
                  <p x-text="currentLabel()"></p>
                </template>
                <template x-if="!rating && !hoverRating">
                  <p>Please Rate!</p>
                </template>
              </div>

            </div>
          </div>

          @if($i->id%2==0)
          <div class="flex items-center mt-5">
            <div class="flex z-10 justify-center items-center w-6 h-6 bg-blue-900 rounded-full ring-0 ring-blue-900 sm:ring-8 ">
              {{$i->id}}
            </div>
            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
          </div>
          @endif
        </li>

        @endforeach
      </ol>


      <div class="my-20 grid lg:grid-cols-3 md:grid-cols-3 gap-8">

        <div class="shadow-xl shadow-blue-500/50 col-span-2 flex flex-col p-8 bg-white dark:bg-gray-900 rounded-3xl ">
          <b class="flex flex-row text-gray-500">Property Release for today</b>
          <canvas class="p-5" id="chartLine"></canvas>
        </div>

        <div class="shadow-lg shadow-blue-500/50 items-center justify-center flex flex-col p-5 bg-white dark:bg-gray-900 rounded-3xl ">
          <b class="flex mb-10 flex-row text-gray-500">Calendar</b>

          <div inline-datepicker="">
            <div class=" datepicker datepicker-inline active block">
              <div class="datepicker-picker inline-block rounded-lg bg-white dark:bg-gray-900 shadow-lg p-4">
                <div class="datepicker-header">
                  <div class="datepicker-title bg-white dark:bg-gray-700 dark:text-white px-2 py-3 text-center font-semibold" style="display: none;"></div>
                  <div class="datepicker-controls flex justify-between mb-2">
                    <button type="button" class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 prev-btn"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                      </svg></button><button type="button" class="text-sm rounded-lg text-gray-900 dark:text-white bg-white dark:bg-gray-700 font-semibold py-2.5 px-5 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 view-switch">February 2022</button><button type="button" class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 next-btn"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg></button>
                  </div>
                </div>
                <div class="datepicker-main p-1">
                  <div class="datepicker-view flex">
                    <div class="days">
                      <div class="days-of-week grid grid-cols-7 mb-1"><span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">Su</span><span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">Mo</span><span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">Tu</span><span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">We</span><span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">Th</span><span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">Fr</span><span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">Sa</span></div>
                      <div class="datepicker-grid w-64 grid grid-cols-7"><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day prev text-gray-500" data-date="1643497200000">30</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day prev text-gray-500" data-date="1643583600000">31</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1643670000000">1</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1643756400000">2</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1643842800000">3</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1643929200000">4</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644015600000">5</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644102000000">6</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644188400000">7</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644274800000">8</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644361200000">9</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644447600000">10</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644534000000">11</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644620400000">12</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644706800000">13</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644793200000">14</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644879600000">15</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1644966000000">16</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645052400000">17</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645138800000">18</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645225200000">19</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645311600000">20</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645398000000">21</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645484400000">22</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645570800000">23</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645657200000">24</span><span class="datepicker-cell block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm day selected bg-blue-700 text-white dark:bg-blue-600 focused" data-date="1645743600000">25</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645830000000">26</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1645916400000">27</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day" data-date="1646002800000">28</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646089200000">1</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646175600000">2</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646262000000">3</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646348400000">4</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646434800000">5</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646521200000">6</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646607600000">7</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646694000000">8</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646780400000">9</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646866800000">10</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1646953200000">11</span><span class="datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm day next text-gray-500" data-date="1647039600000">12</span></div>
                    </div>
                  </div>
                </div>
                <div class="datepicker-footer">
                  <div class="datepicker-controls flex space-x-2 mt-2"><button type="button" class="button today-btn text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2" style="display: none;">Today</button><button type="button" class="button clear-btn text-gray-900 dark:text-white bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2" style="display: none;">Clear</button></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>


  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = ["January", "February", "March", "April", "May", "June"];
  const data = {
    labels: labels,
    datasets: [{
      label: "My First dataset",
      backgroundColor: "hsl(252, 82.9%, 67.8%)",
      borderColor: "hsl(252, 82.9%, 67.8%)",
      data: [0, 10, 5, 2, 20, 30, 45],
    }, ],
  };

  const configLineChart = {
    type: "line",
    data,
    options: {},
  };

  var chartLine = new Chart(
    document.getElementById("chartLine"),
    configLineChart
  );
</script>


<script src="/js/stars.js">
</script>
@endif

@endsection('content')