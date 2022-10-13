@extends("admin.admin")
@section("title")
    {{__("admin.statistic")}}
@endsection
@section("content")
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Models\Order::all()->count()}}</h3>

                    <p>{{__("admin.orders")}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route("orders")}}" class="small-box-footer">{{__("admin.more_info")}} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\Product::all()->count()}}</h3>
                    <p>{{__("admin.products")}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route("products")}}" class="small-box-footer">{{__("admin.more_info")}} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{\App\Models\User::all()->count()}}</h3>

                    <p>{{__("admin.users")}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route("users")}}" class="small-box-footer">{{__("admin.more_info")}} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
