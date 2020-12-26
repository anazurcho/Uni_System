@extends("layout.layout")
@section("content")
    <div class="card border-primary marg-3 cont" align="center">
        <form method="post" action="{{route('users.update', $user->id)}}">
            @csrf
            @method("PUT")
            <div class="card-header bg-primary text-white"><h3>edit</h3></div>
            <div class="box-body marg_1">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email', $user->email)}}">
{{--                    <label>Password</label>--}}
{{--                    <input type="text" class="form-control" name="password" value="{{old('password', $user->password)}}">--}}
                    <label>status</label>
                    <input type="text" class="form-control" name="status" value="{{old('status', $user->status)}}">
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <div class="box-footer marg_1">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
