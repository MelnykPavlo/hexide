@extends("admin.admin")
@section('title')
    {{__("admin.users")}}
@endsection
@section('content')
    <table class="table text-center">
        <tr>
            <th>
                {{__("admin.name")}}
            </th>
            <th>
                {{__("admin.email")}}
            </th>
            <th>
                {{__("admin.role")}}
            </th>
            <th>
                {{__("admin.created_at")}}
            </th>
            <th>
                {{__("admin.action")}}
            </th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="align-middle">
                    {{$user->name}}
                </td>
                <td class="align-middle">
                    {{$user->email}}
                </td>
                <td class="align-middle">
                    @if($user->is_admin == 1)
                        {{__("admin.admin")}}
                    @else
                        {{__("admin.user")}}
                    @endif
                </td>
                <td class="align-middle">
                    {{$user->created_at}}
                </td>
                @if($user->is_admin == 0)
                    <td class="align-middle">
                        <a href="{{route("delete_user", ['id' => $user->id])}}" class="btn btn-danger rounded-pill mx-2"
                           type="button">{{__("admin.delete")}}</a>
                    </td>
                @else
                    <td class="align-middle">
                        {{__("admin.no_action")}}
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
    <div class="container d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
