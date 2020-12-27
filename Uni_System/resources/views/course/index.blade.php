@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        <div style="align-items:center;"> {{ $courses->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">course</th>
{{--                <th scope="col">Email</th>--}}
{{--                <th scope="col">Status</th>--}}

            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course->id}}</th>
                    <td>{{$course->name}}</td>
{{--                    <td>{{$user->email}}</td>--}}
{{--                    <td>{{$user->status}}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
