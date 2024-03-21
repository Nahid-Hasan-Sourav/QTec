{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('master')

@section('body')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5 vh-100">
                <div class="card">
                    <form class="card-body " action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                           <h4 class="fw-bold text-center">CRATE AN ACCOUNT</h4>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                                   name="name"
                                   placeholder="Name">
                        </div>


                        <div class="mb-3">
                            <input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
                                   name="email"
                                   placeholder="email">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                                   name="password"
                                   placeholder="password">
                        </div>
                       






                        <div class="text-center row my-4 px-3">
                            <button type="submit" class="btn btn-color px-5 mb-1 w-100 btn-success text-uppercase fw-bold">sign up</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
