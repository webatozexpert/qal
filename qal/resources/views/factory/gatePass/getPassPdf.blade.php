@extends('masterDashboard')
@section('content')
<div class='container-fluid'>
	<div class='row'>
		<div class='col-12' style="text-align: right;float: right;">
			<img src='{{URL::asset('resources/assets/images/printer.png')}}' width="20" height="20" onclick="printDiv()" style="cursor: pointer;" title="Print">
		</div>
	</div>

	<div class='card' id="section-to-print">
		<div class='card-body'>
			<div ]lass='row'>
				<div class='col-12 table-responsive'>
					<div class='card'>
						<div class='card-body' style='padding: 0px;'>

							<div class='table-responsive'>
								<table class='table' cellspacing="0">
									<tr>
										<td valign='top'><img src='{{URL::asset('resources/assets/images/fav.png')}}' width='100' height='50'></td>
										<td valign='top' align='center' style='padding-top: 8px; width: 400px;'><h2><b> Quality Aquabreeds Limited </b></h2>
											<span style='border: 1px solid #000; padding: 5px 10px; margin-top: 20px;'><b> STORE DEPARTMENT </b></span>
											<h3><b> GATE PASS</b></h3>
										</td>
										<td>GATE COPY</td>
									</tr>
								</table>

								<table class='table' cellspacing="0">
									<tr>
										<td>
											<table id='table' class='table-responsive' width='100%' cellspacing="0">
												<tr>
													<td style='width: 150px'>Sl. No</td>
													<td style='width: 300px'>: {{ $result->id }}</td>
												</tr>
												{{-- <tr>
													<td>Money Receipt No</td>
													<td style=''>: </td>
												</tr> --}}
												<tr>
													<td>Please allow Mr.</td>
													<td style=''>: {{ $result->cname }}</td>
												</tr>
												<tr>
													<td>Address</td>
													<td style=''>: {{ $result->address }}</td>
												</tr>
											</table>
										</td>
										<td style='width: 30px;'>&nbsp;</td>
										<td>
											<table id='table' class='table-responsive' width='100%' cellspacing="0">
												<tr>
													<td style='width: 150px'>Date</td>
													<td style='width: 150px'>: {{ date('d-m-Y', strtotime($result->date)) }}</td>
												</tr>
												<tr>
													<td>Agent Code</td>
													<td style=''>: {{ $result->ccode }}</td>
												</tr>
												<tr>
													<td>Delivery Point</td>
													<td style=''>: {{ $result->delivery_point }}</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>


								<table class='table table-bordered' cellspacing="0">
									<thead>
										<tr>
											<td class='text-center' style='vertical-align: middle;'>Sl. No</td>
											<td class='text-center' style='vertical-align: middle;'>Particulars of Items</td>
											<td style='padding: 0px; background-color: #FFF;'>Quality</td>
											<td class='text-center' style='vertical-align: middle;'>Remarks</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='text-center'>1</td>
											<td>Hybrid Monosex Telapia Fry</td>
											<td>Hybrid Monosex Telapia Fry</td>
										</tr>
									</tbody>
								</table>
								<p>&nbsp;</p>
								<table class='table' style='border-bottom: 0px;'>
									<thead>
										<tr>
											<td width='41%'><b>Issued by :</b></td>
											<td width='40%'><b> Verified by : </b></td>
											<td><b> Approved by : </b></td>
										</tr>
										<tr>
											<td>Name :</td>
											<td>Name :</td>
											<td>Name :</td>
										</tr>
										<tr>
											<td>Desig :</td>
											<td>Desig :</td>
											<td>Desig :</td>
										</tr>
									</thead>
								</table>

							</div>


						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection