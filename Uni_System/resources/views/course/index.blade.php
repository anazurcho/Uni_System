@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin', Auth::user())
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.course')}}">
                        add course
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $courses->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course</th>

            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course->id}}</th>
                    <td>{{$course->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
