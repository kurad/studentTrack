 			@extends('layouts.app')
			@section('content')
            
            <div class="row">
            
            <div class="col-md-12 grid-margin">    
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Registered Projects</h4>
                        <div class="d-flex justify-content-end mb-4">
                      <a class="btn btn-primary" href="{{ URL::to('/admin/projects/pdf') }}">Export to PDF</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width:1%;">#</th>
                            <th style="width:10%;">Project Title</th>
                            <th>Problem Statement</th>
                            <th>Proposed Solution</th>
                            <th style="width:10%;">Registered by</th>
                            <th style="width:7%;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($projects as $project)
                          <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->project_title}}</td>
                            <td>{!! html_entity_decode($project->problem_statement) !!}</td>
                            <td>{!! html_entity_decode($project->suggested_solution)  !!}</td>
                            <td>{{$project->first_name}} {{substr($project->last_name,0,1)}}</td>
                            
                            <td>
                              <a href="/admin/projects/{{$project->id}}" class="btn btn-outline-primary"><span class="mdi mdi-eye"></span> View</a>
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


               
            