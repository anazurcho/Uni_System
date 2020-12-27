@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        <div style="align-items:center;"> {{ $student_shells->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">user</th>
                <th scope="col">lecture</th>
                <th scope="col">total score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student_shells as $student_shell)
                <tr>
                    <td>{{$student_shell->user->name}}</td>
                    <td>{{$student_shell->lecture->name}}</td>
                    <td>{{$student_shell->total_score}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
