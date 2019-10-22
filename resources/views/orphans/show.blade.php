@extends("layouts.layout")
@section("content")
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-img">
                        <img src="{{asset("/storage/".$orphan->image)}}" class="card-img" style="width: 25%;height: 50%" alt="image {{$orphan->name}}">
                    </div>
                    <div class="card-body">
                        <p class="card-text">Name : {{$orphan->name}} </p>
                        <p class="card-text">Age : {{$orphan->age}}</p>
                        <p class="card-text">Location : {{$orphan->location}}</p>
                        @if($orphan->other_details != null)
                            <p class="card-text">Other Details : {{$orphan->other_details}}</p>
                        @endif
                        <p class="card-text">published By : {{$orphan->user->name}}</p>
                        @auth
                            @if(auth()->user()->id == $orphan->user_id)
                                <form action="{{route("orphan.destroy",['id' => $orphan->id])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <a class="btn btn-primary" href="{{route("orphan.edit",['id' => $orphan->id])}}">
                                        Edit
                                    </a>
                                </form>
                            @endif
                                <form method="post" action="{{route("adoption.adopt",['orphanId' => $orphan->id])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Adopt</button>
                                </form>

                        @endauth
                    </div>
                </div>
            </div>
    </div>
@stop
