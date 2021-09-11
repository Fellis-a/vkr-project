@section('searcher')

<div>
    <div class="mx-auto pull-right">
        <div class="">
            <form action="{{ route('search') }}" method="GET">

                <div class="form-group">
                    <label for="">Введите название темы ВКР</label>
                    <input type="text" class="form-control" name="query" placeholder="Поиск....." value="{{ request()->input('query') }}">
                    <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Поиск</button>
                </div>
            </form>
        </div>
    </div>
</div>