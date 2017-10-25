@extends('layouts/main')
@section('content')

          <div class="callout primary">
            <div class="row column">
            <div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
              <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
              <div class="title-bar-title">Menu</div>
          </div>

          <div class="top-bar" id="responsive-menu" style="background: #DEF0FC">
            <div class="top-bar-left">
              <ul class="dropdown menu" data-dropdown-menu style="background: #DEF0FC">
                <li class="menu-text"><a href="/">Home</a></li>
                <?php if (!Auth::check()) { ?>   
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                  <?php } ?> 

                <?php if (Auth::check()) { ?> 
                  <li><a href="/gallery/create">Create Gallery</a></li>
                <?php } ?> 
              </ul>
            </div>
          </div>
              <h1>User Register</h1>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="maindiv">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

          </div>

@stop