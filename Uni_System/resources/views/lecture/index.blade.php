@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        <div style="align-items:center;"> {{ $lectures->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">lecture</th>
                <th scope="col">Course</th>

            </tr>
            </thead>
            <tbody>
            @foreach($lectures as $lecture)
                <tr>
                    <th scope="row">{{$lecture->id}}</th>
                    <td>{{$lecture->name}}</td>
                    <td>{{$lecture->course->name}}</td>
                    {{--                    <td>{{$lecture->email}}</td>--}}
                    {{--                    <td>{{$lecture->status}}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
