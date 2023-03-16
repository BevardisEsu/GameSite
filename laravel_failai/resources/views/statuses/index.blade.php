<div class="row">
    <div class="col s12">
        <h1>{{__('names.statusescre')}}</h1>
        <a href="{{route('statuses.create')}}" class="btn btn-primary">{{__('statuses.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.name')}}</th>
                <th>{{__('names.type')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($status as $statuses)
                <tr>
                    <td>{{$statuses->id}}</td>
                    <td>{{$statuses->name}}</td>
                    <td>{{$statuses->type}}</td>
                    <td>
                        <a href="{{route('statuses.edit', $statuses->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('statuses.show', $statuses->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('statuses.destroy', $statuses->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{__('action.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
