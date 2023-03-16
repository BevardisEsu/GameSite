<h1>{{__('names.paymentcre')}} {{__('names.creation')}}</h1>
<span>{{__('names.creationform')}}</span>
<form action="{{route('payments.store')}}" method="post">

    <div class="container">
        <label>
            <input type="text" name="name" placeholder="Name" value="">
        </label><br>
        <label>
            <input type="text" name="description" placeholder="Description" value="">
        </label><br>
        <label>
            <input type="text" name="amount" placeholder="Amount" value="">
        </label><br>
        <label>
            <input type="text" name="status_id" placeholder="Status_id" value="">
        </label><br>
    </div>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.create')}}">
    @csrf
</form>



