@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-5">
                <img src="cal.png" width="500" height="300">
                <div class="card-body">
                    <a href="{{ route('calorie') }}" class="btn btn-secondary btn-lg btn-block">Calories</a>
                </div>
            </div>

            <div class="card mb-5" >
                <img src="bmi.jpg" width="500" height="300">
                <div class="card-body">
                    <a href="{{ route('weight') }}" class="btn btn-secondary btn-lg btn-block">Weight</a>
                </div>
            </div>  

            

            <div class="card mb-5" >
                <img src="water.png" width="500" height="300">
                <div class="card-body">
                    <a href="{{ route('water') }}" class="btn btn-secondary btn-lg btn-block">Water</a>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
