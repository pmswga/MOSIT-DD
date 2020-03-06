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
									<th>Учебный год</th>
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
									<td>
										2016/2017
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
