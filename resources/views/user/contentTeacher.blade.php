@section('content')

<div class="container mt-1">
  @include('comp.messages')
  <div class="row">
    <div class="col-8">
      <h1>Мои ВКР: {{ Auth::user()->name }}</h1>
    </div>
    <div class="col-4">

    </div>
  </div>
  <div class="row">
    <div class="col-2 mt-4">

      <button type="button" class="btn btn-lg btn-block btn-outline-primary round-3" action="{{ url('/') }}">< На главную</button>
    </div>
    <div class="col-5 mt-4"></div>

    <div class="col-2 mt-4">

      <button type="button" class="btn btn-lg btn-block btn-primary round-3"><a
        href="{{route('vkr-create')}}">+ Добавить ВКР</a></button>
    </div>
    <div class="col-3 mt-4">

      <button type="button" class="btn btn-lg btn-block btn-dark">Импорт из файла</button>
    </div>


  </div>

  <div class="row mt-5 mb-5">
    <div class="col mt-5">
      <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>№</th>
                  <th>Название</th>
                  <th class="dropdown-toggle">Специальность</th>
                  <th class="dropdown-toggle">Год</th>
                  <th></th>

                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>

    </div>
  </div>
</div>
@endsection
