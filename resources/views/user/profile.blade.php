@extends('user.base')
@section('content')
<div class="inner-page-wrap  bg-light">
  <div class="container space-sm">
    <div class="row">
      <div class="col-md-8">
        <h4>Your Account</h4>
      </div>
      <div class="col-md-4">
        <p class="text-right"><a href="{{ url('/auth/logout') }}">Log Out</a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="col-md-12 col-md-offset-0 manage-address">
          <div class="col-md-12">
            <div class="signup-message">
              <div class="col-md-12">
                @if (Session::has('profile_updated'))
                <div class="alert alert-success">Your profile has been updated</div>
                @endif
                @if (Session::get('msg_source') == 'profile' && count($errors) > 0)
                <div class="alert alert-warning">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h4 class="form-title">Add an Address <i class="fa fa-pencil pull-right"></i></h4>
                <div class="form-body">
                  <form action="{{ url('/profile') }}" method="post" id="request-quote-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset class="row">
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="Full Name">Full Name</label>
                        <input type="name" name="name" id="name" class="form-control" value="{{ $user->name or '' }}" required>
                      </div>
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="Mobile Phone">Mobile Phone</label>
                        <input type="mobile" name="mobile" id="mobile" class="form-control" value="{{ $user->mobile or '' }}" required>
                      </div>
                      <div class="form-group col-md-12 has-icon-right">
                        <label for="Address">Address</label>
                        <textarea class="form-control" name="address" cols="40" rows="4" id="address" required>{{ $user->address or '' }}</textarea>
                      </div>
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="City">City</label>
                        <input type="city" name="city" id="city" placeholder="City" class="form-control" value="{{ $user->city or '' }}" required>
                      </div>
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="State">State</label>
                        <input type="state" name="state" id="state" placeholder="State" class="form-control" value="{{ $user->state or '' }}" required>
                      </div>
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="Country">Country</label>
                        <input type="country" name="country" id="country" placeholder="Country" class="form-control" value="{{ $user->country or '' }}" required>
                      </div>
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="Postal">Postal</label>
                        <input type="postal" name="pincode" id="postal" placeholder="Postal" class="form-control" value="{{ $user->pincode or '' }}" required>
                      </div>
                    </fieldset>
                    <footer>
                      <input class="btn btn-dark btn-fill pull-right" id="top" type="submit" value="Save">
                    </footer>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="col-md-12 col-md-offset-0 manage-address">
          <div class="col-md-12">
            <div class="signup-message">
              <div class="col-md-12">
                @if (session::has('password_updated'))
                <div class="alert alert-success">your password has been changed</div>
                @endif
                @if (Session::get('msg_source') == 'password' && count($errors) > 0)
                <div class="alert alert-warning">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h4 class="form-title">Change Password  <i class="fa fa-pencil pull-right"></i></h4>
                <div class="form-body">
                  <form action="{{ url('/change_password') }}" method="post" id="request-quote-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset class="row">
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="Current password">Current password</label>
                        <input type="password" name="old_password" id="password" class="form-control" required>
                      </div>
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="New password">New password</label>
                        <input type="password" name="password" id="password_confirmation" class="form-control" required>
                      </div>
                      <div class="form-group col-md-6 has-icon-right">
                        <label for="Retype New password">Retype New password</label>
                        <input type="password" name="password_confirmation" id="new_password" class="form-control" required>
                      </div>
                    </fieldset>
                    <footer>
                      <input class="btn btn-dark btn-fill pull-right" type="submit" value="Update">
                    </footer>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop  
