@extends('layouts.layout')
@section('content')
    <div class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        <main class="relative h-[100vh] transition-all duration-200 ease-in-out xl:ml-68 rounded-xl" style="height: 100vh;">
            @include('layouts.navbars.topnav')
            <div class="px-6 py-6 mx-auto flex flex-row" style="gap: 20px;">
              
                <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                        <h6>Canidate Types</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                            Edit</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                                            Delete</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 leading-normal text-sm">Frontend</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <a href="#" data-modal-toggle="editModal"
                                            class="text-blue-500 font-bold rounded">Edit</a>
                                        </td>
                                        <td
                                            class="px-2 leading-normal text-center bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                            <a href="#" data-modal-toggle="deleteITypeModal"
                                              class="text-red-600 font-bold rounded">Delete</a>
                                        </td>
                                    </tr>
                                    <button type="button" data-toggle="modal" data-target="#import" class="inline-block px-8 py-2 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro tracking-tight-rem bg-150 bg-x-25 hover:scale-102 active:shadow-xs hover:text-blue-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-blue-500 active:bg-blue-500 active:text-white hover:active:border-blue-500 hover:active:bg-transparent hover:active:text-blue-500 hover:active:opacity-75">Import</button>

                                    <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto transition-opacity ease-linear opacity-0 z-sticky outline-0" id="import" aria-hidden="true">
                                      <div class="relative w-auto m-2 transition-transform duration-300 ease-out pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-48 -translate-y-13">
                                        <div class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto dark:bg-gray-950 bg-clip-padding border-black/20 rounded-xl outline-0">
                                          <div class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                                            <h5 class="mb-0 leading-normal dark:text-white" id="ModalLabel">Import CSV</h5>
                                            <i class="ml-4 fas fa-upload"></i>
                                            <button type="button" data-toggle="modal" data-target="#import" class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black dark:text-white border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 " data-dismiss="modal"></button>
                                          </div>
                                          <div class="relative flex-auto p-4">
                                            <p>You can browse your computer for a file.</p>
                                            <input action="/file-upload" dropzone type="text" placeholder="Browse file..." class="dark:bg-gray-950 mb-4 focus:shadow-primary-outline dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                            <div class="min-h-6 mb-0.5 block">
                                              <input class="w-5 h-5 ease -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:font-awesome after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" value="" id="importCheck" checked="">
                                              <label class="inline-block mb-2 ml-1 text-xs font-bold cursor-pointer select-none text-slate-700 dark:text-white/80" for="importCheck">I accept the terms and conditions</label>
                                            </div>
                                          </div>
                                          <div class="flex flex-wrap items-center justify-end p-3 border-t border-solid shrink-0 border-slate-100 rounded-b-xl">
                                            <button type="button" data-toggle="modal" data-target="#import" class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg cursor-pointer leading-pro tracking-tight-rem bg-slate-400 shadow-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Close</button>
                                            <button type="button" data-toggle="modal" data-target="#import" class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg cursor-pointer leading-pro tracking-tight-rem shadow-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Upload</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                      <h6>Candidate Attributes</h6>
                  </div>
                  <div class="flex-auto px-0 pt-0 pb-2">
                      <div class="p-0 overflow-x-auto">
                          <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                              <thead class="align-bottom">
                                  <tr>
                                      <th
                                          class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                          Name</th>
                                      <th
                                          class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                          Type</th>
                                      <th
                                          class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                          Edit</th>
                                      <th
                                          class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                          Delete</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <div class="flex px-2 py-1">
                                              <div class="flex flex-col justify-center">
                                                  <h6 class="mb-0 leading-normal text-sm">HTML</h6> 
                                              </div>
                                          </div>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <p class="mb-0 font-semibold leading-tight text-xs">Manager</p>
                                      </td>
                                      <td
                                          class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                          <span
                                              class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Online</span>
                                      </td>
                                      <td
                                          class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <span class="font-semibold leading-tight text-xs text-slate-400">23/04/18</span>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <a href="javascript:;"
                                              class="font-semibold leading-tight text-xs text-slate-400">
                                              Edit </a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <div class="flex px-2 py-1">
                                              <div>
                                                  <img src="../assets/img/team-3.jpg"
                                                      class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl"
                                                      alt="user2" />
                                              </div>
                                              <div class="flex flex-col justify-center">
                                                  <h6 class="mb-0 leading-normal text-sm">Alexa Liras</h6>
                                                  <p class="mb-0 leading-tight text-xs text-slate-400">
                                                      alexa@creative-tim.com
                                                  </p>
                                              </div>
                                          </div>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <p class="mb-0 font-semibold leading-tight text-xs">Programator</p>
                                          <p class="mb-0 leading-tight text-xs text-slate-400">Developer</p>
                                      </td>
                                      <td
                                          class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                          <span
                                              class="bg-gradient-to-tl from-slate-600 to-slate-300 px-3.6 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Offline</span>
                                      </td>
                                      <td
                                          class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <span class="font-semibold leading-tight text-xs text-slate-400">11/01/19</span>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <a href="javascript:;"
                                              class="font-semibold leading-tight text-xs text-slate-400">
                                              Edit </a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <div class="flex px-2 py-1">
                                              <div>
                                                  <img src="../assets/img/team-4.jpg"
                                                      class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl"
                                                      alt="user3" />
                                              </div>
                                              <div class="flex flex-col justify-center">
                                                  <h6 class="mb-0 leading-normal text-sm">Laurent Perrier</h6>
                                                  <p class="mb-0 leading-tight text-xs text-slate-400">
                                                      laurent@creative-tim.com</p>
                                              </div>
                                          </div>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <p class="mb-0 font-semibold leading-tight text-xs">Executive</p>
                                          <p class="mb-0 leading-tight text-xs text-slate-400">Projects</p>
                                      </td>
                                      <td
                                          class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                          <span
                                              class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Online</span>
                                      </td>
                                      <td
                                          class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <span class="font-semibold leading-tight text-xs text-slate-400">19/09/17</span>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                          <a href="javascript:;"
                                              class="font-semibold leading-tight text-xs text-slate-400">
                                              Edit </a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                          <div class="flex px-2 py-1">
                                              <div>
                                                  <img src="../assets/img/team-4.jpg"
                                                      class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl"
                                                      alt="user6" />
                                              </div>
                                              <div class="flex flex-col justify-center">
                                                  <h6 class="mb-0 leading-normal text-sm">Miriam Eric</h6>
                                                  <p class="mb-0 leading-tight text-xs text-slate-400">
                                                      miriam@creative-tim.com
                                                  </p>
                                              </div>
                                          </div>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                          <p class="mb-0 font-semibold leading-tight text-xs">Programtor</p>
                                          <p class="mb-0 leading-tight text-xs text-slate-400">Developer</p>
                                      </td>
                                      <td
                                          class="p-2 leading-normal text-center align-middle bg-transparent border-b-0 text-sm whitespace-nowrap shadow-transparent">
                                          <span
                                              class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3.6 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Online</span>
                                      </td>
                                      <td
                                          class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                          <span class="font-semibold leading-tight text-xs text-slate-400">14/09/20</span>
                                      </td>
                                      <td
                                          class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                          <a href="javascript:;"
                                              class="font-semibold leading-tight text-xs text-slate-400">
                                              Edit </a>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
        </main>
    </div>
    </div>
@endsection
