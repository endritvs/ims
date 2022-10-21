@extends('layouts.layout')

@section('content')
    <title>Interview</title>
    <div class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        <main class="relative transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
            @include('layouts.navbars.topnav')
            <div class="w-full py-10">
                <div class="container mx-auto px-6 flex items-start justify-center">
                    <div aria-label="group of cards" class="w-full">

                        <div class="flex flex-col mx-auto bg-white dark:bg-slate-850 shadow rounded-lg">
                            @if (count($review) != 0)

                                @foreach ($review as $r)
                                    @php
                                        $link = explode('/', $r->candidates->img);
                                        $name = ['None'];
                                        $rating = [];
                                        $indexName = 0;
                                        $indexQuest = 0;
                                        $indexRating = 0;
                                        foreach ($review_attributes as $ra) {
                                            $quest[$indexQuest++] = $ra->questionnaires->name;
                                            $name[$indexName++] = $ra->attributes->name;
                                            $rating[$indexRating++] = $ra->rating_amount;
                                        }
                                        $uniqueName = array_unique($name);
                                    @endphp
                                    <div class="w-full px-12 flex flex-col items-center py-10">
                                        <div class="w-24 h-24 mb-3 p-2 rounded-full flex items-center justify-center">
                                            @if ($r->candidates->img !== 'public/noProfilePhoto/nofoto.jpg')
                                                <img class="w-full h-full overflow-hidden object-cover rounded-full"
                                                    src="{{ asset('/storage/images/' . $link[2]) }}" />
                                            @else
                                                <img class="w-full h-full overflow-hidden object-cover rounded-full"
                                                    src="{{ asset('/noProfilePhoto/' . $link[2]) }}" />
                                            @endif
                                        </div>
                                        <a tabindex="0"
                                            class="focus:outline-none focus:opacity-75 hover:opacity-75 text-slate-700 dark:text-white cursor-pointer focus:underline">
                                            <h2
                                                class="dark:text-white text-slate-700 text-xl tracking-normal font-bold mb-1">
                                                {{ $r->candidates->name . ' ' . $r->candidates->surname }}</h2>
                                        </a>
                                        <a tabindex="0">
                                            <label
                                                class="w-full px-4 py-1 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-md bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                                {{ $r->candidates->interviewee_type->name }}
                                            </label>

                                        </a>
                                        <p
                                            class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mt-4 text-center w-10/12">
                                            The more I deal with the work as something that is my own, as
                                            something that is personal, the more successful it is.</p>

                                        <div class="flex items-start">
                                            @foreach ($r->candidates->interviewee_type->interviewee_attributes as $attr)
                                                <a tabindex="0"
                                                    class="mx-2 w-full px-4 py-1 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-md bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">{{ $attr->name }}</a>
                                            @endforeach
                                            @foreach ($additional_reviews as $ar)
                                                <a tabindex="0"
                                                    class="mx-2 w-full px-4 py-1 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-md bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">{{ $ar->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @break
                            @endforeach
                            <div class="w-full px-12 py-10 flex-col flex">
                                <h1 class="text-slate-700 dark:text-white font-bold text-lg">Overall Rating</h1>
                                <div class="grid grid-cols-3 gap-3">

                                    @foreach ($review as $rr)
                                        <div>
                                            <h1 class="text-lg font-bold">
                                                {{ $rr->questionnaires->name }}
                                            </h1>
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Overall Knowledge</dt>
                                                <dd class="flex items-center mb-3">
                                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                                            style="width:calc(100-{{ $rr->rating_amount }}%)">
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $rr->rating_amount }}</span>
                                                </dd>
                                            </dl>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="w-full px-12 border-gray-300  py-10 flex-col flex">
                                <h1 class="font-bold text-lg">Attributes</h1>
                                <div class="grid grid-cols-{{ count($uniqueName) }} gap-3">
                                    @foreach ($review_attributes as $key => $rw)
                                        <div>
                                            <h1 class="text-lg font-bold">
                                                {{ $rw->questionnaires->name }}
                                            </h1>
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    {{ $rw->attributes->name }}</dt>
                                                <dd class="flex items-center mb-3">
                                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                                            style="width: {{ $rw->rating_amount * 10 }}%">
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $rw->rating_amount }}</span>
                                                </dd>
                                            </dl>

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @if (count($additional_reviews) > 0)
                                <div class="w-full px-12 py-10 flex-col flex">
                                    <h1 class="font-bold ">Additional Attributes</h1>
                                    <div class="grid grid-cols-3 gap-3">

                                        @foreach ($additional_reviews as $ar)
                                            <div>
                                                <h1>{{ $ar->questionnaires->name }}</h1>
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        {{ $ar->name }}</dt>
                                                    <dd class="flex items-center mb-3">
                                                        <div
                                                            class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                                                style="width: {{ $rw->rating_amount * 10 }}%">
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ar->rating_amount }}</span>
                                                    </dd>
                                                </dl>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="w-full flex-col flex lg:justify-center md:justify-start items-center px-12">

                                <div class="w-1/2 ">
                                    <section class="px-5 sm:px-7 lg:px-5 py-12">
                                        <div class="shadow-lg rounded-lg overflow-hidden">
                                            <canvas
                                                style="display: block; box-sizing: border-box; height: 300px; width: 320px;"class="p-10 dark:"
                                                id="chartRadar"></canvas>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="w-full flex-col flex lg:justify-center md:justify-start items-center px-12">

                                <h1 class="text-slate-700 dark:text-white text-xl font-bold">Comments</h1>
                                <div class="grid grid-cols-3 gap-3">

                                    @foreach ($comment as $c)
                                        @php
                                            $link = explode('/', $c->questionnaires->img);
                                        @endphp
                                        <div
                                            class="bg-white dark:bg-slate-850 text-black dark:text-gray-200 p-4 antialiased flex max-w-lg">
                                            @if ($c->questionnaires->img !== 'public/noProfilePhoto/nofoto.jpg')
                                                <img class="rounded-full h-8 w-8 mr-2 mt-1 "
                                                    src="{{ '/storage/img/' . $link[2] }}" />
                                            @else
                                                <img class="rounded-full h-8 w-8 mr-2 mt-1 "
                                                    src="{{ asset('/noProfilePhoto/' . $link[2]) }}" />
                                            @endif

                                            <div>
                                                <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
                                                    <div class="font-semibold text-sm leading-relaxed">
                                                        {{ $c->questionnaires->name }}</div>
                                                    <div class="text-normal leading-snug md:leading-normal">
                                                        {{ $c->message }}
                                                    </div>
                                                </div>
                                                <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400">
                                                    {{ $c->created_at }}</div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                    </div>

                </div>
            </div>
        </div>

        </section>
