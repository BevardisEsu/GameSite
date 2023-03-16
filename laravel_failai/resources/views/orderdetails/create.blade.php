


<h1>{{__('names.orderdetailsce')}} {{__('names.creation')}}</h1>
<span>{{__('names.creationform')}}</span>
<form action="{{route('orderdetails.store')}}" method="post">

    <div class="container">
        <label>
            <input type="text" name="order_id" placeholder="Order ID" value="">
        </label><br>
        <label>
            <input type="text" name="product_id" placeholder="Product ID" value="">
        </label><br>
        <label>
            <input type="text" name="status_id" placeholder="Status ID" value="">
        </label><br>
        <label>
            <input type="text" name="price" placeholder="Price" value="">
        </label><br>

    </div>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.create')}}">
    @csrf
</form>



