@extends('layouts.layout')

@section('content')
    <form class="shadow rounded-md w-[500px]" method="POST" action="{{ route('interview.update', $interview->id) }}">
        @csrf
        <div class="p-4">
            <input type="hidden" value="{{ $interview->interview_id }}"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                name="interview_name" value={{ $interview->interview_name }}>
        </div>
        <div class="p-4">
            <select name="interviewer"
                class="@error('interviewer') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                id="interviewer">
                <option value="{{ $interview->user->id }}">{{ $interview->user->name }}</option>
                @foreach ($admin as $a)
                    @if ($a->id !== $interview->interviewer)
                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('Interview')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
        </div>
        <div class="p-4">
            <select name="interviewees_id"
                class="@error('interviewees_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                id="interviewees_id">
                <option value="{{ $interview->interviewees->id }}">
                    {{ $interview->interviewees->name . ' ' . $interview->interviewees->surname }}</option>
                @foreach ($interviewee as $a)
                    @if ($interview->interviewees->id !== $a->id)
                        <option value="{{ $a->id }}">{{ $a->name . ' ' . $a->surname }}</option>
                    @endif
                @endforeach
            </select>
            @error('interviewees_id')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
        </div>

        <div class="p-4">
            <input type="date" min=<?php echo date('Y-m-d'); ?>
                class="@error('interview_date') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                name="interview_date" value={{ $interview->interview_date }}>
            @error('interview_date')
                <div class="alert alert-danger error-login">{{ $message }}</div>
            @enderror
        </div>


        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
        </div>
    </form>
@endsection('content')
