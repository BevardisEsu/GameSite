

<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200"> <br>

            </div>
            <div class="card-content">
                <div>{{__('names.id')}}: {{$score->id}}</div>
                <p>{{__('names.user_id')}}: {{ $score->user_id }}</p>
                <p>{{__('names.game_id')}}: {{$score->game_id}}</p>
                <p>{{__('names.score')}}: {{$score->score}}</p>
                <p>{{__('names.status')}}: {{$score->status}}</p>


            </div>
            <div class="card-action">
                <a href="{{ route('scores.edit', $score->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">{{__('action.edit')}}</i>
                </a>
                <form action="{{ route('scores.destroy', $score->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">{{__('action.delete')}}</i>
                    </button>
                    </br>
                    <a href="{{route('scores.index')}}" class="btn btn-primary">{{__('action.home')}}</a>
                </form>
            </div>
        </div>
    </div>
</div>

