@extends('layouts.app')

@section('title')
Поиск по записям
@endsection

@section('content')
<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="row">
        <div class="col-3 mt-2 mb-4">

          <a role="button" class="btn btn-sm btn-block btn-outline-primary round-3" href="{{ url('/') }}">
            < На главную</a>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <form action="{{ route('find-vkr') }}" method="GET">
            <label for="">
              <h5>Введите название темы ВКР</h5>
            </label>
            <div class="row">
              <div class="col-10 form-group">
                <input type="text" class="form-control" name="query" placeholder="Введите название....." value="{{ request()->input('query') }}">
                <span class="text-danger">@error('query'){{ $message }} @enderror</span>
              </div>
              <div class="col-2 form-group ">
                <button type="submit" class="btn btn-primary"> Поиск </button>
              </div>
            </div>
          </form>
        </div>

        <div class="card-body">

          <h5>Результаты поиска</h5>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>№</th>
                  <th>Название</th>
                  <th class="dropdown-toggle">Год</th>
                  <th>Теги</th>
                </tr>
              </thead>
              <tbody>
                @if(count($vkrs) > 0)
                <?php $i = 0 ?>
                @foreach($vkrs as $vkr)
                <?php $i++ ?>
                <tr>
                  <td>{{$i}}</td>
                  <td><a href="{{ route('vkr-single', $vkr->id) }}">{{$vkr->title}}</a></td>
                  <td>{{$vkr->year}}</td>
                  <td>{{$vkr->tech}}</td>
                </tr>
                @endforeach
                @else

                <tr>
                  <td colspan="6">No result found!</td>
                </tr>
                @endif
              </tbody>
            </table>

          </div>
          <div class="d-flex justify-content-sm-center">
            {{ $vkrs->links("comp.customPages") }}
          </div>


        </div>
      </div>
    </div>
  </div>
</div>



@endsection