</div>
</div>
</main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>
<script>
    var aQuest = <?php echo json_encode($quest); ?>;
    var aName = <?php echo json_encode($uniqueName); ?>;
    var aRating = <?php echo json_encode($rating); ?>;
    const dataRadar = { // initializing graph
        labels: aName,
        datasets: [],
    };
    // counting variables
    var a = 0;
    var b = aName.length;
    var c = 0;
    // color variables
    var r = 255;
    var g = 0;
    var g = 0;
    for (let i = 0; i < aRating.length / aName.length; i++) {
        var data = aRating.slice(a, b);
        var label = aQuest.slice(a, (a + 1));

        a += aName.length;
        b += aName.length;

        // ----------------------------------------------------------------------------
        dataRadar['datasets'][c++] = { // graph dataset
            label: label[0],
            data: data,
            fill: true,
            backgroundColor: "rgba(" + r + "," + g + "," + b + "," + "0.2)",
            borderColor: "rgb(" + r + "," + g + "," + b + ")",
            pointBackgroundColor: "rgb(" + r + "," + g + "," + b + ")",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(" + r + "," + g + "," + b + ")",
        }
        if (r >= 255 || r == 40) {
            g += 170;
            r = 40;
        }
        if (g >= 255 || g == 40) {
            b += 170;
            g = 40;
        }
        if (b >= 255 || b == 40) {
            r += 170;
            b = 40;
        }
    }
    const configRadarChart = {
        type: "radar",
        data: dataRadar,
        options: {},
    };
    var chartBar = new Chart(
        document.getElementById("chartRadar"),
        configRadarChart
    );
</script>
@endif

@endsection('content')
