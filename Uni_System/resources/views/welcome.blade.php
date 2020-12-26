@extends("layout.layout")
@section("content")
<h1>Welcome</h1>
#name:<span class="text-primary">{{ Auth::user()->name}}</span>
#email: <span class="text-primary">{{ Auth::user()->email}}</span>
@endsection
