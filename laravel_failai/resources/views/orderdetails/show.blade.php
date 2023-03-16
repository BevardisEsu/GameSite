

<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200"> <br>

            </div>
            <div class="card-content">
                <div>{{__('names.id')}}: {{$orderdetails->id}}</div>
                <p>{{__('names.name')}}: {{ $orderdetails->name }}</p>
                <p>{{__('names.description')}}: {{$orderdetails->description}}</p>

            </div>
            <div class="card-action">
                <a href="{{ route('orderdetails.edit', $orderdetails->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">{{__('action.edit')}}</i>
                </a>
                <form action="{{ route('orderdetails.destroy', $orderdetails->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">{{__('action.delete')}}</i>
                    </button>
                    </br>
                    <a href="{{route('orderdetails.index')}}" class="btn btn-primary">{{__('action.home')}}</a>
                </form>
            </div>
        </div>
    </div>
</div>

