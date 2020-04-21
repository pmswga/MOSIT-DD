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
								<form class="ui form">
									<div class="field">
										<input type="file">
									</div>
									<div class="field">
										<input type="submit" class="ui primary fluid button" value="Загрузить">
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
						<legend><h3>Информация о преподавателе</h3></legend>
						<table class="ui celled table">
							<thead>
								<tr>
									<th>ФИО</th>
									<th>Должность</th>
									<th>Позиция</th>
									<th>Ставка</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Фролов Констанин Констанинович</td>
									<td>Профессор</td>
									<td>Внешний совместитель</td>
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
								</tr>
							</tbody>
						</table>
					</fieldset>
					<fieldset class="ui segment">
						<legend><h3>Список дисциплин за 1-й семестр</h3></legend>
						<table class="ui table">
							<thead>
								<tr>
									<th>№</th>
									<th>Наименование дисциплины</th>
								</tr>
							</thead>
							<tbody>
								@for ($i = 0; $i < 5; $i++)
								<tr>
									<td>{{ $i+1 }}</td>
									<td>
									</td>
								</tr>
								
								@endfor
								
							</tbody>
						</table>
					</fieldset>
					<fieldset class="ui segment">
						<legend><h3>Список дисциплин за 2-й семестр</h3></legend>
						<table class="ui table">
							<thead>
								<tr>
									<th>№</th>
									<th>Наименование дисциплины</th>
								</tr>
							</thead>
							<tbody>
								@for ($i = 0; $i < 5; $i++)
								<tr>
									<td>{{ $i+1 }}</td>
									<td>
									</td>
								</tr>
								
								@endfor
								
							</tbody>
						</table>
					</fieldset>
					<fieldset class="ui segment">
						<legend><h3>Учебно методическая работа</h3></legend>
						<table class="ui table">
							<thead>
								<tr>
									<th rowspan="2">№</th>
									<th rowspan="2">Наименование и вид работ</th>
									<th colspan="2">Трудоёмкость (час)</th>
									<th rowspan="2">Форма завершения работ</th>
									<th colspan="2">Срок выполнения (даты)</th>
								</tr>
								<tr>
									<th>Планируемая</th>
									<th>Фактическая</th>
									<th>Планируемая</th>
									<th>Фактическая</th>
								</tr>
							</thead>
							<tbody>
								@for ($i = 0; $i < 5; $i++)
								<tr>
									<td>{{ $i+1 }}</td>
									<td class="ui form">
										<div class="field">
											<select>
												<option>Работа А</option>
												<option>Работа Б</option>
												<option>Работа В</option>
											</select>
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="number">
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="number">
										</div>
									</td>
									<td class="ui form">
											<select>
												<option>Завершение работы А</option>
												<option>Завершение работы Б</option>
												<option>Завершение работы В</option>
											</select>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="date">
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="date">
										</div>
									</td>
								</tr>
								
								@endfor
								
							</tbody>
						</table>
					</fieldset>
					<fieldset class="ui segment">
						<legend><h3>Научно-исследовательская работа</h3></legend>
						<table class="ui table">
							<thead>
								<tr>
									<th rowspan="2">№</th>
									<th rowspan="2">Наименование и вид работ</th>
									<th colspan="2">Трудоёмкость (час)</th>
									<th colspan="2">Срок выполнения (даты)</th>
								</tr>
								<tr>
									<th>Планируемая</th>
									<th>Фактическая</th>
									<th>Планируемая</th>
									<th>Фактическая</th>
								</tr>
							</thead>
							<tbody>
								@for ($i = 0; $i < 5; $i++)
								<tr>
									<td>{{ $i+1 }}</td>
									<td class="ui form">
										<div class="field">
											<select>
												<option>Работа А</option>
												<option>Работа Б</option>
												<option>Работа В</option>
											</select>
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="number">
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="number">
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="date">
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="date">
										</div>
									</td>
								</tr>
								
								@endfor
								
							</tbody>
						</table>
					</fieldset>
					<fieldset class="ui segment">
						<legend><h3>Организационно-методическая и воспитательная работа</h3></legend>
						<table class="ui table">
							<thead>
								<tr>
									<th rowspan="2">№</th>
									<th rowspan="2">Наименование и вид работ</th>
									<th colspan="2">Трудоёмкость (час)</th>
									<th colspan="2">Срок выполнения (даты)</th>
								</tr>
								<tr>
									<th>Планируемая</th>
									<th>Фактическая</th>
									<th>Планируемая</th>
									<th>Фактическая</th>
								</tr>
							</thead>
							<tbody>
								@for ($i = 0; $i < 6; $i++)
								<tr>
									<td>{{ $i+1 }}</td>
									<td class="ui form">
										<div class="field">
											<select>
												<option>Работа А</option>
												<option>Работа Б</option>
												<option>Работа В</option>
											</select>
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="number">
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<input type="number">
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<select>
												<option>В течении года</option>
											</select>
										</div>
									</td>
									<td class="ui form">
										<div class="field">
											<select>
												<option>В течении года</option>
											</select>
										</div>
									</td>
								</tr>
								
								@endfor
								
							</tbody>
						</table>
					</fieldset>
					<fieldset class="ui segment">
						<legend><h3>Общая годовая нагрузка</h3></legend>
						<table class="ui table">
							<thead>
								<tr>
									<th>Виды работ</th>
									<th>Планируемая</th>
									<th>Фактическая</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Учебная работа</td>
									<td>220</td>
									<td></td>
								</tr>
								<tr>
									<td>Учебно методическая работа</td>
									<td>100,5</td>
									<td></td>
								</tr>
								<tr>
									<td>Научно-исследовательская работа</td>
									<td>25</td>
									<td></td>
								</tr>
								<tr>
									<td>Организационно-методическая и воспитательная работа</td>
									<td>22</td>
									<td></td>
								</tr>
								<tr>
									<td>Итого</td>
									<td>367.5</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</fieldset>
					<div class="field">
						<input type="button" class="ui primary button" value="Сохранить">
					</div>
				</div>
			</div>
		</div>
	</div>

	

@endsection