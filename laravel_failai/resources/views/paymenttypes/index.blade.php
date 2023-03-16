<div class="row">
    <div class="col s12">
        <h1>{{__('names.paymenttypesce')}}</h1>
        <a href="{{route('paymenttypes.create')}}" class="btn btn-primary">{{__('paymenttypes.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.name')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentsTypes as $paymentsType)
                <tr>
                    <td>{{$paymentsType->id}}</td>
                    <td>{{$paymentsType->name}}</td>
                    <td>
                        <a href="{{route('paymenttypes.edit', $paymentsType->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('paymenttypes.show', $paymentsType->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('paymenttypes.destroy', $paymentsType->id)}}" method="post">
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
