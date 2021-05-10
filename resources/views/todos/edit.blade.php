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

                    <h1 class="ml-auto mr-auto">Update Your Todo</h1>
                    <form method="post"  action="{{route('todos.update',$todo->id)}}" class="ml-5 mr-5 mt-5 mb-2">
                        @csrf
                        {{ method_field('PATCH') }}
                        <input type="text" name="title" value="{{$todo->title}}" class="form-control" >
                        <textarea name="description"  class="form-control mt-3" rows="10" placeholder="Description" >{{$todo->description}}</textarea>

                        <input type="submit" value="Update" class="btn btn-success btn-block ml-auto mr-auto mt-2">
                    </form>
                    <a href="/todos/" class="d-flex justify-content-center mr-5 ml-5 mb-3">   <button class="btn btn-dark form-control"> Show All </button></a>



                </div>
                @include('sweetalert::alert')
            </div>
        </div>
    </div>
@endsection
