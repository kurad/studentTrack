 			@extends('layouts.app')
			@section('content')

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Register Project</h4>
                    <hr>
                    @if(Session::has('fail'))
                               <div class="alert alert-success">
                                   {{Session::get('success')}}
                               </div>
                              @endif
                    <form class="forms-sample" action="{{url('student/update_project/'.$projects->id)}}" method="POST">
                      @csrf
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Project Title</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" value="{{$projects->project_title}}" name="project_title" placeholder="Project Title">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Project Domain</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" value="{{$projects->domain}}" name="domain" placeholder="Project Domain(e.g. ICT)">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="problem_statement">Problem Statement</label>
                        <textarea class="form-control" id="problem_statement"  name="problem_statement" placeholder="Type problem statement">
                          {{$projects->problem_statement}}
                        </textarea>
                        
                      </div>

                      <div class="form-group">
                        <label for="suggested_solution">Suggested Solution</label>
                        <textarea class="form-control" id="suggested_solution"  name="suggested_solution" placeholder="Type Solution">
                          {{$projects->suggested_solution}}
                        </textarea>
                        
                      </div>
                      
                      <button type="submit" class="btn btn-primary me-2">Save</button>
                      <br><br>
                      
                    </form>
                  </div>
                </div>
              </div>
              <script src="{{asset('assets/js/tinymce/tinymce.min.js') }}"></script>
              <script>
               tinymce.init({
                 selector: '#suggested_solution', // Replace this CSS selector to match the placeholder element for TinyMCE
                 plugins: 'code table lists',
                 toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
            </script>
            <script>
               tinymce.init({
                 selector: 'textarea#problem_statement', // Replace this CSS selector to match the placeholder element for TinyMCE
                 plugins: 'code table lists',
                 toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
            </script>
          @endsection