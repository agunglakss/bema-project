<div class="col-md-3">
	<div class="sidebar">
 
		<h3 class="sidebar-heading mb-3">Categories</h3>
		<ul class="list-group list-group-flush">
			@foreach ($Sidebars as $Menu)
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<a href="{{ url('/product/'.$Menu->slug) }}">{{ $Menu->nama_kategori }}</a>
					<span data-toggle="collapse" data-target="#{{ $Menu->slug }}" aria-expanded="false" aria-controls="{{ $Menu->slug }}"><i class="fa fa-angle-down"></i></span>
				</li>

				{{-- Submenu --}}
				<ul id="{{ $Menu->slug }}" class="list-group list-group-flush collapse submenu">
					@foreach ($Menu->tipes as $subMenu)
						@if ($subMenu->kategori_id == $Menu->id)
							<li class=" list-group-item">
								<a href="{{ url('/product/'.$Menu->slug.'/'.$subMenu->slug) }}">{{ $subMenu->nama_tipe }}</a>
							</li>
						@endif
					@endforeach
				</ul>
				{{-- End Submenu --}}
				
			@endforeach
		</ul>
 
   </div>
</div>