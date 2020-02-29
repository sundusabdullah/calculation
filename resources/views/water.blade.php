
@extends('layouts.app')
@section('content')

<h1 class="pt-3 pb-3" style="text-align:center;">Water calculation</h1>

<div class="alert alert-primary" role="alert">
To get the correct result, must write the correct information
</div>

  @if(!empty($balance_sum_2))
      <div class="alert alert-success">
      <!-- The water you need it = {{ $balance_sum_2 }} CUP -->
      The water you need it = <label name="result" > {{ $balance_sum_2 }} </label>
      </div>
    @endif

    @if(!empty($balance_sum_3))
      <div class="alert alert-success">
        <!-- The water you need it =  {{ $balance_sum_3 }} CUP -->
        The water you need it = <label  name="result" > {{ $balance_sum_3 }} </label>
      </div>
    @endif

    @if(!empty($balance_sum_4))
      <div class="alert alert-success">
      <!-- The water you need it =  {{ $balance_sum_4 }} CUP -->
      The water you need it = <label name="result" >{{ $balance_sum_4 }} </label>
      </div>
    @endif
<form method="post" action="">
@csrf
  <div class="form-group">
    <label >Your weight </label>
    <input type="number" class="form-control" name="weight" >
  </div>
  <div class="form-group">
    <label >Your age</label>
    <input type="number" class="form-control" name="age">
  </div>
  <button name="calculate" class="btn btn-primary">Calculate</button>
</form>

<br><br><br><br>
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
            <td>{{ $users_report->water_result }}</td>
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
