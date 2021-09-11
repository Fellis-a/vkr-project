@extends('layouts.app')

@section('title')
Режим добавления записи
@endsection

@section('content')

<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="col mt-2 text-left mb-3">
        <a role="button" class="btn btn-sm btn-outline-primary round-3" href="{{ url('/home') }}">
          < Назад</a>
      </div>
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>
            {{$error}}
          </li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h5>Добавление ВКР</h5>
        </div>

        <div class="card-body">
          <form action="{{route('vkr-addForm')}}" method="post">
            @csrf



            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="title">Тема ВКР</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Введите тему ВКР..." required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-3 mb-3">
                  <div class="form-group">
                    <label for="specialty">Специальность</label>
                    <select class="form-control" id="specialty" name="specialty_id">
                      <option selected>-Выбрать код-</option>
                      @foreach ($specialty as $option)
                      <option value="{{$option->id}}">{{ $option->code }} - {{ $option->title }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <div class="form-group">
                    <label for="year">Год защиты</label>
                    <select class="form-control" name="year">
                      <option selected>-Выбрать год-</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                    </select>
                  </div>
                  <!--<input type="text" class="form-control" id="validationCustomUsername" placeholder="Имя пользователя" aria-describedby="inputGroupPrepend" required>-->
                  <div class="invalid-feedback">
                    Please choose a username.
                  </div>
                </div>



                <div class="col-md-3 mb-3">
                  <div class="form-group">
                    <label for="mark">Оценка</label>
                    <select class="form-control" id="mark" name="mark">
                      <option selected>-Выбрать год-</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="tech">Технологии</label>
                  <input type="text" class="form-control" id="technology" name="tech" placeholder="ИИ, машинное обучение, UI..." required>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="essay">Реферат</label>
                  <textarea class="form-control" id="essay" name="essay" placeholder="Введите текст реферата..." rows="3"></textarea>
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Сохранить</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>

</form>


@endsection