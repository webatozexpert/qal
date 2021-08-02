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
											<h3><b> CHALLAN </b></h3></span>
										</td>
										<td>
											@if($type=='accounts')
												ACCOUNTS COPY
											@elseif($type=='customer')
												CUSTOMER COPY
											@elseif($type=='sales')
												SALES COPY
											@elseif($type=='hatchery')
												HATCHERY SALES COPY
											@endif
											<br />
											<b>Head Office :</b> <br />
											House 14, Road 7, Sector 4 <br />
											Uttara Dhaka-1230 <br />
											Tel : 58956024 (5 Lines) <br />
											Fax : 58956025, 58953019 <br /><br />
											<b> Farm :</b>
										Narkali, Krishnopur, Kahalu, Bogura</td>
									</tr>
								</table>

								<table class='table' cellspacing="0">
									<tr>
										<td>
											<table id='table' class='table-responsive' width='100%' cellspacing="0">
												<tr>
													<td style='width: 150px'>Challan No</td>
													<td style='width: 300px'>: {{ $result->challan_no }}</td>
												</tr>
												<tr>
													<td style='width: 150px'>Delivery Order No</td>
													<td style='width: 300px'>: {{ $result->doid }}</td>
												</tr>
												{{-- <tr>
													<td>Money Receipt No</td>
													<td style=''>: </td>
												</tr> --}}
												<tr>
													<td>Name of Agent</td>
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
													<td style='width: 150px'>Challan Date</td>
													<td style='width: 150px'>: {{ date('d-m-Y', strtotime($result->date)) }}</td>
												</tr>

												<tr>
													<td style='width: 150px'>D.O.Date</td>
													<td style='width: 150px'>: {{ date('d-m-Y', strtotime($result->do_date)) }}</td>
												</tr>
												{{-- <tr>
													<td>M.R.Date</td>
													<td style=''>: </td>
												</tr> --}}
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
											<td class='text-center' style='vertical-align: middle;'>Sl.</td>
											<td class='text-center' style='vertical-align: middle;'>Description</td>
											<td style='padding: 0px; background-color: #FFF;'>
												<table class='table' style='border: 0px !important; margin-bottom: 0px;' cellspacing="0">
													<tr>
														<td colspan='3' class='text-center' style='vertical-align: middle;'>Quality</td>
													</tr>
													<tr>
														<td class='text-center' width="100">Pcs/Box</td>
														<td class='text-center' width="100">No. Box</td>
														<td class='text-center' width="100">Total</td>
													</tr>
												</table>
											</td>
											<td class='text-center' style='vertical-align: middle;'>Remarks</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='text-center'>1</td>
											<td>Hybrid Monosex Telapia Fry</td>
											<td style='padding: 0px;'>
												<table class='table' style='margin-bottom: 0px;' cellspacing="0">
													<tr>
														<td class='text-center' width="100">
															{{ number_format($result->tilapia_per_box,0) }}
														</td>
														<td class='text-center' width="100">
															{{ number_format($result->tilapia_no_box,0) }}
														</td>
														<td class='text-center' width="100">{{ number_format($result->hybrid_monosex_tilapia_qty,0) }} </td>
													</tr>
												</table>
											</td>
											<td class="text-center">Pcs</td>
										</tr>
										<tr>
											<td class='text-center'>2</td>
											<td>Complementary</td> 
											<td style='padding: 0px;'>
												<table class='table' style='margin-bottom: 0px;' cellspacing="0">
													<tr>
														<td class='text-center' width="100">
															{{ number_format($result->tilapia_comp_per_box,0) }}
														</td>
														<td class='text-center' width="100">
															{{ number_format($result->tilapia_comp_no_box,0) }}
														</td>
														<td class='text-center' width="100">{{ number_format($result->tilapia_complementary_qty,0) }} </td>
													</tr>
												</table>
											</td>
											<td class="text-center">Pcs</td>
										</tr>

										<tr>
											<td class='text-center'>3</td>
											<td>Hybrid Monosex Pungas Fry</td>
											<td style='padding: 0px;'>
												<table class='table' style='margin-bottom: 0px;' cellspacing="0">
													<tr>
														<td class='text-center' width="100">
															{{ number_format($result->pungas_per_box,0) }}
														</td>
														<td class='text-center' width="100">
															{{ number_format($result->pungas_no_box,0) }}
														</td>
														<td class='text-center' width="100">{{ number_format($result->hybrid_monosex_pungas_qty,0) }} </td>
													</tr>
												</table>
											</td>
											<td class="text-center">Pcs</td>
										</tr>
										<tr>
											<td class='text-center'>4</td>
											<td>Complementary</td> 
											<td style='padding: 0px;'>
												<table class='table' style='margin-bottom: 0px;' cellspacing="0">
													<tr>
														<td class='text-center' width="100">
															{{ number_format($result->pungas_comp_per_box,0) }}
														</td>
														<td class='text-center' width="100">
															{{ number_format($result->pungas_comp_no_box,0) }}
														</td>
														<td class='text-center' width="100">{{ number_format($result->pungas_complementary_qty,0) }} </td>
													</tr>
												</table>
											</td>
											<td class='text-center'>Pcs</td>
										</tr>
										<tr>
											<td class='text-center'></td>
											<td class="text-center"><b>Total</b></td> 
											<td style='padding: 0px;'>
												<table class='table' style='margin-bottom: 0px;' cellspacing="0">
													<tr>
														<td class='text-center' width="100"></td>
														<td class='text-center' width="100">
															<b>
																{{ number_format($result->tilapia_no_box + $result->tilapia_comp_no_box + $result->pungas_no_box + $result->pungas_comp_no_box,0) }}
															</b>
														</td>
														<td class='text-center' width="100"><b> {{ number_format(($result->hybrid_monosex_tilapia_qty + $result->tilapia_complementary_qty + $result->hybrid_monosex_pungas_qty + $result->pungas_complementary_qty),0) }} </b> </td>
													</tr>
												</table>
											</td>
											<td class="text-center"><b> Pcs </b></td>
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