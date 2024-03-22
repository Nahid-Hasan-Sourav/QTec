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
                <div class="row p-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchByTile" aria-describedby="emailHelp" placeholder="Search By Title">
                    </div>
                </div>
                <div class="row" id="noteContainer">


                </div>
                </div>
    </div>
    @include('dashboard.notes.modal.addModal')
    @include('dashboard.notes.modal.editModal')

@endsection
