@extends('layouts.layout')
@section('content')
    <div class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
            @include('layouts.navbars.topnav')
            <!-- cards -->
            <div class="w-full px-6 py-6 mx-auto">
                <!-- row 1 -->
                <div class="flex flex-wrap -mx-3">
                    <!-- card1 -->
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Upcoming interviews</p>
                                            <h5 class="mb-2 font-bold dark:text-white">
                                                @php
                                                    date_default_timezone_set('Europe/Belgrade');
                                                    $today = date('Y-m-d H:i:s');
                                                @endphp
                                                {{ App\Models\interview::where('interview_date', '>', $today)->where('company_id', Auth::user()->company_id)->get()->count() }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                            <i
                                                class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card2 -->
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Interviews held</p>
                                            <h5 class="mb-2 font-bold dark:text-white">
                                                {{ App\Models\interview::where('interview_date', '<', $today)->where('company_id', Auth::user()->company_id)->get()->count() }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                            <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card3 -->
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Reviews Made</p>
                                            <h5 class="mb-2 font-bold dark:text-white">
                                                {{ App\Models\review::where('company_id', Auth::user()->company_id)->get()->count() }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                            <i
                                                class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card4 -->
                    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Total Candidates</p>
                                            <h5 class="mb-2 font-bold dark:text-white">
                                                {{ App\Models\interviewee::where('company_id', Auth::user()->company_id)->get()->count() }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                            <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- cards row 2 -->
                <div class="mt-6 lg:flex md:flex sm:block app_timeline overflow-y-hidden app_overflow">
            
                    @include('components.timelinev2')
                    
                </div>

                <!-- cards row 3 -->

                <div class="flex flex-wrap mt-6 -mx-3">
                    <div class="w-full max-w-full px-3 mt-0 lg:mb-0">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                            <div class="p-4 pl-6 pb-0 mb-0 rounded-t-4">
                                <div class="flex justify-between">
                                    <h6 class="mb-2 ml-4 dark:text-white">Your Past Interviews</h6>
                                </div>
                            </div>
                            <div class="app_overflow">
                                <table
                                    class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                                    <tbody>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p class="mb-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Interviewer:</p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p class="mb-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Candidate:</p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p class="mb-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Date:</p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p class="mb-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Candidate Type:</p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p class="mb-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Candidate Attribut:</p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p class="mb-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">CV:</p>
                                            </div>
                                        </td>
                                        @foreach ($pastInterviewAll as $i)
                                            @php
                                                
                                                $link = explode('/', $i->interviewees->img);
                                                $cv = explode('/', $i->interviewees->cv_path);
                                            @endphp
                                            <tr>
                                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                    <div class="text-center">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                          {{ $i->user->name }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                    <div class="text-center">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                          {{ $i->interviewees->name . ' ' . $i->interviewees->surname }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                    <div class="text-center">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                          {{ $i->interview_date }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                    <div class="flex-1 text-center">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                          {{ $i->interviewees->interviewee_type->name }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                    <div class="flex-1 text-center">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                          @foreach ($i->interviewees->interviewee_type->interviewee_attributes as $a)
                                                            {{ $a->name }}
                                                          @endforeach
                                                    </h6>
                                                    </div>
                                                </td>
                                                <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                    <div class="flex-1 text-center">
                                                        <a href="/storage/cv_path/{{ $cv[2] }}" download>
                                                          <button type="button"
                                                              class="inline-block px-3 py-1 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Download
                                                              CV
                                                          </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 mt-6 max-w-full px-3">
                        <div
                            class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                                <h6 class="capitalize dark:text-white">Interviews held by Months:</h6>
                                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                                </p>
                            </div>
                            <div class="flex-auto p-4">
                                <div>
                                    <canvas id="chart-linee" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 mt-6 max-w-full px-3">
                        <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                                <h6 class="capitalize dark:text-white">Interviews Status:</h6>
                                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                                </p>
                            </div>
                            <div class="flex-auto p-4">
                                <div>
                                    <canvas id="chartBar" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="pt-4">
                    <div class="w-full px-6 mx-auto">
                        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end cards -->
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="jscript/graph.js"></script>
    <script>

    var ctx1 = document.getElementById("chart-linee").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    var January   = {{ App\Models\interview::whereMonth('created_at', '=', 1 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var February  = {{ App\Models\interview::whereMonth('created_at', '=', 2 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var March     = {{ App\Models\interview::whereMonth('created_at', '=', 3 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var April     = {{ App\Models\interview::whereMonth('created_at', '=', 4 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var May       = {{ App\Models\interview::whereMonth('created_at', '=', 5 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var June      = {{ App\Models\interview::whereMonth('created_at', '=', 6 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var July      = {{ App\Models\interview::whereMonth('created_at', '=', 7 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var August    = {{ App\Models\interview::whereMonth('created_at', '=', 8 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var September = {{ App\Models\interview::whereMonth('created_at', '=', 9 )->where('company_id',Auth::user()->company_id)->get()->count() }};
    var October   = {{ App\Models\interview::whereMonth('created_at', '=', 10)->where('company_id',Auth::user()->company_id)->get()->count() }};
    var November  = {{ App\Models\interview::whereMonth('created_at', '=', 11)->where('company_id',Auth::user()->company_id)->get()->count() }};
    var December  = {{ App\Models\interview::whereMonth('created_at', '=', 12)->where('company_id',Auth::user()->company_id)->get()->count() }};

  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
  new Chart(ctx1, {
    type: "line",
    data: {
      labels: ["Jan", "Feb" , "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Interviews per month",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#5e72e4",
        backgroundColor: gradientStroke1,
        borderWidth: 3,
        fill: true,
        data: [January, February, March, April, May, June, July, August, September, October, November, December],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
  var Pending  ={{ App\Models\interview::where('status', '=', 'pending')->where('company_id',Auth::user()->company_id)->get()->count() }};
    var Declined ={{ App\Models\interview::where('status', '=', 'declined')->where('company_id',Auth::user()->company_id)->get()->count() }};
    var Accepted ={{ App\Models\interview::where('status', '=', 'accepted')->where('company_id',Auth::user()->company_id)->get()->count() }};
    const labelsBarChart = [
        "Pending",
        "Declined",
        "Accepted",
    ];
    const dataBarChart = {
    labels: labelsBarChart,
    datasets: [{
        label: 'Interview Status',
        data: [Pending, Declined, Accepted],
        backgroundColor: [
        'rgba(255, 205, 86, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        
        ],
        borderColor: [
        'rgb(255, 159, 64)',
        'rgb(255, 99, 132)',
        'rgb(20, 205, 86)',

        ],
        borderWidth: 2
    }]
    };

    const configBarChart = {
        type: "bar",
        data: dataBarChart,
        options: {},
    };

    var chartBar = new Chart(
        document.getElementById("chartBar"),
        configBarChart
    );
</script>
@endsection