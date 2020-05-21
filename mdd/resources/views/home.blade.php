@extends('layout.app')

@section('title', 'Главная страница')

@section('content')

    @switch(\Illuminate\Support\Facades\Auth::user()->getIdAccountType())
        @case(\App\Core\Constants\ListAccountType::TEACHER)
            @include('accounts.teacher.home')
        @break
        @case(\App\Core\Constants\ListAccountType::METHODIST)
            @include('accounts.methodist.home')
        @break
    @endswitch

@endsection

