@extends('layout.app_admin')
@section('title', 'Пользователи')

@section('content')

    <fieldset class="ui segment">
        <legend><h3>Все пользователи</h3></legend>
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Email</th>
                    <th>Тип аккаунта</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $account->getEmail() }}</td>
                        <td>{{ $account->getAccountType() }}</td>
                        <td>{{ $account->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>

@endsection
