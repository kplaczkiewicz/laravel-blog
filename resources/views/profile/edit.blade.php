@extends('layouts.app')

@section('content')
    <div class="container py-12">
        <x-page-header>
            Profile
        </x-page-header>

        <div class="space-y-3">
            <div class="py-6 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="divider"></div> 

            <div class="py-6 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="divider"></div> 

            <div class="py-6 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
