
<h1>{{__('names.scoresce')}} {{__('names.editing')}} {{$scores->user_id}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('scores.update', $scores->id)}}" method="POST">
    @csrf
    @if($scores)
        @method('PUT')
    @endif
    <label>
        <input type="text" name="user_id" placeholder="User ID" value="">
    </label><br>
    <label>
        <input type="text" name="game_id" placeholder="Game ID" value="">
    </label><br>
    <label>
        <input type="text" name="score" placeholder="Score" value="">
    </label><br>
    <label>
        <input type="text" name="status" placeholder="Status" value="">
    </label><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.update')}}">
</form>


