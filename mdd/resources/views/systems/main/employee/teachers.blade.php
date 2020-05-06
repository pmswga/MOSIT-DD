@extends('layouts.app')

@section('title') Преподаватели @endsection

@section('content')


	<div class="sixteen wide column">
		<div class="ui grid">
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
										<label>По институту</label>
										<select>
											<option>ИТ</option>
											<option>ИНТЕГУ</option>
											<option>Физтех</option>
											<option>ИК</option>
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
											<label>По ФИО (по убыванию)</label>
										</div>
									</div>
								</form>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="one wide column"></div>
				<div class="fourteen wide column">
					<fieldset class="ui segment">
						<legend><h3>Преподаватели</h3></legend>
						<table class="ui celled table">
							<col width="5%">
							<thead>
								<tr>
									<th>№</th>
									<th>ФИО</th>
									<th>Институт</th>
									<th>Кафедра</th>
									<th>Должность</th>
									<th>Ставка</th>
									<th>ТД</th>
									<th>Телефон</th>
									<th>Почта</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Заур Амурбиевич</td>
									<td>ИТ</td>
									<td>МОСИТ</td>
									<td>Профессор</td>
									<td>
										<table width="100%">
											<tbody>
												<tr>
													<td>Штатная</td>
												</tr>
												<tr>
													<td>1.0</td>
												</tr>
												<tr>
													<td>Внутренний совместитель</td>
												</tr>
												<tr>
													<td>0.5</td>
												</tr>
												<tr>
													<td>Внешний совместитель</td>
												</tr>
												<tr>
													<td>0.0</td>
												</tr>
											</tbody>
										</table>
									</td>
									<td>
										<table width="100%">
											<tbody>
												<tr>
													<td>Начало ТД</td>
												</tr>
												<tr>
													<td>01.01.1969</td>
												</tr>
												<tr>
													<td>Окончание ТД</td>
												</tr>
												<tr>
													<td>01.01.2024</td>
												</tr>
											</tbody>
										</table>
									</td>
									<td>+7 124 124 12-12</td>
									<td>teacher@mail.ru</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</div>
			</div>
		</div>
	</div>

	

@endsection
