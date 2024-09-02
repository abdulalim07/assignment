@extends('layouts.app')

@section('content')
    {{-- Hello Start --}}
    <div class="border-grey-lighter border-b py-16 lg:py-20">
        <div>
            <img src="{{ asset('assets/img/author.png') }}" class="h-16 w-16" alt="author" />
        </div>
        <h1 class="font-body text-primary pt-3 text-4xl font-semibold dark:text-white md:text-5xl lg:text-6xl">
            Hi, I’m Al Razi.
        </h1>
        <p class="font-body text-primary pt-3 text-xl font-light dark:text-white">
            A software engineer and open-source advocate enjoying the sunny life in Barcelona, Spain.
        </p>
        <a href="/"
            class="bg-secondary font-body hover:bg-green mt-12 block px-10 py-4 text-center text-xl font-semibold text-white transition-colors sm:inline-block sm:text-left sm:text-2xl">
            Say Hello!
        </a>
    </div>
    {{-- Hello End --}}
@endsection
