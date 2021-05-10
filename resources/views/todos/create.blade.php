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


                    <form action="{{route('todos.store')}}" method="post" class="mr-5 ml-5 mt-5 mb-2">
                        <h1>Enter Your Todo</h1>

                        @csrf



                        <input type="text" name="title" class="form-control" placeholder="Title" >
                        <textarea name="description" class="form-control mt-3" rows="10" placeholder="Description" ></textarea>




                        <input type="text" name="steps" class="form-control" placeholder="Describe steps" />
                        <input type="submit" value="Submit" class="btn btn-success  form-control   ml-auto mr-auto mt-2">

                    </form>
                    <a href="/todos/" class="mb-4 ml-5 mr-5">   <button class="btn btn-dark form-control  "> Show All </button></a>



                    @livewire('steps')

                </div>
                @include('sweetalert::alert')
            </div>
        </div>
    </div>

@endsection
