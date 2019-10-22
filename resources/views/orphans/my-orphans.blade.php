@extends("layouts.guestLayout")
@section("content")
    @if(!empty($orphans))
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div id="hot-post" class="row hot-post">
                <div class="col-md-8 hot-post-left">
                    <div class="section-title">
                        <h2 class="title">Orphans</h2>
                    </div>
                    <!-- post -->
                    @foreach($orphans as $random)
                        <div class="post post-thumb">
                            <a class="post-img" href="{{route("orphan.show",['id' => $random->id])}}"><img
                                    src="{{asset("storage/{$random->image}")}}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title title-lg"><a
                                        href="{{route("orphan.show",['id' => $random->id])}}">{{$random->name}}</a></h3>
                                <ul class="post-meta">
                                    <li>Created : {{$random->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                @endforeach
                <!-- /post -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
        @else
        <p>No Data</p>
    @endif
@endsection
