 			@extends('layouts.app')
			@section('content')
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">My Projects</h4>
                    <a class="btn btn-success" href="{{route('student.create')}}"> Register New Project
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
            <div class="row">
            @foreach($projects as $project)
            <div class="col-md-6 grid-margin">    
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Registered Projects</h4>
                    <hr>
                        <h4 class="card-title">Project Title: {{$project->project_title}}</h4>
                        <p class="card-description"> Problem Statement: </p>
                        <p> {!! html_entity_decode($project->problem_statement) !!} </p>
                        <p class="card-description"> Proposed Solution: </p>
                        <p> {!! html_entity_decode($project->suggested_solution) !!} </p>

                        <a href="/student/view_project/{{$project->id}}" class="btn btn-primary">View Details</a>
                        <a href="#" class="btn btn-primary">Edit Project</a>
                        
                        <hr>
                      <a href="/student/projects/{{$project->id}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><span class="mdi mdi-plus"></span>Add Members</a>

                      <a href="/student/projects/{{$project->id}}" class="btn btn-success" data-toggle="modal" data-target="#materialModal"><span class="mdi mdi-plus"></span>Add Materials</a>
                      </div>
                      <div>
                    </div>
                    <br><br>
                    </div>                   
                </div>
              </div>            
@endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" action="{{route('members.store')}}" method="POST">
                      @csrf
                     <div class="form-group">
                      <label class="col-sm-3 col-form-label">Project Title</label>
                        <div class="col-sm-8">
                          @foreach($projects as $project)
                        <input type="hidden" name="id" value="{{$project->id}}">
                        <input type="text" class="form-control" value="{{$project->project_title}}" name="project_title" placeholder="Project Title">
                        @endforeach
                      </div>
                    </div>
                        
                            <div class="form-group">
                              <label>Select members you're working with</label>
                              <select class="form-control" style="width:80%" name="member">
                                <option>-- Select member --</option>
                               @foreach($members as $member)
                               <option value="{{$member->id}}">{{$member->first_name}} {{$member->last_name}}</option>
                               @endforeach
                              </select>
                            </div> <p class="card-description">The member should first sign up and complete her profile to be seen on the list</p>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button ttype="submit" class="btn btn-primary me-2">Save</button>
                            </div>
                    </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="materialModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" action="{{route('material.store')}}" method="POST">
                      @csrf
                     <div class="form-group">
                      <label class="col-sm-3 col-form-label">Project Title</label>
                        <div class="col-sm-8">
                          @foreach($projects as $project)
                        <input type="hidden" name="id" value="{{$project->id}}">
                        <input type="text" class="form-control" value="{{$project->project_title}}" name="project_title" placeholder="Project Title">
                        @endforeach
                      </div>
                    </div>
                        
                            <div class="form-group">
                              <label>Materials</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="material" placeholder="Material">
                            </div>
                          </div>

                             <div class="form-group">
                              <label>Description</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" name="description" placeholder="Description">
                            </div>
                            </div> 
                             <div class="form-group">
                              <label>Quantity</label>
                              <div class="col-sm-8">
                              <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                            </div>
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

<script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
@endsection


               
            