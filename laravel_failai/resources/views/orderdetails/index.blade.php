<div class="row">
    <div class="col s12">
        <h1>{{__('names.orderdetailsce')}}</h1>
        <a href="{{route('orderdetails.create')}}" class="btn btn-primary">{{__('orderdetails.create')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('names.id')}}</th>
                <th>{{__('names.order_id')}}</th>
                <th>{{__('names.product_id')}}</th>
                <th>{{__('names.status_id')}}</th>
                <th>{{__('names.price')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orderdetails as $orderdetail)
                <tr>
                    <td>{{$orderdetail->id}}</td>
                    <td>{{$orderdetail->order_id}}</td>
                    <td>{{$orderdetail->product_id}}</td>
                    <td>{{$orderdetail->status_id}}</td>
                    <td>{{$orderdetail->price}}</td>
                    <td>
                        <a href="{{route('orderdetails.edit', $orderdetail->id)}}" class="btn btn-primary">{{__('action.edit')}}</a>
                        <a href="{{route('orderdetails.show', $orderdetail->id)}}" class="btn btn-primary">{{__('action.show')}}</a>
                        <form action="{{route('orderdetails.destroy', $orderdetail->id)}}" method="post">
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
