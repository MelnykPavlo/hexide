@extends("admin.admin")
@section('title')
    {{__("admin.products")}}
    <a href="{{route("form_add_product")}}" class="btn btn-dark rounded-pill float-right" type="button">{{__("admin.add")}}</a>
@endsection
@section('content')
    <table class="table text-center">
        <tr>
            <th>
                {{__("admin.image")}}
            </th>
            <th>
                {{__("admin.name")}}
            </th>
            <th>
                {{__("admin.price")}}
            </th>
            <th>
                {{__("admin.created_at")}}
            </th>
            <th>
                {{__("admin.updated_at")}}
            </th>
            <th>
                {{__("admin.action")}}
            </th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td class="align-middle">
                    <img src="{{$product->image}}" alt="" height="100px" width="100px">
                </td>
                <td class="align-middle">
                    @php($name = $product->translate("name"))
                    {{$product->$name}}
                </td>
                <td class="align-middle">
                    {{$product->price}} $
                </td>
                <td class="align-middle">
                    {{$product->created_at}}
                </td>
                <td class="align-middle">
                    {{$product->updated_at}}
                </td>
                <td class="align-middle">
                    <a href="{{route("form_edit_product", ['id' => $product->id])}}" class="btn btn-warning rounded-pill mx-2" type="button">{{__("admin.edit")}}</a>
                    <a href="{{route("delete_product", ['id' => $product->id])}}" class="btn btn-danger rounded-pill" type="button">{{__("admin.delete")}}</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="container d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection


