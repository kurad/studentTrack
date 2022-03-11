      <div class="tile mb-4">
        <div class="row" style="margin-bottom: 2rem;">
          <div class="col-lg-12">
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">My Projects</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Projects I belong to</a></li>
                
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home">
                  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                        <th class="ml-5">ID</th>
                        <th>Project Title</th>
                        <th>Problem Statement</th>
                        <th>Suggested Solution</th>
                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($projects as $project)
                      <tr>
                        <td>#{{$project->id}}</td>
                        <td>{{$project->project_title}}</td>
                        <td>{!! html_entity_decode($project->problem_statement) !!}</td>
                        <td>{!! html_entity_decode($project->suggested_solution) !!}</td>
                        
                        <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              
                              <i class="typcn typcn-eye btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              
                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                              
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button>
                          </div>
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
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                        <th class="ml-5">ID</th>
                        <th>Project Title</th>
                        <th>Problem Statement</th>
                        <th>Suggested Solution</th>
                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($projects1 as $project)
                      <tr>
                        <td>#{{$project->id}}</td>
                        <td>{{$project->project_title}}</td>
                        <td>{!! html_entity_decode($project->problem_statement) !!}</td>
                        <td>{!! html_entity_decode($project->suggested_solution) !!}</td>
                        
                        <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              
                              <i class="typcn typcn-eye btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              
                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                              
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button>
                          </div>
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