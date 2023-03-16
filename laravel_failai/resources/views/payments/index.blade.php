<div class="row">
    <div class="col s12">
        <h1>{{__('names.paymentcre')}}</h1>
        <a href="{{route('payments.create')}}" class="btn btn-primary">{{__('payments.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.name')}}</th>
                <th>{{__('names.description')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payment as $payments)
                <tr>
                    <td>{{$payments->id}}</td>
                    <td>{{$payments->name}}</td>
                    <td>{{$payments->description}}</td>
                    <td>{{$payments->status_id}}</td>
                    <td>
                        <a href="{{route('payments.edit', $payments->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('payments.show', $payments->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('payments.destroy', $payments->id)}}" method="post">
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
