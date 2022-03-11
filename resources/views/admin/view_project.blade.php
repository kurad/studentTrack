 			@extends('layouts.app')
			@section('content')
            
            <div class="row">
              <div class="col-md-12 grid-margin">
                
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
                      <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#staticBackdrop"><span class="mdi mdi-eye"></span> View members</a>

                      <a href="#" class="btn btn-outline-success"><span class="mdi mdi-eye"></span> View Materials</a>
                      <a href="/admin/projects" class="btn btn-outline-warning">Back</a>
                      </div>

                      <div>
                      
                    </div>
                    <br><br>
                    </div>
                    
                </div>
                
              </div>


            </div>
    
          @endsection

