<div class="row">
    <div class="col s12">
        <h1>{{__('names.productsce')}}</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">{{__('products.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.name')}}</th>
                <th>{{__('names.description')}}</th>
                <th>{{__('names.category_id')}}</th>
                <th>{{__('names.image')}}</th>
                <th>{{__('names.price')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product as $products)
                <tr>
                    <td>{{$products->id}}</td>
                    <td>{{$products->name}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->category_id}}</td>

                    <td>{{$products->price}}</td>
                    <td>
                        <a href="{{route('products.edit', $products->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('products.show', $products->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('products.destroy', $products->id)}}" method="post">
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
