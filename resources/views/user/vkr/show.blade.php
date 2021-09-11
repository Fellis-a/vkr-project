@extends('layouts.app')

@section('title')
Просмотр информации о ВКР
@endsection

@section('content')

<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="col mt-2 text-left mb-3">
        <a role="button" class="btn btn-md btn-outline-primary round-3" href="{{ url('/home') }}">
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

      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="card-header">
          <h5 aria-disabled="true" class="m-3"><b>Карточка ВКР</b></h5>
        </div>

        <div class="card-body">
          <table class="table ">
            <tbody class="border-top-0">
              <tr class="table-borderless">
                <th scope="row" style="width: 25%">Тема ВКР</th>
                <td style="width: 75%">{{$vkr->title}}</td>

              </tr>
              <tr>
                <th scope="row">Специальность</th>
                <td>{{$vkr->specialty->code}}</td>
              </tr>
              <tr>
                <th scope="row">Год защиты</th>
                <td>{{$vkr->year}}</td>
              </tr>
              <tr>
                <th scope="row">Оценка</th>
                <td>{{$vkr->mark}}</td>
              </tr>
              <tr>
                <th scope="row">Теги</th>
                <td>{{$vkr->tech}}</td>
              </tr>
              <tr>
                <th scope="row">Реферат</th>
                <td>{{$vkr->essay}}</td>
              </tr>
            </tbody>
          </table>

          <a href="{{ route('vkr-edit', $vkr->id) }}" class="btn btn-sm btn-success  mb-4 mt-5">Редактировать</a>
          <button type="button" class="btn btn-sm  btn-danger ml-2 mb-4 mt-5" data-id="{{ $vkrId=$vkr->id }}" data-toggle="modal" data-target="#modal">Удалить</button>
        </div>
      </div>

      <!-- HTML-код модального окна-->
      <div id="modal" class="modal fade ">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Удаление записи</h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Вы уврены, что хотите удалить запись?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
              <a href="{{ route('vkr-delete', $vkrId) }}" class="btn btn-default btn-danger">Удалить</a>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>

@endsection