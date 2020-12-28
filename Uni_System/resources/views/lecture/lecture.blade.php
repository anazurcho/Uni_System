@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        <p>
            {{$lecture->name}}
        </p>
        <p>
            {{$lecture->course->name}}
        </p>
        <p>
            {{$lecture->lecturer->name}}
        </p>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">lecture</th>
                <th scope="col">day</th>
                <th scope="col">time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lecture->schedules as $schedule)
                <tr>
                    <th scope="row">{{$schedule->id}}</th>
                    <td>{{$schedule->lecture->name}}</td>
                    <td>{{$schedule->day}}</td>
                    <td>{{$schedule->time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card mb-3 marg-4 " style="max-width: 18rem;">
            <form method="post" enctype="multipart/form-data" action="{{route('save.schedule')}}">
                <div class="box-body">
                    <div class="form-group marg-4">
                        <div>
                            <label for="lecture_id">lecture</label>
                            <select name="lecture_id">
                                    <option value="{{ $schedule->lecture->id }}">{{ $schedule->lecture->name }}</option>
                            </select>
                        </div>
                        <div  class="marg-4" >
                            <lable for="name">day</lable>
                            <select name="name">
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                        <div  class="marg-4" >
                            <label for="time">time</label>
                            <input type="text" class="form-control  col-md-10 @error('time') is-invalid @enderror" placeholder="time"
                                   name="time"/>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <p></p>
            </form>
        </div>


    </div>
@endsection
