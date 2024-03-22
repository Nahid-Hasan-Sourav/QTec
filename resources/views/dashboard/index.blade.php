@extends('dashboard.master')

@section('body')
    <div class="container">
       <div class="row">
        <div class="col-3">
            <a href="{{ route('notes') }}" class="card shadow-lg text-dark">
                <div class="card-body">
                    <h5>Totall Notes : {{ $allNotecount }}</h5>
                </div>
            </a>
        </div>
       </div>
    </div>
  

@endsection
