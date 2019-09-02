@extends('layouts.layout')

@section('content')
    <section class="contact-section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Register To Application</h2>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="{{ url("/register") }}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control w-100" name="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control w-100" name="name" placeholder="Name">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" placeholder = "Enter your password">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="age" id="age" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Age'" placeholder = "Enter your Age">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="phone" id="phone" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Phone'" placeholder = "Enter your Phone">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <locations></locations>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
