<div class="row">
    <div class="col s12">
        <h1>{{__('names.scorescre')}}</h1>
        <a href="{{route('scores.create')}}" class="btn btn-primary">{{__('scores.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.user_id')}}</th>
                <th>{{__('names.game_id')}}</th>
                <th>{{__('names.score')}}</th>
                <th>{{__('names.status')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($scores as $score)
                <tr>
                    <td>{{$score->id}}</td>
                    <td>{{$score->user_id}}</td>
                    <td>{{$score->game_id}}</td>
                    <td>{{$score->score}}</td>
                    <td>{{$score->status}}</td>
                    <td>
                        <a href="{{route('scores.edit', $score->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('scores.show', $score->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('scores.destroy', $score->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{__('action.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
