         @extends('layouts.app')
			@section('content')
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Complete your Profile</h4>
                    <form class="form-sample" action="{{route('admins.store')}}" method="POST">
                    	@csrf
                      <p class="card-description"> Personal info </p>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            	
                              <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                              
                              <select class="form-control" name="department">
                                <option>--- Select Department---</option>
                                <option>Bio - Chem</option>
                                <option>Math - Physics</option>
                                <option>ICT</option>
                                <option>Social - Arts</option>
                                <option>Languages</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="first_name" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="last_name" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endsection