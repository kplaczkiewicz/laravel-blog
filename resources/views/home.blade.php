@extends('layouts.app')

@section('content')
    <div class="hero min-h-[400px] bg-cover" style="background-image: url('{{ asset('assets/img/hero-bg.jpg') }}')">
        <div class="hero-overlay bg-opacity-60 "></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-4xl font-bold">Welcome to Larablog</h1>
                <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.</p>

                @auth
                    <a class="btn btn-info" href="post/create">
                        Join us
                    </a>
                @else
                    <a class="btn btn-info" href="{{ route('login') }}">
                        Join us
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <div class="py-10 container">
        <div class="text-center font-bold prose max-w-none">
            <h2>Latest posts</h2>
        </div>

        <div class="grid grid-cols-4">

        </div>
    </div>
@endsection
