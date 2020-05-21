@extends('layout.app')
@section('title', 'Просмотр пользователей')
@section('homeLink', route('admin.index'))

@include('layout.admin_menu')

@section('content')

    <div class="centered fourteen wide column">
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Email</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $account->getEmail() }}</td>
                        <td>{{ $account->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
