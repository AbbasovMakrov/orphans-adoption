@extends("layouts.layout")
@section("content")
    <div class="col-md-12">
        @foreach($adoptions as $adoption)
            <div class="card">
                <div class="card-header">
                    <div class="card-img">
                        <img src="{{asset("/storage/".$adoption->orphan->image)}}" class="card-img" style="width: 25%;height: 50%" alt="image {{$adoption->orphan->name}}">
                    </div>
                    <div class="card-body">
                        @if($adoption->orphan->deleted_at == null)
                            <p class="card-text">Name : <a href="{{route("orphan.show",['id' => $adoption->orphan->id])}}">{{$orphan->orphan->name}}</a></p>
                        @else
                            <p class="card-text">Name : {{$adoption->orphan->name}}</p>

                        @endif
                        <p class="card-text">Age : {{$adoption->orphan->age}}</p>
                        <p class="card-text">Location : {{$adoption->orphan->location}}</p>
                        @if($adoption->orphan->other_details != null)
                            <p class="card-text">Other Details : {{$adoption->orphan->other_details}}</p>
                        @endif
                        <p class="card-text">published By : {{$adoption->user->name}}</p>
                        @if(\Carbon\Carbon::now()->diff($adoption->created_at)->h == 1 )
                            <form method="post" action="{{ route("adoption.cancel",['adoptId' => $adoption->id]) }}">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger">Cancel Adoption</button>
                            </form>
                         @endif
                    </div>
                </div>
            </div>
        @endforeach
        {{$adoptions->links()}}
    </div>
@stop
