


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


                        <div id="emailHelp" class="form-text text-center mb-2 text-dark">Already an account? <a href="{{route('login')}}" class="text-dark fw-bold"> Login
                           </a>
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
