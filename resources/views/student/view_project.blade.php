 			@extends('layouts.app')
			@section('content')

      <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Project: {{$projects->project_title}}</h4>
                    
                    
                  </div>
                </div>
              </div>
            </div>
      <div class="tile mb-4">
        <div class="row" style="margin-bottom: 2rem;">
          <div class="col-lg-12">
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Project Details</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#members">Members</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#materials">Materials</a></li>
                
              </ul>
          <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade active show" id="home">
            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <div class="col-md-12 grid-margin">
                
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">

                        <p class="card-description"> <b>Problem Statement:</b> </p>
                        <p> {!! html_entity_decode($projects->problem_statement) !!} </p>


                        <p class="card-description"> <b>Proposed Solution:</b> </p>
                        <p> {!! html_entity_decode($projects->suggested_solution) !!} </p>

                        <p class="card-description"> <b>Project Domain:</b> </p>
                        <p> {{$projects->domain }} </p>

                        <a href="{{ route('delete', $projects->id) }}" class="btn btn-danger" data-toggle="modal" id="smallButton" data-target="#smallModal"><span class="mdi mdi-delete">Delete Project</span></a>
                        
                        <a href="/student/projects" class="btn btn-warning"><span class="mdi mdi-delete">Back</span></a>
                      </div>

                      <div>
                      
                    </div>
                    </div>
                    
                </div>
                
              </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="tab-pane fade" id="members">
            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Member Name</th>
                        <th>Member Email</th>
                        <th>Class</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($members as $row)
                        <tr>
                          <td>{{$row->first_name}} {{$row->last_name}}</td>
                          <td>{{$row->email}}</td>
                          <td>{{$row->class}}</td>
                          <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="materials">
            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Material</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($materials as $material)
                        <tr>
                          <td>{{$material->material}}</td>
                          <td>{{$material->description}}</td>
                          <td>{{$material->quantity}}</td>
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


<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <form action="/student/delete/{{$projects->id}}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <h5 class="text-center">Are you sure you want to delete {{ $projects->project_title }} ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
                </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>
    
          @endsection

