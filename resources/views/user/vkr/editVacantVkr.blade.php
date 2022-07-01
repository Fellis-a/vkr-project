@extends('layouts.app')

@section('title')
Редактирование информации предлагаемой ВКР
@endsection

@section('content')
<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="">
      <div class="col mt-2 text-left mb-3">
        <a role="button" class="btn btn-sm btn-outline-primary round-3" href="{{ url()->previous() }}">
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
          <h5>Редактирование предлагаемой ВКР</h5>
        </div>

        <div class="card-body">
          <form action="{{ route('vkr-vacant-update', $id) }}" method="post">
            @csrf

              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="title">Предлагаемая тема ВКР</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Введите предлагаемую тему ВКР..." value="{{$vkr->title}}" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="description">Описание</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{$vkr->description}}" placeholder="Описание темы..." required>

                </div>
              </div>

              <button class="btn btn-primary" type="submit">Обновить</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
