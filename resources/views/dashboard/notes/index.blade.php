@extends('dashboard.master')

@section('body')
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-5 ">
                <div class="card my-5">
                    <h3 class="text-success text-center">Notes</h3>


                </div>

            </div> --}}
            <div class="row">

            <button class="btn btn-md btn-primary" id="AddNoteButton">Add Note</button>

            </div>
            <hr>

                {{-- <div class="row row-cols-3">
                    <div class="col border">

                        <div class="card">
                            <div class="card-header">
                              <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                  ...
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <li><a class="dropdown-item" href="#">Edit</a></li>
                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                              </div>
                            </div>
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>

                    </div>

                    </div>
                </div> --}}
    </div>
    @include('dashboard.notes.modal.addModal')
@endsection
