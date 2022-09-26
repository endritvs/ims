@extends("layouts.layout")

@section('content')
<title>My Upcoming Interviews</title>

@php
$flip = 0;
@endphp

{{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.tailwindcss.com"></script>

@if(Auth::user()->role==="interviewer")

@include('components.timeline')


@if (count ($interview) >= 1)
            @foreach ($interview as $a)

            @php

            date_default_timezone_set("Europe/Belgrade");
            $today = date("Y-m-d H:i:s");
            $date = $a->interview_date;
            $link = explode('/', $a->interviewees->img);
            $cv = explode('/', $a->interviewees->cv_path);
            @endphp

      @endforeach
      @endif

      <div>
        {{ $interview->links() }}
      </div>
    
@else

  @php

    $sot = date("Y-m-d");

  @endphp
<!-- component -->
<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
  <div class="w-full bg-white dark:bg-gray-800 ">
    <section class=" mx-auto px-4 sm:px-6 lg:px-4 py-12">
      <!-- component -->
      @include('components.dashboardHeader')
      <style>
        @layer utilities {

          /* Chrome, Safari and Opera */
            #scroll::-webkit-scrollbar{
            height: 10px;
                width: 10px;
            }
            #scroll::-webkit-scrollbar-track{
                display: none;
                background:whitesmoke;
            }
            #scroll::-webkit-scrollbar-thumb{

                border-radius: 20px;
                background-color:grey;
            }
          }
      </style>
      <div id="scroll" class="h-[800px] mb-4 overflow-x-scroll">
        <ol class="text-center sm:flex  h-auto">
        @foreach($interviewAll as $iAll)

          <div class="flex items-center mt-100 relative ">
            <div class="absolute w-[195px] px-10 flex z-10 justify-center items-center h-10 bg-blue-200 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
              @if(date("M jS, Y", strtotime($iAll[0]['interview_date'])) === date("M jS, Y", strtotime($sot)))  
                    Today
                @else
                  {{date("M jS, Y", strtotime($iAll[0]['interview_date']))}}
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



            <!-- ============================================= -->
            <!-- ========== Card => Start for admin ========== -->
            <!-- =============================================-->
            <div class="relative block p-8 overflow-hidden border border-gray-400 rounded-xl">
              <span class="absolute inset-x-0 bottom-0 h-2  bg-gradient-to-r from-blue-300 via-blue-500 to-blue-600"></span>

              <div class="justify-between items-center sm:flex">
                <div>
                  <h2 class="text-[30px]  font-bold text-gray-600 dark:text-white">

                    {{ $iAll['0']['interviewees']['name'] }}

                  </h2>
                  <p> 
                    {{$iAll['0']['user']['name']}}
                  </p>
                </div>

                @php

                $link = explode('/', $iAll['0']['interviewees']['img']);
                $cv = explode('/', $iAll['0']['interviewees']['cv_path']);

                @endphp

                <div class="flex-shrink-0 p-[10px] hidden sm:block">
                  <img class="object-cover w-16 h-16               rounded-lg shadow-sm" src="/storage/images/{{ $link[2] }}" alt="" />
                  <button type="button" data-modal-toggle="defaultModal{{ $iAll['0']['id'] }}" class="mt-[7px] text-gray-900 bg-white border float-left border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-1.5 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Show CV
                  </button>
                </div>
              </div>

              <div class="space-y-4">
                
                  <p class="text-[25px] font-[500] text-gray-600 dark:text-white">
                    {{$iAll['0']['interviewees']['interviewee_type']['name']}}
                  </p>
               
  
                  
                  <p class="text-[14px] inline-flex items-center font-bold leading-sm uppercase px-3 bg-blue-200 text-blue-700 rounded-full">
                  |  
                  @foreach ($iAll['0']['interviewees']['interviewee_type']['interviewee_attributes'] as $s)
                    {{ $s['name'] . ' |' }}
                    @endforeach
                  </p>
               
  
                <div class="text-center">
                  <div class="flex text-[15px] flex-col-reverse">
                    {{$iAll['0']['interview_date']}}
  
                  </div>
                </div>
  
                <div class="flex justify-center">
                  
                  @foreach ($exec as $rat => $dd)
                  @if(count($exec) > 1)
                  @elseif ($dd->candidate_id === $iAll['0']['interviewees']['id'])
  
                  @for ($i=0; $i < floatval($dd->rating); $i++)
                  
                    <svg aria-hidden="true" class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                 
                    @endfor
  
                    <p class="ml-2 font-medium text-gray-900 dark:text-white">Rating</p>
                    @endif
                    @if(count($exec) > 1)
                    @elseif (!($dd->candidate_id === $iAll['0']['interviewees']['id']))
                    <p class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1 rounded dark:bg-blue-200 dark:text-blue-800"></p>
                    <p class="ml-2 font-medium text-gray-900 dark:text-white">Not Yet Rated</p>
                    @endif
                    @endforeach

                    
  
                </div>
              </div>
          </li>
          <div id="defaultModal{{ $iAll['0']['id'] }}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    CV
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{ $iAll['0']['id'] }}">
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
          @endforeach
          <!-- --------------------------------------------------------------------------------------- -->
      </ol>
    </div>
      @include('components.dashboardFooter')

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
                            <th class="px-4 py-3">Candidate</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Candidate Types</th>
                            <th class="px-4 py-3">Candidate Attribute</th>
                            <th class="px-4 py-3">CV</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($pastInterviewAll as $i)
                        @php
                        
                        $link = explode('/', $i->interviewees->img);
                        $cv = explode('/', $i->interviewees->cv_path);
                        @endphp
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm ">
                                    {{ $i->user->name }}
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
                                
          </tr>
        @endforeach
      </tbody>
    </table>
        </div>
        <div class="dark:bg-gray-800 p-3 ">
                {{$pastInterviewAll->links() }}
            </div>
        </div>
        </div>
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