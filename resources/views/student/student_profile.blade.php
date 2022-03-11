         @extends('layouts.app')
			@section('content')
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Complete your Profile</h4>
                    <form class="form-sample" action="{{route('save_profile')}}" method="POST">
                    	@csrf
                      <p class="card-description"> Personal info </p>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            	
                              <input type="text" name="email" class="form-control" value="{{$users}}" />
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
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Combination</label>
                            <div class="col-sm-9">
                              <select name="combination_id" class="form-control">
                                <option>Select combiantion</option>
                                @foreach($combinations as $comb)
                                <option value="{{$comb->id}}">{{$comb->combination}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">School Year</label>
                            <div class="col-sm-9">
                              <select name="school_year_id" class="form-control">
                                <option>Select School year</option>
                                @foreach($school_year as $sy)
                                <option value="{{$sy->id}}">{{$sy->school_year}}</option>
                                @endforeach
                              </select>
                            </div>
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endsection