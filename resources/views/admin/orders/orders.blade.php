@extends("admin.admin")
@section('title')
    {{__("admin.orders")}}
@endsection
@section('content')
    <table class="table text-center">
        <tr>
            <th class="align-middle">
                {{__("admin.customer")}}(ID)
            </th>
            <th class="align-middle">
                {{__("admin.product")}}(ID)
            </th>
            <th class="align-middle">
                {{__("admin.buyers_data")}}
            </th>
            <th class="align-middle">
                {{__("admin.cost")}}
            </th>
            <th class="align-middle">
                {{__("admin.comment")}}
            </th>
            <th class="align-middle">
                {{__("admin.order_date")}}
            </th>
            <th class="align-middle">
                {{__("admin.status")}}
            </th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td class="align-middle">
                    {{\App\Models\User::find($order->user_id)->name}}<br>
                    ({{$order->user_id}})
                </td>
                <td class="align-middle">
                    {{\App\Models\Product::find($order->product_id)->name}}<br>
                    ({{$order->product_id}})
                </td>
                <td class="align-middle">
                    <table class="table-primary container">
                        <tr>
                            <td class="">{{__("admin.email")}}:</td>
                            <td>{{$order->email}}</td>
                        </tr>
                        <tr>
                            <td>{{__("admin.phone")}}:</td>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <td>{{__("admin.post")}}:</td>
                            <td>{{$order->post_index}}</td>
                        </tr>
                    </table>
                </td>
                <td class="align-middle">
                    {{\App\Models\Product::find($order->product_id)->price}}$
                </td>
                <td class="align-middle">
                    @if($order->comment_to_order != 0)
                        {{$order->comment_to_order}}
                    @else
                        -
                    @endif
                </td>
                <td class="align-middle">
                    {{$order->created_at}}
                </td>
                @if($order->status == 0)
                    <td class="align-middle">
                        <b class="text-red">{{__("admin.not_execute")}}</b>
                        <a href="{{route("execute_order", ['id' => $order->id])}}"
                           class="btn btn-success rounded-pill mt-3"
                           type="button">{{__("admin.execute")}}</a>
                    </td>
                @else
                    <td class="align-middle">
                        <b class="text-green">{{__("admin.successful_execute")}}</b>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
    <div class="container d-flex justify-content-center text-dark">
        {{ $orders->links() }}
    </div>
@endsection

