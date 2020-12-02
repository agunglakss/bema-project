@extends('layouts.admin.main')

@section('content')
<section class="section">

    <div class="section-header">
        <h1>Daftar Order</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Daftar Order</div>
        </div>
      </div>
  
    <div class="section-body">

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>No. Order</th>
                                    <th>Nama Pemesan</th>
                                    <th>No.Telp</th>
                                    <th>Motor</th>
                                    <th>Uang Muka (DP)</th>
                                    <th>Tenor</th>
                                    <th>Cicilan Per Bulan</th>
                                    <th>Created At</th>
                                </tr>
                                @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->nama }}</td>
                                    <td>{{ $order->nomor_telp}}</td>
                                    @if(!empty($order->pricelist->id))
                                        <td>{{ $order->pricelist->motor->nama_motor }}</td>
                                        <td>Rp {{ number_format($order->pricelist->diskon) }}</td>
                                        <td>{{ $order->tenor }}</td>
                                        <td>
                                            @switch($order->tenor)
                                                @case($order->tenor == 11)
                                                Rp {{ number_format($order->pricelist->bulan_11) }}
                                                    @break
                                                @case($order->tenor == 17)
                                                Rp {{ number_format($order->pricelist->bulan_17) }}
                                                    @break
                                                @case($order->tenor == 23)
                                                Rp {{ number_format($order->pricelist->bulan_23) }}
                                                    @break
                                                @case($order->tenor == 27)
                                                Rp {{ number_format($order->pricelist->bulan_27) }}
                                                    @break
                                                @case($order->tenor == 29)
                                                Rp {{ number_format($order->pricelist->bulan_29) }}
                                                    @break
                                                @case($order->tenor == 33)
                                                Rp {{ number_format($order->pricelist->bulan_33) }}
                                                    @break
                                                @case($order->tenor == 35)
                                                Rp {{ number_format($order->pricelist->bulan_35) }}
                                                    @break
                                                @default 
                                            @endswitch
                                        </td>
                                    @else
                                    <td>Data not found</td>
                                    <td>Data not found</td>
                                    <td>Data not found</td>
                                    <td>Data not found</td>
                                    @endif
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                @empty
                                    Data kosong.
                                @endforelse
                                <tr>

                                </tr>
                            </table>
                        </div>

                        {{-- pagination --}}
                        <div class="float-right">
                          {{ $orders->links() }}
                        </div>
                        {{-- end pagination --}}
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end section-body -->
    
</section>
@endsection