@extends("layouts.layout")
@section("content")
   <div class ="col-md-12">
   <form action="post" action="{{ route("profile.update") }}">
    @csrf
   <input class="form-control" type="text" placeholder="Name" value="{{auth()->user()->name}}">
   <input class="form-control" type="email" placeholder="Email" value="{{auth()->user()->email}}">
   <input class="form-control" type="password" placeholder="Password">
    <button class="btn btn-success" type="submit">Save</button>
</form>
   </div>
@endsection
