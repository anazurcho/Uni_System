@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin', Auth::user())
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.student_shell')}}">
                        add student shell
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $student_shells->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">user</th>
                <th scope="col">course</th>
                <th scope="col">lecture</th>
                <th scope="col">lecturer</th>
                <th scope="col">total score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student_shells as $student_shell)
                <tr>
                    <td>{{$student_shell->user->name}}</td>
                    <td>{{$student_shell->lecture->course->name}}</td>
                    <td>{{$student_shell->lecture->name}}</td>
                    <td>{{$student_shell->lecture->lecturer->name}}</td>
                    <td>{{$student_shell->total_score}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
