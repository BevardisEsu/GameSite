


<h1>{{__('names.scoresce')}} {{__('names.creation')}}</h1>
<span>{{__('names.creationform')}}</span>
<form action="{{route('scores.store')}}" method="post">

    <div class="container">
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

    </div>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.create')}}">
    @csrf
</form>



