<x-guest-layout>
	<form method="POST" action="{{ route('register') }}"

	@csrf
	

	<div>
		<x-input-label for=name :value="_('Name')"/>
		<x-text-input id="" class="" type="" name="" :value="" required autofocus autocomplete="name"/>

		<x-input-error :message=" "  class=""/>

		
	</div>
	<div>
		
	</div>
	
	</form>