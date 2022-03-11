 			@extends('layouts.app')
			@section('content')
      
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add members to your Project</h4>
                    <hr>
                    @if(Session::has('fail'))
                               <div class="alert alert-success">
                                   {{Session::get('success')}}
                               </div>
                              @endif
                    <form class="forms-sample" action="{{route('save_member')}}" method="POST">
                      @csrf
                     <div class="form-group">
                      <label class="col-sm-3 col-form-label">Project Title</label>
                        <div class="col-sm-8">
                        <input type="hidden" name="id" value="{{$projects->id}}">
                        <input type="text" class="form-control" value="{{$projects->project_title}}" name="project_title" placeholder="Project Title">
                      </div>
                    </div>
                        
                            <div class="form-group">
                              <label>Select members you're working with</label>
                              <select class="form-control" style="width:80%" name="member">
                                <option></option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}} - {{$user->combination}}</option>
                                @endforeach
                              </select>
                            </div> <p class="card-description">The member should first sign up and complete her profile to be seen on the list</p>
                      <button type="submit" class="btn btn-primary me-2">Save</button>
                      <br><br>

                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Members on this project</h4>
                    <hr>
                    
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Member Name</th>
                            <th>Class</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($members as $member)
                          <tr>
                            <td>{{$member->first_name}} {{$member->last_name}}</td>
                            <td>{{$member->combination}}</td>
                            <td>
                              <a href="" class="btn btn-outline-primary"><span class="mdi mdi-pencil-box"></span></a>
                              <a href="" class="btn btn-outline-success"><span class="mdi mdi-delete"></span></a>
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
              
          @endsection