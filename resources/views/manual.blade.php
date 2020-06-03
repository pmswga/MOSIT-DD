@extends('layout.app_default')
@section('title', 'Руководство пользователя')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>1) Начало</h3></legend>
        <p>Для того чтобы начать работу с системой необходимо убедиться, что для вас создана учётная запись.</p>
        <p>Обратитесь к администратору, чтобы получить почту и пароль для входа. Если у вас уже есть почта и пароль, то используйте форму входа, чтобы войти в систему </p>
    </fieldset>
    
    <fieldset class="ui segment">
        <legend><h3>2) Философия работы</h3></legend>
        
        
        <div class="ui vertical ordered fluid steps">
  <div class="step">
    <div class="content">
      <div class="title">Работа с файлами</div>
      <div class="description">
        Загружайте файлы и организуйте свой порядок. Помечайте файлы специальными метками для дальнейшей работы с ними в различных подсистемах.
      </div>
    </div>
  </div>
  <div class="step">
    <div class="content">
      <div class="title">Работа с подсистемами</div>
      <div class="description">
        Загруженные ранее файлы автоматически будут уже в подсистемах для работы с ними. После окончания работы всегда можно будет скачать их.
      </div>
    </div>
  </div>
  <div class="step">
    <div class="content">
      <div class="title">Не бойтесь поручений</div>
      <div class="description"></div>
    </div>
  </div>
</div>
        
    </fieldset>

@endsection
