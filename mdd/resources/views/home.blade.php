@extends('layouts.app')

@section('title', 'Главная страница')

@include('layouts.components.generate_account_menu')

@section('content')

    <div class="sixteen wide column">
        <div class="ui grid">
            @switch(\Illuminate\Support\Facades\Auth::user()->getIdAccountType())

                @case(\App\Core\Constants\ListAccountType::TEACHER)
                    @include('accounts.teacher.home')
                    @break
                @case(\App\Core\Constants\ListAccountType::METHODIST)
                    @include('accounts.methodist.home')
                    @break

            @endswitch
        </div>
    </div>

@endsection

