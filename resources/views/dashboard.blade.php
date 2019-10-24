@extends("layouts.layout")
@section("content")
    <div class="col-md-12">
        @foreach($orphans as $orphan)
            <div class="card">
                <div class="card-header">
                    <div class="card-img">
                        <img src="{{asset("/storage/".$orphan->image)}}" class="card-img" style="width: 25%;height: 50%" alt="image {{$orphan->name}}">
                    </div>
                    <div class="card-body">
                        @if($orphan->deleted_at == null)
                            <p class="card-text">Name : <a href="{{route("orphan.show",['id' => $orphan->id])}}">{{$orphan->name}}</a></p>
                        @else
                            <p class="card-text">Name : {{$orphan->name}}</p>

                        @endif
                        <p class="card-text">Age : {{$orphan->age}}</p>
                        <p class="card-text">Location : {{$orphan->location}}</p>
                        @if($orphan->other_details != null)
                            <p class="card-text">Other Details : {{$orphan->other_details}}</p>
                        @endif
                        <p class="card-text">published By : {{$orphan->user->name}}</p>
                        @auth

                            @if($orphan->deleted_at == null)
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
                            @else
                                @if(\App\Adoption::where("orphan_id",$orphan->id)->first() == null)
                                    <form  action="{{route("orphan.restore",['id' => $orphan->id])}}" method="post">
                                        @csrf
                                        @method("options")
                                        <button class="btn btn-success" type="submit">Restore</button>
                                    </form>
                                @endif
                            @endif
                        @endauth



                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
