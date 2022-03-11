          @extends('layouts.app')
      @section('content')
      <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">My Projects</h4>
                    <a class="btn btn-success" href="{{route('create_user')}}" data-toggle="modal" data-target="#userModal"> Register New User
                    </a>
                    <br><br>
                    @if(Session::has('success'))
                     <div class="alert alert-success">
                         {{Session::get('success')}}
                     </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
      <div class="tile mb-4">
        <div class="row" style="margin-bottom: 2rem;">
          <div class="col-lg-12">
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Students</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Teachers</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#admin">Admin</a></li>
                
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home">
                  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
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
                          @foreach($students as $student)
                          <tr>
                            <td>{{$student->id}}</td>
                            <td></td>
                            <td>{{$student->email}}</td>
                            @if($student->role_id==1)
                            <td>Admin</td>
                            @endif
                            @if($student->role_id==2)
                            <td>Teacher</td>
                            @endif
                            @if($student->role_id==3)
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
            </div>
          </div>
                </div>
                <div class="tab-pane fade" id="profile">
                  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
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
                          @foreach($teachers as $teacher)
                          <tr>
                            <td>{{$teacher->id}}</td>
                            <td></td>
                            <td>{{$teacher->email}}</td>
                            @if($teacher->role_id==1)
                            <td>Admin</td>
                            @endif
                            @if($teacher->role_id==2)
                            <td>Teacher</td>
                            @endif
                            @if($teacher->role_id==3)
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
            </div>
          </div>
                </div>

          <div class="tab-pane fade" id="admin">
                  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
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
                          @foreach($admins as $admin)
                          <tr>
                            <td>{{$admin->id}}</td>
                            <td></td>
                            <td>{{$admin->email}}</td>
                            @if($admin->role_id==1)
                            <td>Admin</td>
                            @endif
                            @if($admin->role_id==2)
                            <td>Teacher</td>
                            @endif
                            @if($admin->role_id==3)
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
            </div>
          </div>
                </div>
                
              </div>
            </div>
          </div>

        </div>
      </div>


      <!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" action="{{route('store_user')}}" method="POST">
          @csrf
            <div class="form-group">
                 <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
            </div>
            <div class="form-group">
                 <select class="form-control form-control-lg" name="role_id">
                   <option>--Choose Role --</option>
                   <option value="1">Admin</option>
                   <option value="2">Teacher</option>
                 </select>
            </div>
            <div class="form-group">
                 <input type="password" class="form-control form-control-lg" placeholder="Password">
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button ttype="submit" class="btn btn-primary me-2">Save</button>
          </div>
                    </form>
      </div>
    </div>
  </div>
</div>
      @endsection