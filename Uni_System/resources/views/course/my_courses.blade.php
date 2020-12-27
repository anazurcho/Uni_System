@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        <div style="align-items:center;"> {{ $courses->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                @can('admin')
                    <th scope="col">#</th>
                @endcan
                <th scope="col">course</th>
                <th scope="col">lecture</th>
                <th scope="col">Score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    @can('admin')
                        <th scope="row">{{$course->id}}</th>
                    @endcan
                    <td>{{$course->lecture->course->name}}</td>
                    <td>{{$course->lecture->name}}</td>
                    <td>{{$course->total_score}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
