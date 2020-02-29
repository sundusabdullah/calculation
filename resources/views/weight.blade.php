

@extends('layouts.app')
@section('content')

<h1 class="pt-3 pb-3" style="text-align:center;">BMI calculation</h1>

<div class="alert alert-primary" role="alert">
To get the correct result, must write the correct information
</div>


  @if(!empty($bmi))
    <div class="alert alert-success">
      Your BMI is: {{ $bmi }}
    </div>
  @endif


  <form method="post">
  @csrf
    <div class="form-group">
      <label >Your weight </label>
      <input type="number" class="form-control" name="weight">
    </div>

    <div class="form-group">
      <label >Your height</label>
      <input type="number" class="form-control" name="height">
    </div>

    <button name="calculate" class="btn btn-primary">Calculate</button>
  </form>
  <br><br><br>
  @if(!empty($users_report))

  <h2> Report on your results </h2>
  <br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Result</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    @foreach($users_report as $users_report)
        <tbody>
          <tr>
            <td>{{ $users_report->weight_result }}</td>
            <td>{{ $users_report->laset_result }}</td>
          </tr>
        </tbody>
      
    @endforeach
@endif

</table>
@endsection
@section('footer')
    @include('footer')
@endsection