@extends("admin.admin")
@section('title')
    {{__("admin.add_product")}}
    <a href="{{route("products")}}" class="btn btn-dark rounded-pill float-right" type="button">{{__("admin.cancel")}}</a>
@endsection
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{route("add_product")}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{__("admin.name_en")}}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}">
        </div>
        @error("name")
        <p class="text-red">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="name_ua" class="form-label">{{__("admin.name_ua")}}</label>
            <input type="text" class="form-control" id="name_ua" name="name_ua" value="{{old("name_ua")}}">
        </div>
        @error("name_ua")
        <p class="text-red">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="price" class="form-label">{{__("admin.price")}}</label>
            <input class="form-control" id="name" name="price" min="0" value="{{old("price")}}">
        </div>
        @error("price")
        <p class="text-red">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">{{__("admin.description")}}</label>
            <textarea type="text" class="form-control" id="description" name="description">{{old("description")}}</textarea>
        </div>
        @error("description")
        <p class="text-red">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="description_ua" class="form-label">{{__("admin.description_ua")}}</label>
            <textarea type="text" class="form-control" id="description_ua" name="description_ua">{{old("description_ua")}}</textarea>
        </div>
        @error("description_ua")
        <p class="text-red">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">{{__("admin.image")}}</label>
            <input type="file" class="form-control" id="image" name="image" alt="">
        </div>
        @error("image")
        <p class="text-red">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-success">{{__("admin.submit")}}</button>
    </form>
@endsection
