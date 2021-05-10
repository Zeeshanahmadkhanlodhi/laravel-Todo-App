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

                        <h1 class="ml-auto mr-auto">All Todos</h1>
                        <a href="/todos/create" class="text-decoration-none text-info mb-5 d-flex justify-content-center  "> <button class="btn btn-outline-dark w-25  ">  Create Todo </button> </a>
                    <ul>
                        @if($todos->count() > 0)
                        @foreach($todos as $todo)
                            <Li class="d-flex justify-content-between">
                                <div>
                                    @include('todos.complete-button')
                                </div>
                                @if($todo->completed)
                                    <p style="text-decoration: line-through"> {{ $todo->title }}</p>
                                @else
                                    <a class="text-decoration-none" href="{{route('todos.show',$todo->id)}}" > {{$todo->title }}</a>
                                @endif
                                <div>
                                    <a href="{{'/todos/'.$todo->id.'/edit'}}" class="text-decoration-none text-dark ml-auto mr-1"> <button class="btn  ">  <i class="fas fa-edit " style="color: #1d68a7;font-size: 20px"></i> </button></a>
                                    <span class="fas fa-trash-alt mr-2"
                                          onclick="event.preventDefault();
                                                if(confirm('Are you Really want to delete it?')){
                                              document.getElementById('form-delete-{{$todo->id}}').submit();
                                              }"
                                          style="color: red;font-size: 20px;cursor: pointer"></span>
                                    <form style="display: none" method="post" id="{{'form-delete-'.$todo->id}}" action="{{route('todos.destroy',$todo->id)}}">
                                        @csrf
                                        @method('delete')
                                    </form>



                                </div>

                            </Li>
                            <hr>
                        @endforeach

                        @else
                                <h3>No Tasks Available, create One.</h3>

                        @endif

                    </ul>


                </div>
                @include('sweetalert::alert')
            </div>
        </div>
    </div>
@endsection
