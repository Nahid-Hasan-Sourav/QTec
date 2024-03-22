@extends('master')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 ">
                <div class="card my-5" >
                    @if (auth()->check())
                    <h3 class="text-success text-center">Qtec Solution Limited Task</h3>
                    @else
                    <h3 class="text-success text-center">Wellcome...!!!</h3>
                    <h6 class="text-center">Please <a href="{{ route('login') }}">Login</a>  
                    
                    </h6>

                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
