
<h1>{{__('names.orderscre')}} {{__('names.editing')}} {{$order->name}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('orders.update', $order->id)}}" method="POST">
    @csrf
    @if($order)
        @method('PUT')
    @endif


    <label>
        <input type="text" name="status_id" placeholder="Status_id" value="">
    </label><br>
    <label>
        <input type="text" name="payment_id" placeholder="Payment_id" value="">
    </label>
    <label>
        <input type="text" name="status_id" placeholder="Status_id" value="">
    </label><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.update')}}">
</form>


