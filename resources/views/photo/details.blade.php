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
              <a href="/gallery/show/{{$photo->gallery_id}}">Back To Gallery</a>
              <h1>{{$photo->title}}</h1>
              <p class="lead">{{$photo->description}}</p>
              <p>{{$photo->location}}</p>
            </div>
          </div>
          
          <div class="main">
            
            <img src="/images/{{$photo->image}}" style="display: block;height: 300px;width: 350px;margin: 0 auto; padding: 5px; background: #999">
            <p style="text-align: center;margin-top: 10px">

            <?php 
                      //Check logged id
              if (Auth::check()) { ?>
               <a  class="button" href="/photo/edit/{{$photo->id}}">Update Portfolio</a>

              <a onclick="return confirm('Are you sure to delete?');" class="alert button" href="/photo/destroy/{{$photo->id}}/{{$photo->gallery_id}}">Delete Portfolio</a>
            <?php  }?>
   
            </p>
          </div>



@stop