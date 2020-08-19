@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
			<h1>{{ $title }}</h1>
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Seluruh Motor</h4>
						</div>
						<div class="card-body">
							{{ $countMotor }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
					<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
					<div class="card-header">
						<h4>Total Motor Matic</h4>
					</div>
					<div class="card-body">
						{{ $countMotorMatic }}
					</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
					<i class="far fa-file"></i>
					</div>
					<div class="card-wrap">
					<div class="card-header">
						<h4>Total Motor Sport</h4>
					</div>
					<div class="card-body">
						{{ $countMotorBebek }}
					</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
					<i class="fas fa-circle"></i>
					</div>
					<div class="card-wrap">
					<div class="card-header">
						<h4>Total Motor Bebek</h4>
					</div>
					<div class="card-body">
						{{ $countMotorSport }}
					</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Spesialis Kredit Motor Honda</h4>
					</div>
					<div class="card-body">
						<canvas id="myChart" height="182"></canvas>
						<div class="statistic-details mt-sm-4"></div>
					</div>
				</div>
			</div>
		</div>
		
	</section>
@endsection