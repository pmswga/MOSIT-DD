@extends('layouts.app')

@section('title', 'Индивидуальные планы')

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
                </div>
            </div>
            <!--
			<div class="row">
				<div class="one wide column"></div>
				<div class="fourteen wide column">
					<div class="ui equal width grid">
						<div class="column">
							<fieldset class="ui segment">
								<legend><h3>Фильтр</h3></legend>
								<form class="ui form">
									<div class="three fields">
										<div class="field">
											<select>
												<option>По ФИО</option>
												<option></option>
											</select>
										</div>
										<div class="field">
											<input type="text" placeholder="Введите данные для поиска">
										</div>
										<div class="field">
											<input type="button" class="ui fluid primary button" value="Найти">
										</div>
									</div>
									<div class="field">
										<label>По учебном году</label>
										<select>
											<option>2019/2020</option>
											<option>2018/2019</option>
											<option>2017/2018</option>
											<option>2016/2017</option>
											<option>2015/2016</option>
											<option>2014/2015</option>
										</select>
									</div>
									<div class="field">
										<label>По статусу ИП</label>
										<select>
											<option>Заполненные</option>
											<option>Незаполненные</option>
										</select>
									</div>
								</form>
							</fieldset>
						</div>
						<div class="four wide column">
							<fieldset class="ui segment">
								<legend><h3>Сортировка</h3></legend>
								<form class="ui form">
									<div class="field">
										<div class="ui checkbox">
											<input type="checkbox">
											<label>По преподавателю (по убыванию)</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox">
											<input type="checkbox">
											<label>По учебному году</label>
										</div>
									</div>
								</form>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
            -->
			<div class="row">
				<div class="one wide column"></div>
				<div class="fourteen wide column">
					<fieldset class="ui segment">
						<legend><h3>Индивидуальные планы</h3></legend>
                        <a class="ui primary fluid button" href="{{ route('ips.create') }}">Добавить</a>
                        @empty($ips)
                            <div class="ui icon message">
                                <i class="info icon"></i>
                                <div class="content">
                                    <div class="header">

                                    </div>
                                    <p>ИП не добавлены</p>
                                </div>
                            </div>
                        @else
                            <table class="ui celled table">
                                <col width="5%">
                                <col width="60%">
                                <col width="20%">
                                <col width="10%">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>№</th>
                                        <th>Преподаватель</th>
                                        <th>Учебный год</th>
                                        <th colspan="2">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ips as $ip)
                                        <tr>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $ip->getTeacherInitials() }}</td>
                                            <td>
                                                {{ $ip->educationYear }}
                                            </td>
                                            <td colspan="2" style="text-align: center">
                                                <div class="ui  basic icon buttons">
                                                    <a class="ui button">
                                                        <i style="color: rgb(31, 114, 70);" class="ui icon file excel"></i>
                                                        Скачать
                                                    </a>
                                                    <a class="ui button" href="{{ route('ips.edit', $ip) }}">
                                                        <i class="orange edit icon"></i>
                                                    </a>
                                                    <form method="POST" style="margin: 0px; padding: 0px;" action="{{ route('ips.destroy', $ip) }}" onsubmit="return confirm('Удалить?')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="hidden" name="idIP" value="{{ $ip->idIP }}">
                                                        <button type="submit"  class="ui button">
                                                            <i class="red trash icon"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endempty
					</fieldset>
				</div>
			</div>
		</div>
	</div>
@endsection
