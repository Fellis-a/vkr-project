@extends('layouts.app')

@section('title')
Просмотр информации о ВКР
@endsection

@section('content')

<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="col mt-2 text-left mb-3">
        <a role="button" class="btn btn-md btn-outline-primary round-3" href="{{ url('/') }}">
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
                <td style="width: 75%">{{$vkrs->title}}</td>
              </tr>
              <tr>
                <th scope="row" style="width: 25%">Научный руководитель</th>
                <td style="width: 75%">{{$vkrs->user->name}}</td>
              </tr>
              <tr>
                <th scope="row" style="width: 25%">Специальность</th>
                <td style="width: 75%">{{$vkrs->specialty->code}}</td>
              </tr>
              <tr>
                <th scope="row" style="width: 25%">Год защиты</th>
                <td style="width: 75%">{{$vkrs->year}}</td>
              </tr>
              <tr>
                <th scope="row" style="width: 25%">Оценка</th>
                <td style="width: 75%">{{$vkrs->mark}}</td>
              </tr>
              <tr>
                <th scope="row" style="width: 25%">Теги</th>
                <td style="width: 75%">{{$vkrs->tech}}</td>
              </tr>
              <tr>
                <th scope="row" style="width: 25%">Реферат</th>
                <td style="width: 75%">{{$vkrs->essay}}</td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>


@endsection