@extends('layouts.adminn')
@section('content')
		<!-- PAGE CONTENT -->
		<div class="page-content--bgf7">

			<!-- WELCOME -->
			<section class="welcome p-t-10">
				<div class="container">
					<div class="row">
						<div class="col-md-12"><center>
							<h1 class="tittle-4"> Daftar Mobil
								<span>Rental</span>
								</h1> </center>
								<hr class="line-seprate">
							</div>
						</div>
					</div>
				</section>
				<!-- END WELCOME -->
				@foreach($mobil as $data)
				<div class="main-content">
					<div class="section__content section__content--p30">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="card-body">
											<div class="mx-auto d-block"></div>

<img class="rounded-circle mx-auto d-block" src="{{asset('/img/'.$data->foto_mobil.'')}}" alt="Card image cap">
<h5 class="text-sm-center mt-2 mb-1"> {{ $data->nama}}</h5>
<div class="location text-sm-center">
	<i class="fa fa-dollar"></i>Harga : Rp.{{ $data->harga_sewa}}</div>
</div>
<div class="card-text text-sm-center">
	<!-- Button Memicu Modal -->
<button data-toggle="modal" data-target="#myModal" style="font-size: 18px">Sewa<i class="fa fa-handshake"></i></button>
	<!-- End Button -->
</div>
	

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
		</div>
@endforeach
<!-- Form Data Sewa -->

<!-- End -->
@endsection