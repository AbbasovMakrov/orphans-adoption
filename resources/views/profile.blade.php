@extends("layouts.layout")
@section("content")
   <div class ="col-md-12">
   <form method="post" action="{{ route ("profile.update") }}">
    @csrf
   <input class="form-control" name="name" type="text" placeholder="Name" value="{{auth()->user()->name}}">
   <input class="form-control" name="email" type="email" placeholder="Email" value="{{auth()->user()->email}}">
   <input class="form-control" name="password" type="password" placeholder="Password">
    <locations></locations>
       <input type="number" name="age" value="{{auth()->user()->age}}" placeholder="Phone" class="form-control" >
       <input type="number" name="phone" class="form-control" value="{{auth()->user()->phone}}" placeholder="Phone">
       <button class="btn btn-success" type="submit">Save</button>
</form>
   </div>
@endsection
