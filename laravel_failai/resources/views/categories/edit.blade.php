
<h1>{{__('names.categoriesce')}} {{__('names.editing')}} {{$category->name}}</h1>
<span>{{__('names.editingform')}}</span>
<form action="{{route('categories.update', $category->id)}}" method="POST">
    @csrf
    @if($category)
        @method('PUT')
    @endif


    <label>
        <input type="text" name="name" placeholder="Name" value="">
    </label><br>
    <label>
        <input type="text" name="slug" placeholder="Slug" value="">
    </label><br>
    <label>
        <input type="text" name="description" placeholder="Description" value="">
    </label><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="Atnaujinti">
</form>


