 			@extends('layouts.app')
			@section('content')
            
            <div class="row">
              <div class="col-md-6 grid-margin">
                
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Add members to your Project</h4>
                    <hr>
                        <h4 class="card-title">Project Title: {{$projects->project_title}}</h4>
                        <p class="card-description"> Problem Statement: </p>
                        <p> {!! html_entity_decode($projects->problem_statement) !!} </p>


                        <p class="card-description"> Proposed Solution: </p>
                        <p> {!! html_entity_decode($projects->suggested_solution) !!} </p>
                        <hr>
                      <a href="/student/add_member/{{$projects->id}}" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="mdi mdi-plus"></span>Add members</a>

                      <a href="/student/add_member/{{$projects->id}}" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="mdi mdi-plus"></span>Add Materials</a>
                      </div>

                      <div>
                      
                    </div>
                    <br><br>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add members to your project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button ttype="submit" class="btn btn-primary me-2">Save</button>
                            </div>
          

                    </form>
      </div>
      
    </div>
  </div>
</div>
    
          @endsection

