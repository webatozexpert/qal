<!DOCTYPE html>
<html>
<head>
	<title></title>
	{{-- <link href="{{ public_path('resources/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" /> --}}
	<link rel="icon" type="image/png" sizes="16x16" href="{{ public_path('resources/assets/images/fav.png') }}">
	<style type="text/css">
		body {
			font-size: 10px;
			font-family: Arial, Helvetica, sans-serif;
		}
		.table {
			width: 100%;
			/*margin-bottom: 1rem;*/
			color: #212529;
		}

		.table th,
		.table td {
			padding: 0.25rem;
			vertical-align: top;
			/*border-top: 1px solid #dee2e6;*/
		}

		.table thead th {
			vertical-align: bottom;
			border-bottom: 2px solid #dee2e6;
		}

		.table tbody + tbody {
			border-top: 2px solid #dee2e6;
		}

		.table-sm th,
		.table-sm td {
			padding: 0.3rem;
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
			border-bottom-width: 2px;
		}

		.table-borderless th,
		.table-borderless td,
		.table-borderless thead th,
		.table-borderless tbody + tbody {
			border: 0;
		}

		.table-striped tbody tr:nth-of-type(odd) {
			background-color: rgba(0, 0, 0, 0.05);
		}

		.table-hover tbody tr:hover {
			color: #212529;
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-primary,
		.table-primary > th,
		.table-primary > td {
			background-color: #b8daff;
		}

		.table-primary th,
		.table-primary td,
		.table-primary thead th,
		.table-primary tbody + tbody {
			border-color: #7abaff;
		}

		.table-hover .table-primary:hover {
			background-color: #9fcdff;
		}

		.table-hover .table-primary:hover > td,
		.table-hover .table-primary:hover > th {
			background-color: #9fcdff;
		}

		.table-secondary,
		.table-secondary > th,
		.table-secondary > td {
			background-color: #d6d8db;
		}

		.table-secondary th,
		.table-secondary td,
		.table-secondary thead th,
		.table-secondary tbody + tbody {
			border-color: #b3b7bb;
		}

		.table-hover .table-secondary:hover {
			background-color: #c8cbcf;
		}

		.table-hover .table-secondary:hover > td,
		.table-hover .table-secondary:hover > th {
			background-color: #c8cbcf;
		}

		.table-success,
		.table-success > th,
		.table-success > td {
			background-color: #c3e6cb;
		}

		.table-success th,
		.table-success td,
		.table-success thead th,
		.table-success tbody + tbody {
			border-color: #8fd19e;
		}

		.table-hover .table-success:hover {
			background-color: #b1dfbb;
		}

		.table-hover .table-success:hover > td,
		.table-hover .table-success:hover > th {
			background-color: #b1dfbb;
		}

		.table-info,
		.table-info > th,
		.table-info > td {
			background-color: #bee5eb;
		}

		.table-info th,
		.table-info td,
		.table-info thead th,
		.table-info tbody + tbody {
			border-color: #86cfda;
		}

		.table-hover .table-info:hover {
			background-color: #abdde5;
		}

		.table-hover .table-info:hover > td,
		.table-hover .table-info:hover > th {
			background-color: #abdde5;
		}

		.table-warning,
		.table-warning > th,
		.table-warning > td {
			background-color: #ffeeba;
		}

		.table-warning th,
		.table-warning td,
		.table-warning thead th,
		.table-warning tbody + tbody {
			border-color: #ffdf7e;
		}

		.table-hover .table-warning:hover {
			background-color: #ffe8a1;
		}

		.table-hover .table-warning:hover > td,
		.table-hover .table-warning:hover > th {
			background-color: #ffe8a1;
		}

		.table-danger,
		.table-danger > th,
		.table-danger > td {
			background-color: #f5c6cb;
		}

		.table-danger th,
		.table-danger td,
		.table-danger thead th,
		.table-danger tbody + tbody {
			border-color: #ed969e;
		}

		.table-hover .table-danger:hover {
			background-color: #f1b0b7;
		}

		.table-hover .table-danger:hover > td,
		.table-hover .table-danger:hover > th {
			background-color: #f1b0b7;
		}

		.table-light,
		.table-light > th,
		.table-light > td {
			background-color: #fdfdfe;
		}

		.table-light th,
		.table-light td,
		.table-light thead th,
		.table-light tbody + tbody {
			border-color: #fbfcfc;
		}

		.table-hover .table-light:hover {
			background-color: #ececf6;
		}

		.table-hover .table-light:hover > td,
		.table-hover .table-light:hover > th {
			background-color: #ececf6;
		}

		.table-dark,
		.table-dark > th,
		.table-dark > td {
			background-color: #c6c8ca;
		}

		.table-dark th,
		.table-dark td,
		.table-dark thead th,
		.table-dark tbody + tbody {
			border-color: #95999c;
		}

		.table-hover .table-dark:hover {
			background-color: #b9bbbe;
		}

		.table-hover .table-dark:hover > td,
		.table-hover .table-dark:hover > th {
			background-color: #b9bbbe;
		}

		.table-active,
		.table-active > th,
		.table-active > td {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover > td,
		.table-hover .table-active:hover > th {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table .thead-dark th {
			color: #fff;
			background-color: #343a40;
			border-color: #454d55;
		}

		.table .thead-light th {
			color: #495057;
			background-color: #e9ecef;
			border-color: #dee2e6;
		}

		.table-dark {
			color: #fff;
			background-color: #343a40;
		}

		.table-dark th,
		.table-dark td,
		.table-dark thead th {
			border-color: #454d55;
		}

		.table-dark.table-bordered {
			border: 0;
		}

		.table-dark.table-striped tbody tr:nth-of-type(odd) {
			background-color: rgba(255, 255, 255, 0.05);
		}

		.table-dark.table-hover tbody tr:hover {
			color: #fff;
			background-color: rgba(255, 255, 255, 0.075);
		}

		@media (max-width: 575.98px) {
			.table-responsive-sm {
				display: block;
				width: 100%;
				overflow-x: auto;
				-webkit-overflow-scrolling: touch;
			}
			.table-responsive-sm > .table-bordered {
				border: 0;
			}
		}

		@media (max-width: 767.98px) {
			.table-responsive-md {
				display: block;
				width: 100%;
				overflow-x: auto;
				-webkit-overflow-scrolling: touch;
			}
			.table-responsive-md > .table-bordered {
				border: 0;
			}
		}

		@media (max-width: 991.98px) {
			.table-responsive-lg {
				display: block;
				width: 100%;
				overflow-x: auto;
				-webkit-overflow-scrolling: touch;
			}
			.table-responsive-lg > .table-bordered {
				border: 0;
			}
		}

		@media (max-width: 1199.98px) {
			.table-responsive-xl {
				display: block;
				width: 100%;
				overflow-x: auto;
				-webkit-overflow-scrolling: touch;
			}
			.table-responsive-xl > .table-bordered {
				border: 0;
			}
		}

		.table-responsive {
			display: block;
			width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
		}

		.table-responsive > .table-bordered {
			border: 0;
		}

		.table-responsive {
			display: block;
			width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
		}

		.table-responsive > .table-bordered {
			border: 0;
		}

		@media all {
			.page-break { display: none; }
		}
		@media print {
			.page-break { display: block; page-break-before: always; }
		}

		.text-center {
			text-align: center;
		}
		.text-right {
			text-align: right;
		}

		div.b {
			text-align: left;
		}

		div.c {
			text-align: right;
		}

		div.c {
			text-align: justify;
		}

	</style>
</head>
<body>
	<div id="main-wrapper">
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12 ">
								<div class="card">
									<div class="card-body" style="padding: 0px;">
										<div class="table-responsive">
											
											<table class="table">
												<tr>
													<td valign="top" align="center" style="padding-top: 8px;font-size: 22px !important;">
														{{-- <img src='{{public_path('resources/assets/images/fav.png')}}' width='100' height='50'> --}}
														<h2 style="padding-bottom: 0!important;"><b> Quality Aquabreeds Limited </b></h2>
														FRY Sales Delivery Statement-{{ date('Y') }}<br />
														<span style="font-size: 15px !important;"> {{ date('d-m-Y', strtotime($fromDate)) }} To {{ date('d-m-Y', strtotime($toDate)) }} </span>
													</td>
												</tr>
											</table>

											<table class="table table-bordered" cellpadding="0" cellspacing="0">
												<thead>
													<tr>
														<td class="text-center" style="vertical-align: middle;">SL</td>
														<td class="text-center" style="vertical-align: middle;">Name of Party</td>
														<td class="text-center" style="vertical-align: middle;">District</td>
														<td class="text-center" style="vertical-align: middle;">Qty Actulal</td>
														<td class="text-center" style="vertical-align: middle;">Comp 5%</td>
														<td class="text-center" style="vertical-align: middle;">Mortality</td>
														<td class="text-center" style="vertical-align: middle;">Incentive-{{ date('Y',strtotime('-1 year')) }}</td>
														<td class="text-center" style="vertical-align: middle;">Total (Qty)</td>
														<td class="text-center" style="vertical-align: middle;">MR NO</td>
														<td class="text-center" style="vertical-align: middle;">DO No</td>
														<td class="text-center" style="vertical-align: middle;">Bank/Cash</td>
														<td class="text-center" style="vertical-align: middle;">FRY Grade</td>
														<td class="text-center" style="vertical-align: middle;">FRY Comission Less</td>
														<td class="text-center" style="vertical-align: middle;">FRY Actulal Price</td>
														<td class="text-center" style="vertical-align: middle;">Total MRP</td>
														<td class="text-center" style="vertical-align: middle;">Commi</td>
														<td class="text-center" style="vertical-align: middle;">Net Amount</td>
														
														<td class="text-center" style="vertical-align: middle;">Carriage</td>
														<td class="text-center" style="vertical-align: middle;">Total Car.TK.</td>
														<td class="text-center" style="vertical-align: middle;">Net value</td>
														<td class="text-center" style="vertical-align: middle;">Received</td>
														<td class="text-center" style="vertical-align: middle;">Total Balance</td>
														<td class="text-center" style="vertical-align: middle;">Delivery Point</td>
													</tr>
												</thead>

												<tbody>
													@php 
													$s = 1;
													@endphp
													@foreach($reports as $results)

													@php 
													$qtyTotal     = $results->hybrid_monosex_tilapia_qty + $results->hybrid_monosex_pungas_qty;
													$compensation = $results->tilapia_complementary_qty + $results->pungas_complementary_qty;
													$mortality    = $results->pungas_mortality_qty + $results->tilapia_mortality_qty;

													$incentive    = $results->incentive_tilapia_qty + $results->incentive_pungas_qty;

													$mrInfo = DB::table('money_receipts')
													->select('money_receipts.*','banks.name as bname')
													->join('banks','banks.id','=','money_receipts.bank_id')
													->whereBetween('money_receipts.added_date', [$results->do_date, $results->do_date])
													->where('money_receipts.custid', $results->cid)
													->get();

													$mrNo=0;
													$bank='';
													$received=0;
													foreach ($mrInfo as $value) {
														$mrNo .= $value->id.',';
														$bank .= $value->bname.',';
														$received += $value->amount;
													}

													$chargeRate    = 0;
													$totalCarriage = 0;

													if($results->delivery_charge=='Yes')
													{
														$chargeRate    = $results->carriage_charge;
														$totalCarriage = $chargeRate * $qtyTotal;
													}

													$totalAmount =  $qtyTotal * '1.20';
													$finalAmount =  $totalAmount - $totalCarriage;
													@endphp
													<tr>
														<td>{{ $s }}</td>
														<td>{{ $results->cname }}</td>
														<td>{{ $results->zname }}</td>
														<td class="text-center">{{ number_format($qtyTotal,0) }}</td>
														<td class="text-center">{{ number_format($compensation,0) }}</td>
														<td class="text-center">{{ number_format($mortality,0) }}</td>
														<td class="text-center">{{ number_format($incentive,0) }}</td>
														<td class="text-center">{{ number_format($qtyTotal + $compensation + $mortality,0) }}</td>
														<td>{{ $mrNo }}</td>
														<td>{{ $results->id }}</td>
														<td>{{ $bank }}</td>
														<td class="text-center">{{ '1.30' }}</td>
														<td class="text-center">{{ '0.10' }}</td>
														<td class="text-center">{{ '1.20' }}</td>
														<td class="text-center">{{ number_format($qtyTotal * '1.30',0)}}</td>
														<td class="text-center">{{ number_format($qtyTotal * '0.10',0)}}</td>

														<td class="text-center">{{ number_format(($qtyTotal * '1.30') - ($qtyTotal * '0.10'),0) }}</td>
														<td class="text-center">{{ number_format($totalCarriage,0) }}</td>
														<td class="text-center">{{ number_format($totalCarriage,0) }}</td>
														<td class="text-center">
															{{ number_format((($qtyTotal * '1.30') - ($qtyTotal * '0.10')) - $totalCarriage,0) }}
														</td>
														<td class="text-center">{{ number_format($received,0) }}</td>
														<td>
															{{ number_format(((($qtyTotal * '1.30') - ($qtyTotal * '0.10')) - $totalCarriage) - $received,0) }}
														</td>
														<td>{{ $results->delivery_point }}</td>
													</tr>
													@php 
													$s++;
													@endphp
													@endforeach
												</tbody>

											</table>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>