
<h1>{{__('names.paymentcre')}} {{__('names.editing')}} {{$games->name}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('payments.update', $payment->id)}}" method="POST">
    @csrf
    @if($payment)
        @method('PUT')
    @endif


    <input type="text" name="name" placeholder="Name" value=""><br>
    <input type="text" name="description" placeholder="Description" value=""><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.update')}}">
</form>


