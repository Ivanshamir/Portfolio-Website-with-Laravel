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
              <h1>Portfolio Gallery</h1>
              <p class="lead">Please Click My Portfolio Cover Image to see my Portfolio Details</p>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
          <?php foreach($galleries as $gallery): ?>
            <div class="column">
            <a href="/gallery/show/{{ $gallery->id }}">
              <img class="thumbnail" style="height: 180px" src="/images/{{ $gallery->cover_image }}">
            </a>
              <h5>{{ $gallery->name }}</h5>
              <p>{{ $gallery->description }}</p>
            </div>
          <?php endforeach; ?>
          </div>




@stop