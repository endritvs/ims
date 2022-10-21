@extends('layouts.layout')
@section('content')
    <div class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        <main class="relative h-[100vh] transition-all duration-200 ease-in-out xl:ml-68 rounded-xl" style="height: 100vh;">
            @include('layouts.navbars.topnav')
            <div class="h-full ml-14 mt-10 mb-10 md:ml-64">
                <div class="w-full">
                    <section class="px-4 sm:px-6 lg:px-4 py-12">
                        <div class="relative justify-center overflow-hidden py-6 sm:py-12">
                            <div class="text-center">

                                <h2 class="text-xl font-medium">Review Candidate</h2>
                            </div>

                            @php
                                
                                $link = explode('/', $reviews->interviewees->img);
                                
                            @endphp

                            <div class="flex relative rounded-lg bg-white dark:bg-slate-850 mb-10 mx-10 p-7">
                                <div class="flex-1 m-6">
                                    <div class="flex">
                                        @if ($reviews->interviewees->img === 'public/noProfilePhoto/nofoto.jpg')
                                            <img src="{{ asset('/noProfilePhoto/' . $link[2]) }}" alt="profile"
                                                class="img_review rounded-lg p-6">
                                        @else
                                            <img src="{{ asset('/storage/images/' . $link[2]) }}" alt="profile"
                                                class="img_review rounded-lg">
                                        @endif
                                        <div class="flex flex-col p-4">
                                            <h2 class="text-slate-700 dark:text-white font-medium">
                                                {{ $reviews->interviewees->name . ' ' . $reviews->interviewees->surname }}</h2>
                                            <label class="px-4 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-md bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                                {{ $reviews->interviewees->interviewee_type->name }}
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="mt-6">
                                        <p class="font-bold w-1/3 text-slate-700 dark:text-white">Since the beginning of my journey as a
                                            self-taught developer, I've been coding and creating freshly websites for
                                            clients around the world.</p>
                                    </div>
                                    <div class="flex pt-3">
                                        @foreach ($reviews->interviewees->interviewee_type->interviewee_attributes as $a)
                                            <span
                                                class="w-1/3 mx-2 px-4 py-1 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-md bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">{{ $a->name }}</span>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="flex-1 m-6">
                                    <form action="{{ route('review.rateComment') }}" method="post">
                                        @csrf

                                        <div>
                                            <p class="text-lg font-bold pb-3 text-slate-700 dark:text-white">Rate attributes!</p>
                                        </div>
                                        <div class="gap-8 sm:grid">
                                            <div class="space-y-6">
                                                <input type="hidden" name="candidate_id"
                                                    value="{{ $reviews->interviewees->id }}">

                                                <input type="hidden" name="interview_id" value="{{ $_GET['id'] }}">

                                                @foreach ($reviews->interviewees->interviewee_type->interviewee_attributes as $a)
                                                    <input type="hidden" name="attribute_id[]" id="attribute_id"
                                                        value="{{ $a->id }}"
                                                        class="bg-gray-600 border-b-gray-500 text-slate-700 dark:text-white rounded-lg" style="width: 5%">
                                                    <dl class="my-6">
                                                        <dt
                                                            class="w-1/5 my-2 px-1 py-1 font-semibold leading-normal text-center text-white dark:text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-md bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                                            {{ $a->name }}</dt>
                                                        <dd class="flex flex-col w-full">
                                                            <input type="range" name="rating_amount[]"
                                                                class="@error('rating_amount') is-invalid @enderror w-full"
                                                                min="1" max="10" step="1"
                                                                value="1" />
                                                            @error('rating_amount')
                                                                <div class="ml-1 text-red-500 text-sm alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div id="rangeNumber">
                                                                <ul
                                                                    class="flex justify-between text-[15px] w-full px-[5px]">
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">1</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">2</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">3</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">4</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">5</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">6</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">7</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">8</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">9</span></li>
                                                                    <li class="flex justify-center relative"><span
                                                                            class="absolute">10</span></li>
                                                                </ul>
                                                            </div>
                                                        </dd>
                                                    </dl>
                                                @endforeach


                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-lg mt-5 text-slate-700 dark:text-white font-bold">General Rate!</p>
                                        </div>
                                        <input type="hidden" name="candidate_id" value="{{ $reviews->interviewees->id }}">

                                        <input type="hidden" name="interview_id" value="{{ $_GET['id'] }}">

                                        <div class="rating rating-lg">
                                            <input type="radio" name="rating_amount_review" id="star0"
                                                class="@error('rating_amount_review') is-invalid @enderror hidden" />


                                            <input type="radio" value="1" name="rating_amount_review" id="star1"
                                                class="bg-green-500 mask mask-star-2 @error('rating_amount_review') is-invalid @enderror" />
                                            <input type="radio" value="2" name="rating_amount_review" id="star3"
                                                class="bg-green-500 mask mask-star-2 @error('rating_amount_review') is-invalid @enderror" />
                                            <input type="radio" value="3" name="rating_amount_review" id="star5"
                                                class="bg-green-500 mask mask-star-2 @error('rating_amount_review') is-invalid @enderror" />
                                            <input type="radio" value="4" name="rating_amount_review"
                                                id="star7"
                                                class="bg-green-500 mask mask-star-2 @error('rating_amount_review') is-invalid @enderror" />
                                            <input type="radio" value="5" name="rating_amount_review"
                                                id="star9"
                                                class="bg-green-500 mask mask-star-2 @error('rating_amount_review') is-invalid @enderror" />
                                            @error('rating_amount_review')
                                                <div class="ml-1 text-red-500 text-sm alert alert-danger">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="flex gap-2">
                                            <p class="text-lg pb-3 pr-2 text-slate-700 dark:text-white font-bold">Add additional attributes</p>
                                            <button type="button"
                                                class="bg-blue-500 w-5 h-8 text-md text-white rounded-full transition-all cursor-pointer hover:bg-blue-600"
                                                onclick="addReview()">+</button>
                                        </div>

                                        <div id="additionalDiv">

                                        </div>

                                        <div class="h-auto w-[400px] pt-10 rounded-[12px]">
                                            <p class="text-xl font-semibold text-slate-700 dark:text-white cursor-pointer transition-all">Add a
                                                Comment</p>
                                            <input type="hidden" name="candidate_id"
                                                value="{{ $reviews->interviewees->id }}">
                                            <input type="hidden" name="interview_id" value="{{ $_GET['id'] }}">
                                            <textarea name="message"
                                                class="@error('message') is-invalid @enderror h-auto px-3 text-sm py-1 mt-5 outline-none border-pink-300 w-full resize-none border dark:text-black rounded-lg placeholder:text-sm"
                                                rows="5" placeholder="Add your comments here"></textarea>
                                            @error('message')
                                                <div class="ml-1 text-red-500 text-sm alert alert-danger">{{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="flex justify-between mt-2">
                                            <button
                                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs hover:-translate-y-px active:opacity-85 hover:shadow-md">Submit
                                                All</button>
                                        </div>
                                    </form>
                                </div>



                            </div>


                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <script>
        function addReview() {

            // ------------------ Input type text ------------------------------

            const reviewName = document.createElement("input")
            reviewName.type = "text";
            reviewName.setAttribute("name", "name[]");

            reviewName.setAttribute("class", "w-[100px] h-[25px] border-2 mb-2 border-gray-400 text-black rounded-lg p-0");

            // ------------------ Input type range ------------------------------

            const inp = document.createElement("input");
            inp.type = "range";
            inp.setAttribute("name", "rating_amount_additional[]");

            inp.setAttribute("min", "1");
            inp.setAttribute("max", "10");
            inp.setAttribute("step", "1");
            inp.setAttribute("value", "1");

            inp.setAttribute("class", "w-full");

            // ------------------ Ul & Li------------------------------

            // Get the element
            var elem = document.getElementById("rangeNumber");

            // Create a copy of it
            var clone = elem.cloneNode(true);

            // Update the ID and add a class
            clone.id = 'elem2';
            clone.setAttribute("class", "mb-6");

            // Append to body:
            document.getElementById("additionalDiv").appendChild(reviewName);
            document.getElementById("additionalDiv").appendChild(inp);
            document.getElementById("additionalDiv").appendChild(clone);

        }
    </script>
@endsection
