@extends("layouts.layout")

@section('content')
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg container mx-auto">
        <table class="w-full text-sm text-left  text-gray-400">
            <caption class="p-5 relative text-lg font-semibold text-left  bg-white text-white bg-gray-800">
                Your Interviewee Types
                <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products designed to help you work, grow your business, and more. (Fix this text)</p>
                <a class="absolute top-4 right-6" href="{{route('interviewee.create')}}">
                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
                </a>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Edit
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach( $interviewees as $i ) <!-- Qet secilin prej userave ne tabele -->
                    <tr class="bg-white border-b bg-gray-800 border-gray-700">
                        <td class="py-4 px-6 text-white">
                            {{ $i -> id }} <!-- Qet ID te Userit -->
                        </td>
                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            {{ $i -> name }} <!-- Qet Emrin e Userit -->
                        </th>
                        <td class="py-4 px-6 text-blue-600">
                            <a href="{{route('interviewee.edit',$i->id)}}">Edit</a> <!-- Edit Button Here -->
                        </td>
                        <td class="py-4 px-6 text-red-600">
                            <a href="{{ route('interviewee.destroy', $i -> id) }}">Delete</a> <!-- Delete Button Here -->
                        </td>
                    </tr>
              @endforeach
            </tbody>
        </table>
        {{ $interviewees->links() }}
    </div>
@endsection('content')
