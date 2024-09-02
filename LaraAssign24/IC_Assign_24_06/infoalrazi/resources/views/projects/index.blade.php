@extends('layouts.app')

@section('content')
    {{-- Project Start --}}
    <div class="py-16 lg:py-20">
        <div>
            <img src="/assets/img/icon-blog.png" alt="icon envelope" />
        </div>

        <h1 class="font-body text-primary pt-5 text-4xl font-semibold dark:text-white md:text-5xl lg:text-6xl">
            Project
        </h1>

        <div class="pt-3 sm:w-3/4">
            <p class="font-body text-primary text-xl font-light dark:text-white">
                It seems like you've provided a random string of characters, "lorem100". Could you please provide more
                context or clarify what you would like to do with this input? Are you looking for a specific analysis,
                generation, or manipulation of this text? I'm here to help with any task you have in mind!
            </p>
        </div>

        <div class="pt-8 lg:pt-12">
            @foreach ($projects as $project)
                <div class="border-grey-lighter border-b pb-8">
                    <span
                        class="bg-green-light font-body text-green mb-4 inline-block rounded-full px-2 py-1 text-sm">{{ $project['title'] }}</span>
                    @foreach ($project['technologies'] as $technology)
                    <a href="#"
                        class="font-body text-primary hover:text-green dark:hover:text-secondary block text-lg font-semibold transition-colors dark:text-white">
                        {{ $technology }}
                    </a>
                    @endforeach
                    <div class="flex items-center pt-4">
                        <p class="font-body text-primary pr-2 font-light dark:text-white">
                            {{ $project['description'] }}
                        </p>
                    </div>
                    <div class="flex items-center pt-4">
                        <p class="font-body text-primary pr-2 font-light dark:text-white">
                            {{ $project['start_date'] }}
                        </p>
                        <span class="font-body text-grey dark:text-white">to</span>
                        <p class="font-body text-primary pl-2 font-light dark:text-white">
                            {{ $project['end_date'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex pt-8 lg:pt-16">
            <span class="border-secondary font-body text-secondary cursor-pointer border-2 px-3 py-1 font-medium">1</span>
            <span
                class="border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:hover:border-secondary dark:hover:text-secondary ml-3 cursor-pointer border-2 px-3 py-1 font-medium transition-colors dark:text-white">2</span>
            <span
                class="border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:hover:border-secondary dark:hover:text-secondary ml-3 cursor-pointer border-2 px-3 py-1 font-medium transition-colors dark:text-white">3</span>
            <span
                class="border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:hover:border-secondary dark:hover:text-secondary group ml-3 flex cursor-pointer items-center border-2 px-3 py-1 font-medium transition-colors dark:text-white">Next
                <i
                    class="bx bx-right-arrow-alt text-primary group-hover:text-secondary ml-1 transition-colors dark:text-white"></i></span>
        </div>
    </div>
    {{-- Project End --}}
@endsection
