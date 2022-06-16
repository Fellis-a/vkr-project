@extends('layouts.app')

@section('content')
<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      @if(!empty(Session::get('success')))
      <div class="alert alert-success"> {{ Session::get('success') }}</div>
      @endif
      <div class="card">
        <div class="card-header">
          <h5>Предлагаемые темы ВКР от: {{ Auth::user()->name }}</h5>
        </div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <div class="row">
            <div class="col mt-2 mb-4">

              <a role="button" class="btn btn-sm btn-block btn-outline-primary round-3" href="{{ url('/') }}">
                < На главную</a>
            </div>
           

            <div class="col mt-2">

              <a role="button" class="btn btn-sm btn-block btn-primary round-3" class="text-my-own-color" href="{{ route('home')}}">Назад</a>

            </div>

              <div class="col mt-2">

              <a role="button" class="btn btn-sm btn-block btn-primary round-3" class="text-my-own-color" href="{{ route('vkr-create-vacant')}}">Предложить тему ВКР</a>

            </div>

          </div>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>№</th>
                  <th>Название</th>
                  <th>Описание</th>
             
                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                @if(count($vacant_vkrs) > 0)
                <?php $i = 0 ?>
                @foreach($vacant_vkrs as $vkr)
                <?php $i++ ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$vkr->title}}</td>
                  <td>{{$vkr->description}}</td>
                  <td class="pl-3"><a href="{{ route('vkr-vacant-edit', $vkr->id) }}" class="btn btn-sm btn-success ">Редактировать</a></td>
                  <td class="pl-2"><button type="button" class="btn btn-sm  btn-danger" data-id="{{ $vkrId=$vkr->id }}" data-toggle="modal" data-target="#modal">Удалить</button></td>

                </tr>
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
                        <a href="{{ route('vkr-vacant-delete', $vkrId) }}" class="btn btn-default btn-danger">Удалить</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @else

                  <td colspan="6">У вас пока нет записей! Нажмите "Предложить тему ВКР"</td>

                @endif
              </tbody>
            </table>
            @yield('formCont')


            @if(!empty(Session::get('error')))
            <div class="alert alert-danger"> {{ Session::get('error') }}</div>
            @endif
            <div class="d-flex justify-content-center">
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>

@endsection