@for ($index = 0; $index < count($interview); $index++)

@php
    date_default_timezone_set('Europe/Belgrade');
    $today = date('Y-m-d H:i:s');
    $sot = date('Y-m-d');
    $date = $interview[$index]->interview_date;
    $link = explode('/', $interview[$index]->interviewees->img);
    $cv = explode('/', $interview[$index]->interviewees->cv_path);
    
@endphp
<div class="w-full max-w-full mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        {{-- <img class="w-full rounded-t-2xl" src="../assets/img/starlabs.jpg" alt="profile cover image"> --}}
        <div class="flex flex-col items-center -mx-3">
            <div class="w-4/12 max-w-full px-3 flex-0 ">
                <div class="my-4 profile_image">
                    <a href="javascript:;">
                        <img  src="/storage/images/{{ $link[2] }}" alt="profile image" />
                    </a>
                </div>
                
            </div>
            <h5 class="dark:text-white text-center">{{ $interview[$index]->interviewees->name }} {{ $interview[$index]->interviewees->surname }}</h5>
            <p class="my-2 dark:text-white/80">{{ $interview[$index]->interviewees->interviewee_type->name }}</p>
        </div>


        <div class="border-black/12.5 rounded-t-2xl p-8 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
            <div class="flex gap_5">
                @foreach ($interview[$index]->interviewees->interviewee_type->interviewee_attributes as $s)
                <label
                    class="w-4/12 md:w-1/2 px-2 py-1 mx-1 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
                >
                {{ $s->name }}
                </label>
                @endforeach
            </div>
        </div>

        <div class="flex-auto pt-0">
            <div class="text-center">
                <div class="my-2 dark:text-white/80">
                    {{ $interview[$index]->interview_date }}
                </div>
            </div>
        </div>

        <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pb-4">
            <div class="p-[10px] sm:block">
                <button type="button" data-modal-toggle="defaultModal{{ $interview[$index]->id }}"
                    class="w-full mt-[7px] text-gray-900 bg-white border float-left border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-1.5 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Show CV
                </button>
            </div>
        </div>
    </div>
</div>


<div id="defaultModal{{ $interview[$index]->id }}" tabindex="-1"
    class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
    aria-modal="true" role="dialog">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div
                class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    CV
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="defaultModal{{ $interview[$index]->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
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
@endfor