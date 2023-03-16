<div class="row">
    <div class="col s12">
        <h1>{{__('names.orderscre')}}</h1>
        <a href="{{route('orders.create')}}" class="btn btn-primary">{{__('orders.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.user_id')}}</th>
                <th>{{__('names.payment_id')}}</th>
                <th>{{__('names.status_id')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $orders)
                <tr>
                    <td>{{$orders->id}}</td>
                    <td>{{$orders->user_id}}</td>
                    <td>{{$orders->payment_id}}</td>
                    <td>{{$orders->status_id}}</td>
                    <td>
                        <a href="{{route('orders.edit', $orders->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('orders.show', $orders->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('orders.destroy', $orders->id)}}" method="post">
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
