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
              <a href="/">Back To Portfolio</a>
              <h1>{{$gallery->name}}</h1>
              <p class="lead">{{$gallery->description}}</p>

                <?php  
                  //Check logged id
                  if (Auth::check()) { ?>
                      <a href="/photo/create/{{$gallery->id}}" class="button">Upload Portfolio</a>
                <?php } ?>
             
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
            <?php foreach($photo as $photos): ?>
            <div class="column">
            <a href="/photo/details/{{$photos->id}}">
              <img src="/images/{{ $photos->image }}" class="thumbnail" style="height: 180px;width: 200px">
            </a>
              <h5>{{$photos->title}}</h5>
              <p>{{$photos->description}}</p>
            </div>
          <?php endforeach; ?>
          </div>




@stop