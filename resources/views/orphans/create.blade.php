@extends('layouts.layout')

@section('content')
    <section class="contact-section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Add a Orphan</h2>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="{{ route("orphan.store") }}" method="post" id="contactForm" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control w-100" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                   <input type="number" class="form-control w-100" name="age" placeholder="Age">
                               </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <locations></locations>
                                </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                   <textarea class="form-control w-100" name="other_details" placeholder="Other Details"></textarea>
                               </div>
                            </div>


                        </div>
                        <div class="form-group mt-3">
                            <input type="file"  name="image">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

