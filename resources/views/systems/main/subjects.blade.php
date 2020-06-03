@extends('layout.app_default')

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
										<label>По учебному году</label>

										<select>
											<option>2019/2020</option>
											<option>2018/2019</option>
											<option>2017/2018</option>
											<option>2016/2017</option>
											<option>2015/2016</option>
											<option>2014/2015</option>
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
											<label>По дисциплине</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox">
											<input type="checkbox">
											<label>По учебным годам</label>
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
						<legend><h3>Дисциплины</h3></legend>
						<table class="ui celled table">
							<col width="5%">
							<thead>
								<tr>
									<th>№</th>
									<th>Наименование</th>
									<th>Преподаватели</th>
									<th>Учебные года</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td rowspan="2">1</td>
									<td rowspan="2">Функциональное программирование</td>
									<td>Заур Амурбиевич</td>
									<td>2016/2017</td>
								</tr>
								<tr>
									<td>Констанин Констанинович</td>
									<td>2019/2020</td>
								</tr>
								<tr>
									<td rowspan="2">2</td>
									<td rowspan="2">Теория алгоритмов</td>
									<td>Кораблин Юрий Прокофьевич</td>
									<td>2013/2014</td>
								</tr>
								<tr>
									<td>Берков Николай Андреевич</td>
									<td>2016/2017</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</div>
			</div>
		</div>
	</div>



@endsection
