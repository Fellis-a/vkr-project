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
                    <form action="{{route('vkr-add-vacant')}}" method="post">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="title">Тема ВКР</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Введите тему ВКР..." required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="description">Описание темы ВКР</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Введите описание" required>
                            </div>
                        </div>



                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection