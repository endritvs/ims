              <!-- ==================================== -->
              <!-- ========== Admin part =========== -->
              <!-- ==================================== -->

      @if(Auth::user() -> role === "admin")
      <div class="grid grid-cols-4 gap-6 mb-8">
          <div class="flex items-center p-4 bg-blue-900  shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
              <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
              </div>
              <div>
                  <p class="mb-2 text-md ml-4 font-medium text-white dark:text-gray-200">
                      Upcoming interviews
                  </p>
                  <p class="text-4xl font-semibold ml-4 text-white dark:text-gray-200">
                      @php
                      date_default_timezone_set('Europe/Belgrade');
                      $today = date('Y-m-d H:i:s');
                      @endphp {{ App\Models\interview::where('interview_date', '>', $today)->get()->count() }}
                  </p>
              </div>
          </div>


          <div class="flex items-center p-4 bg-blue-900 shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
              <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                  </svg>
              </div>
              <div>
                  <p class="mb-2 text-md ml-4 text-white font-medium  dark:text-gray-200">
                      Interviews held
                  </p>
                  <p class="text-4xl font-semibold text-white ml-4 dark:text-gray-200">
                      {{ App\Models\interview::where('interview_date', '<', $today)->get()->count() }}
                  </p>
              </div>
          </div>


          <div class="flex items-center p-4 bg-blue-900 shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
              <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                  </svg>
              </div>
              <div>
                  <p class="mb-2 text-md ml-4 font-medium text-white dark:text-gray-200">
                      Reviews Made
                  </p>
                  <p class="text-4xl font-semibold ml-4 text-white dark:text-gray-200">
                      {{ App\Models\review::get()->count() }}
                  </p>
              </div>
          </div>

          <div class="flex items-center p-4 bg-blue-900 shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
              <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                  </svg>
              </div>
              <div>
                  <p class="mb-2 text-md ml-4 font-medium text-white dark:text-gray-200">
                      Total Candidates
                  </p>
                  <p class="text-4xl font-semibold ml-4 text-white dark:text-gray-200">
                      {{ App\Models\interviewee::get()->count() }}
                  </p>
              </div>
          </div>
      </div>
    @else
              <!-- ==================================== -->
              <!-- ========== Interviwer part =========== -->
              <!-- ==================================== -->
    <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="flex items-center p-4 bg-blue-900 shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-md ml-4 font-medium text-white dark:text-gray-200">
                    Upcoming interviews
                </p>
                <p class="text-4xl font-semibold ml-4 text-white dark:text-gray-200">
                    @php
                    date_default_timezone_set('Europe/Belgrade');
                    $today = date('Y-m-d H:i:s');
                    @endphp {{ App\Models\interview::where('interview_date', '>', $today)->where('interviewer',Auth::user()->id)->get()->count() }}
                </p>
            </div>
        </div>


        <div class="flex items-center p-4 bg-blue-900 shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-md ml-4 font-medium text-white dark:text-gray-200">
                    Interviews held
                </p>
                <p class="text-4xl font-semibold ml-4 text-white dark:text-gray-200">
                    {{ App\Models\interview::where('interview_date', '<', $today)->where('interviewer',Auth::user()->id)->get()->count() }}
                </p>
            </div>
        </div>


        <div class="flex items-center p-4 bg-blue-900 shadow-lg shadow-blue-500/50 rounded-xl shadow-xs dark:bg-gray-900">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-md ml-4 font-medium text-white dark:text-gray-200">
                    Reviews Made
                </p>
                <p class="text-4xl font-semibold ml-4 text-white dark:text-gray-200">
                    {{ App\Models\review::where('questionnaire_id',Auth::user()->id)->get()->count() }}
                </p>
            </div>
        </div>

        
    </div>
    @endif