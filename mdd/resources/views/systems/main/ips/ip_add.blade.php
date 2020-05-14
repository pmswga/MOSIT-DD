@extends('layouts.app')

@section('title') Добавление нового ИП @endsection

@include('layouts.components.generate_account_menu')

@section('content')

	<div class="sixteen wide column">
		<div class="ui grid">
			<div class="row">
				<div class="one wide column"></div>
				<div class="fourteen wide column">
                    @if(\Illuminate\Support\Facades\Session::has('message'))
                        <div class="ui icon success message">
                            <i class="check icon"></i>
                            <div class="content">
                                <div class="header">
                                    {{ \Illuminate\Support\Facades\Session::get('message') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <form class="ui form" method="POST" action="{{ route('ips.store') }}" enctype="multipart/form-data">
                        @csrf

                        <fieldset class="ui segment">
                                <div class="field">
                                    <input type="file" name="file">
                                </div>
                                <div class="field">
                                    <input type="submit" class="ui primary fluid button" value="Загрузить">
                                </div>
                        </fieldset>
                    </form>
				</div>
			</div>
		</div>
	</div>



@endsection
