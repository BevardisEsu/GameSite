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
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->image}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('products.destroy', $product->id)}}" method="post">
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
