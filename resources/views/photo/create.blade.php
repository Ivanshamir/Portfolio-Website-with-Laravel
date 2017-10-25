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

                  <li><a href="/logout">Logout</a></li>
                <?php } ?> 
              </ul>
            </div>
          </div>
              <h1>Upload Portfolio</h1>
              <p class="lead">Upload Portfolio Photo to make gallery</p>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="maindiv">
                {!! Form::open(array('action' => 'PhotoController@store', 'enctype' =>'multipart/form-data')) !!}
              
              {!! Form::label('title' , 'Title') !!}
              {!! Form::text('title' , $value = null , $attributes = ['placeholder' => 'Photo Title', 'name' => 'title' ,'required' => 'required']) !!}

               {!! Form::label('description' , 'Description') !!}
              {!! Form::text('description' , $value = null , $attributes = ['placeholder' => 'Photo Description', 'name' => 'description' ,'required' => 'required']) !!}

              {!! Form::label('location' , 'Location') !!}
              {!! Form::text('location' , $value = null , $attributes = ['placeholder' => 'Portfolio Location', 'name' => 'location' ,'required' => 'required']) !!}
              
              {!! Form::label('image', 'Portfolio Image') !!}
              {!! Form::file('image') !!}

              <input type="hidden" name="gallery_id" value="{{ $gallery_id }}">

              {!! Form::submit('Submit', $attributes = ['class' => 'button']) !!}
              
              {!! Form::close() !!}
            </div>

          </div>

@stop