@extends('layouts.app')

@section('content')
    <h1> Contact </h1>
    <hr>
    <div class="row">

        <div class="col-md-6">
            <h3>We are a rescue home for unwanted pets!</h3>
            <p>We try and get all animals a home, please share us to your freinds! Lorem ipsum dolor sit amet consectetur adipiscing elit conubia pharetra, turpis vel proin venenatis sagittis rutrum sodales mus tristique, et neque vitae tempus nisi nascetur inceptos nam. Vivamus cursus sollicitudin at laoreet pulvinar morbi iaculis per, ultrices dictumst feugiat nulla aenean facilisis diam cras dui, eros aptent montes parturient luctus nascetur sodales. Porttitor hac at pellentesque ut lobortis parturient nunc litora, platea non congue quisque magnis inceptos.</p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h3>Phone Us</h3>
                    <h4>07919294953</h4>
                </div>
                <div class="col-md-6">
                    <h3>Email Us</h3>
                    <h4>contact@mail.com</h4>
                </div>
            </div>
            <div class="row" style="display:block">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
            </div>
        </div>
        <div class="col-md-6">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=aston%20university&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
        </div>


    </div>
@endsection
