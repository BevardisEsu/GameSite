
<h1>{{__('names.statusescre')}} {{__('names.editing')}} {{$games->name}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('statuses.update', $status->id)}}" method="POST">
    @csrf
    @if($status)
        @method('PUT')
    @endif


    <input type="text" name="name" placeholder="Name" value=""><br>
    <input type="text" name="description" placeholder="Description" value=""><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.update')}}">
</form>


