


<h1>{{__('names.productsce')}} {{__('names.creation')}}</h1>
<span>{{__('names.creationform')}}</span>
<form action="{{route('products.store')}}" method="post">

    <div class="container">
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
            <input type="text" name="price" placeholder="Price" value="">
        </label><br>
    </div>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.create')}}">
    @csrf
</form>



