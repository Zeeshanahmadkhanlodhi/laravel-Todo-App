@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('successful_message'))
            <div class="alert alert-success">
                {{ Session::get('successful_message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                    </div>

                    <h1 class="ml-auto mr-auto">{{$todo->title}}</h1>
                    <p class="text-capitalize text-center mb-5 mt-1">{{$todo->description}}</p>

                    <a href="/todos/" class="d-flex justify-content-center mr-5 ml-5 mb-3">   <button class="btn btn-dark form-control"> Show All </button></a>



                </div>
                @include('sweetalert::alert')
            </div>
        </div>
    </div>
@endsection

