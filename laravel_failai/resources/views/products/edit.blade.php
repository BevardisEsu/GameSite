
<h1>{{__('names.productsce')}} {{__('names.editing')}} {{$products->name}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('products.update', $products->id)}}" method="POST">
    @csrf
    @if($products)
        @method('PUT')
    @endif


    <label>
        <input type="text" name="name" placeholder="Name" value="">
    </label><br>
    <label>
        <input type="text" name="description" placeholder="Description" value="">
    </label><br>
    <label>
        <input type="text" name="category_id" placeholder="Category_id" value="">
    </label><br>
    <label>
        <input type="text" name="image" placeholder="Image" value="">
    </label><br>
    <label>
        <input type="text" name="price" placeholder="Price" value="">
    </label><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.update')}}">
</form>


