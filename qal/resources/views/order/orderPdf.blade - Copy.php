@extends('masterDashboard')
@section('content')
<style type="text/css">
	body {
		font-family: arial;
		font-size: 12px;
	}

	table { table-layout: fixed; }
 table th, table td { overflow: hidden; }


	.table {
		width: 100%;
		/*margin-bottom: 1rem;*/
		color: #212529;
	}

	.table th,
	.table td {
		/*padding: 0.75rem;*/
		vertical-align: top;
		/*border-top: 1px solid #dee2e6;*/
	}

	.table thead th {
		vertical-align: bottom;
		/*border-bottom: 2px solid #dee2e6;*/
	}

	.table tbody + tbody {
		/*border-top: 2px solid #dee2e6;*/
	}

	.table-sm th,
	.table-sm td {
		/*padding: 0.3rem;*/
	}

	.table-bordered {
		border: 1px solid #dee2e6;
	}

	.table-bordered th,
	.table-bordered td {
		border: 1px solid #dee2e6;
	}

	.table-bordered thead th,
	.table-bordered thead td {
		/*border-bottom-width: 2px;*/
	}

	.text-center {
		text-align: center;
	}
	.text-right {
		text-align: right;
	}

	footer {
		position: fixed; 
		bottom: -60px; 
		left: 0px; 
		right: 0px;
		height: 50px; 

		/** Extra personal styles **/
		/*background-color: #03a9f4;*/
		color: black;
		text-align: center;
		line-height: 35px;
		font-weight: bold;
		font-size: 11px;
	}

	header {
		position: fixed;
		top: -60px;
		left: 0px;
		right: 0px;
		height: 50px;

		/** Extra personal styles **/
		background-color: #03a9f4;
		color: white;
		text-align: center;
		line-height: 35px;
	}

	.col,.col-1,.col-10,.col-11,.col-12,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-auto,.col-lg,.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-auto,.col-md,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-auto,.col-sm,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-auto,.col-xl,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-auto{position:relative;width:100%;min-height:1px;padding-right:10px;padding-left:10px}.col{flex-basis:0;flex-grow:1;max-width:100%}.col-auto{flex:0 0 auto;width:auto;max-width:none}.col-1{flex:0 0 8.33333%;max-width:8.33333%}.col-2{flex:0 0 16.66667%;max-width:16.66667%}.col-3{flex:0 0 25%;max-width:25%}.col-4{flex:0 0 33.33333%;max-width:33.33333%}.col-5{flex:0 0 41.66667%;max-width:41.66667%}.col-6{flex:0 0 50%;max-width:50%}.col-7{flex:0 0 58.33333%;max-width:58.33333%}.col-8{flex:0 0 66.66667%;max-width:66.66667%}.col-9{flex:0 0 75%;max-width:75%}

</style>

{{-- <header>
	Our Code World
</header> --}}

<footer>
    Software Generate Report | Design & Developed By : QFL IT, www.qfl.com.bd
</footer>

<main>
	<div class='container-fluid'>
		<div class='card'>
			<div class='card-body'>
				<div class='row'>
					<div class='col-12 table-responsive'>
						<div class='card'>
							<div class='card-body' style='padding: 0px;'>

								<div class='table-responsive'>
									<table class='table'>
										<tr>
											<td valign='top'><img src='{{ public_path('resources/assets/images/fav.png')}}' width='100' height='50'></td>
											<td valign='top' align='center' style='padding-top: 8px;' width="400"><h2><b> Quality Aquabreeds Limited </b></h2>
												<span style='border: 1px solid #000; margin: 10px 10px; margin-top: 20px;'><b> DELIVERY ORDER </b>
												</span>
											</td>
											<td>CUSTOMER COPY <br />
												<b>Head Office :</b> <br />
												House 14, Road 7, Sector 4 <br />
												Uttara Dhaka-1230 <br />
												Tel : 58956024 (5 Lines) <br />
												Fax : 58956025, 58953019 <br /><br />
												<b> Farm :</b>
											Narkali, Krishnopur, Kahalu, Bogura</td>
										</tr>
									</table>

									<table class='table'>
										<tr>
											<td width="300">
												<table id='table' class='table-responsive' width='100%'>
													<tr>
														<td>Delivery Order No</td>
														<td>: {{ $result->delivery_order_no }}</td>
													</tr>
													<tr>
														<td>Money Receipt No</td>
														<td style=''>: </td>
													</tr>
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
											<td width="200">&nbsp;</td>
											<td width="300">
												<table id='table' class='table-responsive' width='100%'>
													<tr>
														<td>D.O.Date</td>
														<td>: {{ date('d-m-Y', strtotime($result->do_date)) }}</td>
													</tr>
													<tr>
														<td>M.R.Date</td>
														<td style=''>: </td>
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
												<td class='text-center' style='vertical-align: middle;'>Sl.</td>
												<td class='text-center' style='vertical-align: middle;'>Description</td>
												<td style='padding: 0px; background-color: #FFF;'>
													<table class='table' width="100" cellspacing="0" style='border: 0px !important; margin-bottom: 0px;'>
														<tr>
															<td colspan='3' class='text-center' style='vertical-align: middle;'>Quality</td>
														</tr>
														<tr>
															<td class='text-center' style="width: 110px;">Pcs/Box</td>
															<td class='text-center' style="width: 110px;">No. Box</td>
															<td class='text-center' style="width: 110px;">Total</td>
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
													<table class='table' cellspacing="0" style='margin-bottom: 0px;'>
														<tr>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;">{{ number_format($result->hybrid_monosex_tilapia_qty,0) }} </td>
														</tr>
													</table>
												</td>
												<td class="text-center">Pcs</td>
											</tr>
											<tr>
												<td class='text-center'>2</td>
												<td>Complementary</td> 
												<td style='padding: 0px;'>
													<table class='table' cellspacing="0" style='margin-bottom: 0px;'>
														<tr>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;">{{ number_format($result->tilapia_complementary_qty,0) }} </td>
														</tr>
													</table>
												</td>
												<td class="text-center">Pcs</td>
											</tr>

											<tr>
												<td class='text-center'>
												<td>Hybrid Monosex Pungas Fry</td>
												<td style='padding: 0px;'>
													<table class='table' cellspacing="0" style='margin-bottom: 0px;'>
														<tr>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;">{{ number_format($result->hybrid_monosex_pungas_qty,0) }} </td>
														</tr>
													</table>
												</td>
												<td class="text-center">Pcs</td>
											</tr>
											<tr>
												<td class='text-center'>4</td>
												<td>Complementary</td> 
												<td style='padding: 0px;'>
													<table class='table' cellspacing="0" style='margin-bottom: 0px;'>
														<tr>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;">{{ number_format($result->pungas_complementary_qty,0) }} </td>
														</tr>
													</table>
												</td>
												<td class='text-center'>Pcs</td>
											</tr>
											<tr>
												<td class='text-center'></td>
												<td class="text-center"><b>Total</b></td> 
												<td style='padding: 0px;'>
													<table class='table' cellspacing="0" style='margin-bottom: 0px;'>
														<tr>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;"></td>
															<td class='text-right' style="width: 110px;">{{ number_format(($result->hybrid_monosex_tilapia_qty + $result->tilapia_complementary_qty + $result->hybrid_monosex_pungas_qty + $result->pungas_complementary_qty),0) }} </td>
														</tr>
													</table>
												</td>
												<td class="text-center">Pcs</td>
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
</main>
@endsection
