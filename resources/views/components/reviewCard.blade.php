<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
    <div class="w-full">
      <section class="px-4 sm:px-6 lg:px-4 py-12">
        <div class="relative justify-center overflow-hidden py-6 sm:py-12">
            <div class="text-center">
                
                <h1 class="text-[25px] font-medium">We've found you some perfect interviewees</h1>
                <p class="mb-10 text-[15px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum suscipit</p>
            </div>

             @php 
          
    $link = explode('/', $reviews->interviewees->img);

   
             @endphp

                <div class="flex relative rounded-3xl bg-blue-900 dark:bg-gray-900 mb-10 mx-10 p-7">
                    <div class="flex-1">
                        <div class="flex">
                            @if ($reviews->interviewees->img==="public/noProfilePhoto/nofoto.jpg")
                            <img src="{{asset('/noProfilePhoto/'.$link[2])}}" alt="profile" class="w-[150px] h-[200px] rounded-lg">
                            @else
                            <img src="{{asset('/storage/images/'.$link[2])}}" alt="profile" class="w-[150px] h-[200px] rounded-lg">
                            @endif
                            <h2 class="text-white ml-[35px] text-[25px] mt-[70px] font-[500]"> {{ $reviews ->interviewees->name." ".$reviews ->interviewees->surname }}</h2>
                            <h4 class="text-gray-500 relative right-[150px]  text-[18px] mt-[110px] font-[500]">{{ $reviews ->interviewees->interviewee_type->name}}</h4>
                        </div>
                        <div class="mt-5">
                            <p class="font-normal w-[65%] text-white">Since the beginning of my journey as a self-taught developer, I've been coding and creating freshly websites for clients around the world.</p>
                        </div>
                        <div class="pt-3">
                            @foreach ($reviews->interviewees->interviewee_type->interviewee_attributes as $a)
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 uppercase">{{$a->name}}</span>
                        @endforeach
                        </div>
                        
                    </div>
                    <div class="flex-1">
                        <form action="{{route('review.rateComment')}}" method="post">
                            @csrf
                      
                        <div>
                            <p class="text-lg pb-3 text-white">Rate attributes!</p>
                        </div>
                        <div class="gap-8 sm:grid">
                            <div class="space-y-6">
                                <input type="hidden" name="candidate_id" value="{{$reviews->interviewees->id}}">
                                <input type="hidden" name="interview_id" value="{{$_GET["id"]}}">
                                @foreach ($reviews->interviewees->interviewee_type->interviewee_attributes as $a)
                                <input type="hidden" name="attribute_id[]" id="attribute_id" value="{{$a->id}}" class="bg-gray-600 text-white rounded-lg" style="width: 5%">
                                <dl>
                                    <dt class="text-sm font-medium text-white dark:text-gray-200 uppercase">{{$a->name}}</dt>
                                    <dd class="flex flex-col w-full">
                                        <input type="range" name="rating_amount[]" class="w-full" min="1" max="10" step="1" value="1"/>
                                        <ul class="flex justify-between text-[15px] w-full px-[5px]">
                                            <li class="flex justify-center relative"><span class="absolute">1</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">2</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">3</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">4</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">5</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">6</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">7</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">8</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">9</span></li>
                                            <li class="flex justify-center relative"><span class="absolute">10</span></li>
                                        </ul>
                                    </dd>
                                </dl>
                                @endforeach
                              
                               
                            </div>
                        </div>
                        <div>
                            <p class="text-lg mt-5 text-white">General Rate!</p>
                        </div>
                        <input type="hidden" name="candidate_id" value="{{$reviews->interviewees->id}}">
                        <input type="hidden" name="interview_id" value="{{$reviews->id}}">
                                
                        <div class="rating rating-lg">
                                    <input type="radio" name="rating_amount_review" id="star0" class="hidden" />
                                    <input type="radio" value="1" name="rating_amount_review" id="star1" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                                    <input type="radio" value="2" name="rating_amount_review" id="star3" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                                    <input type="radio" value="3" name="rating_amount_review" id="star5" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                                    <input type="radio" value="4" name="rating_amount_review" id="star7" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                                    <input type="radio" value="5" name="rating_amount_review" id="star9" class="bg-green-500 mask mask-star-2 @error('rating_amount') is-invalid @enderror" />
                                  </div>
                  
                            <div class="h-auto w-[400px] pt-10 rounded-[12px]">
                                <p class="text-xl font-semibold text-white cursor-pointer transition-all">Add Comment/Questions</p>
                                <input type="hidden" name="candidate_id" value="{{$reviews->interviewees->id}}">
                                <input type="hidden" name="interview_id" value="{{$reviews->id}}">
                                <textarea name="message" class="h-auto px-3 text-sm py-1 mt-5 outline-none border-pink-300 w-full resize-none border dark:text-black rounded-lg placeholder:text-sm" rows="5" placeholder="Add your comments here"></textarea>  
                                
                              
                            </div>  
                            <div class="flex justify-between mt-2"> 
                                <button class="h-12 w-[150px] bg-blue-500 text-md text-white rounded-lg transition-all cursor-pointer hover:bg-blue-600">Submit All</button>
                            </div>
                        </form>
                    </div>

               
                        
                </div>  
              
               
        </div>
      </section>
    </div>
</div>