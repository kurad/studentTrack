 			@extends('layouts.app')
			@section('content')
            
            <div class="row">
            
            <div class="col-md-12 grid-margin">    
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Registered Projects</h4>
                    <hr>
                        

                      <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width:1%;">#</th>
                            <th style="width:10%;">Names</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="width:7%;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td></td>
                            <td>{{$user->email}}</td>
                            @if($user->role_id==1)
                            <td>Admin</td>
                            @endif
                            @if($user->role_id==2)
                            <td>Teacher</td>
                            @endif
                            @if($user->role_id==3)
                            <td>Student</td>
                            @endif
                                                        
                            <td>
                              <a href="" class="btn btn-outline-primary"><span class="mdi mdi-eye"></span> View</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                      </div>
                      <div>
                    </div>
                    <br><br>
                    </div>                   
                </div>
              </div>            
</div>
@endsection


               
            