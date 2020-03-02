@extends('layouts.app')

@section('title') Лучшая система в мире @endsection

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
										<label>По году</label>
										<select>
											<option>2020</option>
											<option>2019</option>
											<option>2018</option>
											<option>2017</option>
											<option>2016</option>
											<option>2015</option>
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
						<legend><h3>Индивидуальные планы</h3></legend>
						<table class="ui celled table">
							<col width="5%">
							<thead>
								<tr>
									<th>№</th>
									<th>Преподаватель</th>
									<th>ИП</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Заур Амурбиевич</td>
									<td>
										<p style="color: red">
											<i class="ui icon file excel"></i>
											Индивидуальный план 1
										</p>
										<p style="color: green">
											<i class="ui icon file excel"></i>
											Индивидуальный план 2
										</p>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Фролов Константин Константинович</td>
									<td>
										<p style="color: red">
											<i class="ui icon file excel"></i>
											Индивидуальный план 1
										</p>
										<p style="color: green">
											<i class="ui icon file excel"></i>
											Индивидуальный план 2
										</p>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Кораблин Юрий Прокофьевич</td>
									<td>
										<p style="color: red">
											<i class="ui icon file excel"></i>
											Индивидуальный план 1
										</p>
										<p style="color: green">
											<i class="ui icon file excel"></i>
											Индивидуальный план 2
										</p>
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Берков Николай Андреевич</td>
									<td>
										<p style="color: red">
											<i class="ui icon file excel"></i>
											Индивидуальный план 1
										</p>
										<p style="color: green">
											<i class="ui icon file excel"></i>
											Индивидуальный план 2
										</p>
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