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
											<span style='padding: 5px 10px; margin-top: 20px;'><b> STORE DEPARTMENT </b></span>
											<h3><b> GATE PASS</b></h3>
										</td>
										<td>
											@if($type=='gate')
												GATE COPY
											@elseif($type=='customer')
												CUSTOMER COPY
											@elseif($type=='store')
												STORE COPY
											@endif
										</td>
									</tr>
								</table>

								<table class='table' cellspacing="0">
									<tr>
										<td>
											<table id='table' class='table-responsive' width='100%' cellspacing="0">
												<tr>
													<td style='width: 150px'>Sl. No</td>
													<td style='width: 300px'>: {{ $result->gp_no }}</td>
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
													<td style='width: 150px'>D.O No</td>
													<td style='width: 150px'>: {{ $result->doid }} </td>
												</tr>
												<tr>
													<td style='width: 150px'>Date</td>
													<td style='width: 150px'>: {{ date('d-m-Y', strtotime($result->date)) }}</td>
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
											<td class='text-center' style='padding: 0px; background-color: #FFF;'>Quality</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='text-center'>1</td>
											<td>{{ $result->particulars_items }}</td>
											<td class='text-center'> {{ number_format($result->items_qty,0) }}</td>
										</tr>
									</tbody>
								</table>
								<p>&nbsp;</p>
								<table class='table' style='border-bottom: 0px;'>
									<thead>
										<tr>
											<td><b>Prepared by :</b></td>
											<td><b> Checked by : </b></td>
											<td><b> Approved by : </b></td>
											<td><b> Received by : </b></td>
										</tr>
										<tr>
											<td>Name :</td>
											<td>Name :</td>
											<td>Name :</td>
											<td>Name :</td>
										</tr>
										<tr>
											<td>Desig :</td>
											<td>Desig : Store Officer</td>
											<td>Desig : Admin Officer</td>
											<td>Desig : Farm Incharge</td>
										</tr>
										<tr>
											<td>Signature :</td>
											<td>Signature :</td>
											<td>Signature :</td>
											<td>Signature :</td>
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