
<h1>{{__('names.gamesce')}} {{__('names.editing')}} {{$game->name}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('categories.update', $game->id)}}" method="POST">
    @csrf
    @if($game)
        @method('PUT')
    @endif


    <input type="text" name="name" placeholder="Name" value=""><br>
    <input type="text" name="description" placeholder="Description" value=""><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.update')}}">
</form>


