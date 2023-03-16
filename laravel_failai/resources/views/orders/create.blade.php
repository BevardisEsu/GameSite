


<h1>{{__('names.orderscre')}} {{__('names.creation')}}</h1>
<span>{{__('names.creationform')}}</span>
<form action="{{route('orders.store')}}" method="post">

    <div class="container">
        <label>
            <input type="text" name="user_id" placeholder="User_id" value="">
        </label><br>
        <label>
            <input type="text" name="payment_id" placeholder="Payment_id" value="">
        </label><br>
        <label>
            <input type="text" name="status_id" placeholder="Status_id" value="">
        </label><br>

    </div>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.create')}}">
    @csrf
</form>



