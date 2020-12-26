@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        <div style="align-items:center;"> {{ $users->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">USERNAME</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->status}}</td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class=" text-white" href="{{route('users.edit', $user->id)}}">
                                edit
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
