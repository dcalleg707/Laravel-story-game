<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>beggining</title>
      <link rel="stylesheet" href="{{mix('css/app.css')}}">
  </head>
  <body style="background-image: URL(<?php echo asset('storage/'.$info['image']); ?>);">

    <a class="logout" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <br>
    <p class="change" style="display:inline;">Deaths: {{$Deaths}}</p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @if(isset($item)){
      <div class="item">
        <p>You got a new item: "'{{$item['name']}}'"</p>
        <ul>
          <li>{{$item['description']}}</li>
        </ul>
      </div>
    @endif
     @if(isset($info['enemy'])){
       <img class="enemy" src="<?php echo asset('storage/'.$info['enemy']); ?>" alt="">
     @endif
     @if(isset($info['music'])){
       <audio autoplay loop>
         <source src="<?php echo asset('storage/'.$info['music']); ?>" type="audio/mpeg">
       </audio>
     @endif
     @if(isset($info['video'])){
       <video autoplay  loop id="myVideo">
         <source src="<?php echo asset('storage/'.$info['video']); ?>" type="video/mp4">
      </video>
     @endif

    <div class="elections">
      <p><?php echo $info['description']; ?></p>
      @foreach($info['answers'] as $answer)
        <a class="highlight"href="http://game.test/game/{{$answer[0]}}">{{$answer[1]}}</a>
      @endforeach
    </div>
  </body>
</html>
