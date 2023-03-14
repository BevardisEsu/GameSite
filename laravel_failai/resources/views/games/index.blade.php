<div class="row">
    <div class="col s12">
        <h1>{{__('names.gamecre')}}</h1>
        <a href="{{route('games.create')}}" class="btn btn-primary">{{__('games.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.name')}}</th>
                <th>{{__('names.description')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{$game->id}}</td>
                    <td>{{$game->name}}</td>
                    <td>{{$game->description}}</td>
                    <td>
                        <a href="{{route('games.edit', $game->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('games.show', $game->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('games.destroy', $game->id)}}" method="post">
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
