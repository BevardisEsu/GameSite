
<h1>{{__('names.orderdetailsce')}} {{__('names.editing')}} {{$orderdetails->name}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('orderdetails.update', $orderdetails->id)}}" method="POST">
    @csrf
    @if($orderdetails)
        @method('PUT')
    @endif


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
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.update')}}">
</form>


