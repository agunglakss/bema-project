<div class="col-md-3 mb-5">
    <div class="sidebar">
        <div class="sidebar-heading font-bold mb-3">Kategori Motor</div><hr>
        <ul class="list-group list-group-flush">
            @foreach ($Sidebars as $Menu)

            <li class="list-group-item d-flex bg-grey justify-content-between align-items-center font-medium">
                <a href="{{ url('/products/'.$Menu->slug) }}">{{ $Menu->nama_kategori }}</a>
                <span data-toggle="collapse" data-target="#{{ $Menu->slug }}" aria-expanded="false" aria-controls="{{ $Menu->slug }}"><i class="fa fa-angle-down font-bold"></i></span>
            </li>

            {{-- Submenu --}}
            <ul id="{{ $Menu->slug }}" class="list-group list-group-flush collapse submenu">
                @foreach ($Menu->tipes as $subMenu)
                <li class=" list-group-item bg-grey font-reguler">
                    <a href="{{ url('/products/'.$Menu->slug.'/'.$subMenu->slug) }}">{{ $subMenu->nama_tipe }}</a>
                </li>
                @endforeach
            </ul>
			{{-- End Submenu --}} 

			@endforeach
        </ul>

    </div>
</div>