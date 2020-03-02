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
									<div class="field">
										<label>По институту</label>
										<select>
											<option>ИТ</option>
											<option>ИНТЕГУ</option>
											<option>Физ</option>
										</select>
									</div>
								</form>
							</fieldset>
						</div>
						<div class="column">
							<fieldset class="ui segment">
								<legend><h3>Сортировка</h3></legend>
								<form class="ui form">
									<div class="field">
										<div class="ui checkbox">
											<input type="checkbox">
											<label>По преподавателю</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox">
											<input type="checkbox">
											<label>Заполненные ИП</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox">
											<input type="checkbox">
											<label>Незаполненные ИП</label>
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
													<td>1.0</td>
												</tr>
												<tr>
													<td>Штатная-совместителя</td>
													<td>0.5</td>
												</tr>
												<tr>
													<td>Внешняя-совместителя</td>
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
													<td>01.01.1969</td>
												</tr>
												<tr>
													<td>Окончание ТД</td>
													<td>01.01.2024</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Фролов Константин Константинович</td>
									<td>ИТ</td>
									<td>МОСИТ</td>
									<td>Профессор</td>
									<td>
										<table width="100%">
											<tbody>
												<tr>
													<td>Штатная</td>
													<td>1.0</td>
												</tr>
												<tr>
													<td>Штатная-совместителя</td>
													<td>0.5</td>
												</tr>
												<tr>
													<td>Внешняя-совместителя</td>
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
													<td>01.01.1969</td>
												</tr>
												<tr>
													<td>Окончание ТД</td>
													<td>01.01.2024</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Кораблин Юрий Прокофьевич</td>
									<td>ИТ</td>
									<td>МОСИТ</td>
									<td>Доцент</td>
									<td>
										<table width="100%">
											<tbody>
												<tr>
													<td>Штатная</td>
													<td>1.0</td>
												</tr>
												<tr>
													<td>Штатная-совместителя</td>
													<td>0.5</td>
												</tr>
												<tr>
													<td>Внешняя-совместителя</td>
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
													<td>01.01.1969</td>
												</tr>
												<tr>
													<td>Окончание ТД</td>
													<td>01.01.2024</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Берков Николай Андреевич</td>
									<td>ИТ</td>
									<td>МОСИТ</td>
									<td>Доцент</td>
									<td>
										<table width="100%">
											<tbody>
												<tr>
													<td>Штатная</td>
													<td>1.0</td>
												</tr>
												<tr>
													<td>Штатная-совместителя</td>
													<td>0.5</td>
												</tr>
												<tr>
													<td>Внешняя-совместителя</td>
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
													<td>01.01.1969</td>
												</tr>
												<tr>
													<td>Окончание ТД</td>
													<td>01.01.2024</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</div>
			</div>
		</div>
	</div>

	

@endsection