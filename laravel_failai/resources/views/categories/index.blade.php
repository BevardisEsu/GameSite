<div class="row">
    <div class="col s12">
        <h1> {{__('names.categories')}}</h1>
        <a href="{{route('categories.create')}}" class="btn btn-primary">{{__('action.create')}} </a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.name')}}</th>
                <th>{{__('names.description')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('categories.destroy',$category->id)}}" method="post">
                            @csrf
                            @method('DELTE')
                            <button type="submit" class="btn btn-danger">{{__('action.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
