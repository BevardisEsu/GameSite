

<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200"> <br>

            </div>
            <div class="card-content">
                <div>{{__('names.id')}}: {{$paymentsTypes->id}}</div>
                <p>{{__('names.name')}}: {{$paymentsTypes->name}}</p>

            </div>
            <div class="card-action">
                <a href="{{ route('paymenttypes.edit', $paymentsTypes->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">{{__('action.edit')}}</i>
                </a>
                <form action="{{ route('paymenttypes.destroy', $paymentsTypes->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">{{__('action.delete')}}</i>
                    </button>
                    </br>
                    <a href="{{route('paymenttypes.index')}}" class="btn btn-primary">{{__('action.home')}}</a>
                </form>
            </div>
        </div>
    </div>
</div>

