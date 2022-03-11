 			@extends('layouts.app')
			@section('content')
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Combinations</h4>
                    <a class="card-description btn btn-success" href="{{route('combinations')}}"> Add New
                    </a>
                    <br><br>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Combination</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        	@foreach($combinations as $comb)
                          <tr>
                            <td>{{$comb->id}}</td>
                            <td>{{$comb->combination}}</td>
                            <td><a href="" class="btn btn-primary">Edit</a></td>
                            
                          </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          @endsection