@if($errors->has($nameInput))
  <span id="helpBlock{{$nameInput}}" class="help-block">
    <ul>
      @foreach($errors->get($nameInput) as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </span>
@endif
