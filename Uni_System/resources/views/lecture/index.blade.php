@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin', Auth::user())
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.lecture')}}">
                        add lecture
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $lectures->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course</th>
                <th scope="col">lecture</th>
                <th scope="col">lecturer</th>
                <th scope="col">edit</th>
                <th scope="col">open</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lectures as $lecture)
                <tr>
                    <th scope="row">{{$lecture->id}}</th>
                    <td>{{$lecture->course->name}}</td>
                    <td>{{$lecture->name}}</td>
                    <td>{{$lecture->user->name}}</td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class="text-white" href="{{route('edit.lecture', $lecture->id)}}">
                                edit
                            </a>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class="text-white" href="{{route('open.lecture', $lecture->id)}}">
                                open
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
