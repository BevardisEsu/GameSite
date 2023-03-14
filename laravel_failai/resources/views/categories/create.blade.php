


<h1>{{__('names.categoriesce')}} {{__('names.creation')}}</h1>
<span>{{__('names.creationform')}}</span>
<form action="{{route('categories.store')}}" method="post">

    <div class="container">
        <label>
            <input type="text" name="name" placeholder="Name" value="">
        </label><br>
        <label>
            <input type="text" name="description" placeholder="Description" value="">
        </label><br>

    </div>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="{{__('action.create')}}">
    @csrf
</form>



