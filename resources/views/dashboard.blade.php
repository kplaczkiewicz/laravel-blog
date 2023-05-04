@extends('layouts.app')

@section('content')
    <div class="container py-12">
        <div class="prose text-center max-w-full pt-10">
            <h1>Dashboard</h1>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                        {{ Auth::user()->name }}

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                
                            <button type="submit">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
