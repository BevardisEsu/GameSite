

<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200"> <br>

            </div>
            <div class="card-content">
                <div>{{__('names.id')}}: {{$poroduct->id}}</div>
                <p>{{__('names.name')}}: {{ $product->name }}</p>
                <p>{{__('names.description')}}: {{$product->description}}</p>
                <p>{{__('names.category_id')}}: {{$product->category_id}}</p>
                <p>{{__('names.image')}}: {{$product->image}}</p>
                <p>{{__('names.price')}}: {{$product->price}}</p>

            </div>
            <div class="card-action">
                <a href="{{ route('products.edit', $product->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">{{__('action.edit')}}</i>
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">{{__('action.delete')}}</i>
                    </button>
                    </br>
                    <a href="{{route('products.index')}}" class="btn btn-primary">{{__('action.home')}}</a>
                </form>
            </div>
        </div>
    </div>
</div>

