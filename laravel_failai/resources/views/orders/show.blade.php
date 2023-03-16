

<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200"> <br>

            </div>
            <div class="card-content">
                <div>{{__('names.id')}}: {{$order->id}}</div>
                <p>{{__('names.user_id')}}: {{ $order->user_id }}</p>
                <p>{{__('names.payment_id')}}: {{$order->payment_id}}</p>
                <p>{{__('names.status_id')}}: {{$order->status_id}}</p>

            </div>
            <div class="card-action">
                <a href="{{ route('orders.edit', $order->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">{{__('action.edit')}}</i>
                </a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">{{__('action.delete')}}</i>
                    </button>
                    <a href="{{route('orders.index')}}" class="btn btn-primary">{{__('action.home')}}</a>
                </form>
            </div>
        </div>
    </div>
</div>

