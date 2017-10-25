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
              <a href="/gallery/show/{{$photo->gallery_id}}">Back To Portfolio</a>
              <h1>Edit Portfolio</h1>
              <p class="lead">Update Portfolio Photo to make gallery</p>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="maindiv">
              {!! Form::open(array('action' => 'PhotoController@update', 'enctype' =>'multipart/form-data')) !!}

              <input type="hidden" name="id" value="{{ $photo->id }}">

              {!! Form::label('title' , 'Title') !!}
              {!! Form::text('title' , $value = $photo->title , $attributes = ['name' => 'title' ,'required' => 'required']) !!}

               {!! Form::label('description' , 'Description') !!}
              {!! Form::text('description' , $value = $photo->description , $attributes = ['name' => 'description' ,'required' => 'required']) !!}

              {!! Form::label('location' , 'Location') !!}
              {!! Form::text('location' , $value = $photo->location , $attributes = ['name' => 'location' ,'required' => 'required']) !!}

              <div style="width: 50%; float: left;">
              {!! Form::label('image', 'Portfolio Image') !!}
              {!! Form::file('image') !!}
              </div>

              <div style="width: 50%; float: right; ">
                <img style="height: 100px;width: 150px" src="/images/{{$photo->image}}">
              </div>

              <input type="hidden" name="gallery_id" value="{{ $photo->gallery_id }}">

              {!! Form::submit('Update', $attributes = ['class' => 'button']) !!}
              
              {!! Form::close() !!}
            </div>

          </div>

@stop