@if ($todo->completed)
    <i class="fas fa-check-circle ml-auto mr-2  "
       onclick="event.preventDefault();
           document.getElementById('form-incomplete-{{$todo->id}}').submit()"
       style="color: #2a9055;font-size: 20px;cursor: pointer "></i>
    <form style="display: none" method="post" id="{{'form-incomplete-'.$todo->id}}" action="{{route('todo.incomplete',$todo->id)}}">
        @csrf
        @method('put')
    </form>
@else
    <span class="fas fa-check-circle  ml-auto mr-2 "
          onclick="event.preventDefault();
              document.getElementById('form-complete-{{$todo->id}}').submit()"
          style="color: #afafaf;font-size: 20px;cursor: pointer"></span>
    <form style="display: none" method="post" id="{{'form-complete-'.$todo->id}}" action="{{route('todo.complete',$todo->id)}}">
        @csrf
        @method('put')
    </form>
@endif
