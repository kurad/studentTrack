 			@extends('layouts.app')
			@section('content')
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Combination</h4>
                    <form class="forms-sample" action="{{route('save_combination')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Combination</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="combination" placeholder="e.g: S4 MPC">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <br><br>
                      <br>
                      <br>
                      <br>
                      <br><br><br><br>
                    </form>
                  </div>
                </div>
              </div>
              
          @endsection