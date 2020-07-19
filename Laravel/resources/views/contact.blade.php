@extends('layouts/app')

@section('content')
    <form
        method="POST"
        action="/contact"
        class="mx-auto bg-white p-6 rounded shadow-md"
        style="width: 400px"
    >
        @csrf
        <div class="mb-3">

            <label
                class="block text-xs uppercase font-semibold mb-1"
                for="email"
            >
                Email Address
            </label>

            <input
                class="border px-2 py-1 text-sm w-full"
                type="text"
                id="email"
                name="email"
            >

            @error('email')
                <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>

        <button
            class="bg-blue-500 py-2 text-white rounded-full text-sm w-full"
            type="submit"
        >
            Email me
        </button>

        @if (session('message'))
            <p class="text-green-500 text-xs mt-2">
                {{ session('message')}}
            </p>
        @endif
    </form>
@endsection
