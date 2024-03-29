

<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200" alt="foto"> <br>

            </div>
            <div class="card-content">
                <div>{{__('names.id')}}: {{$paymentsType->id}}</div>
                <p>{{__('names.name')}}: {{$paymentsType->name}}</p>

            </div>
            <div class="card-action">
                <a href="{{ route('paymenttypes.edit', $paymentsType->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">{{__('action.edit')}}</i>
                </a>
                <form action="{{ route('paymenttypes.destroy', $paymentsType->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">{{__('action.delete')}}</i>
                    </button>
                    <a href="{{route('paymenttypes.index')}}" class="btn btn-primary">{{__('action.home')}}</a>
                </form>
            </div>
        </div>
    </div>
</div>

