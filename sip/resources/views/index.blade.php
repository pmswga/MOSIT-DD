@extends('layouts.app')

@section('title') Лучшая система в мире @endsection

@section('content')

	<div class="">
	
	</div>

	<div class="sixteen wide column">
		
		<div class="ui top attached tabular menu">
		  <a class="active item" data-tab="first">First</a>
		  <a class="item" data-tab="second">Second</a>
		  <a class="item" data-tab="third">Third</a>
		</div>
		<div class="ui bottom attached active tab segment" data-tab="first">
		  First
		</div>
		<div class="ui bottom attached tab segment" data-tab="second">
		  Second
		</div>
		<div class="ui bottom attached tab segment" data-tab="third">
		  Third
		</div>
		
		
		
	</div>

@endsection