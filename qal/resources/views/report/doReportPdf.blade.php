<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ public_path('resources/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body {
			font-size: 13px;
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

										@foreach($allCustomer as $allCustomers)	
											<table class="table">
												<tr>
													<td valign="top" align="center" style="padding-top: 8px;">
														<img src='{{public_path('resources/assets/images/fav.png')}}' width='100' height='50'>
														<h2><b> Quality Aquabreeds Limited </b></h2> <br />
														{{ $allCustomers->name }} Ledger-{{ date('Y') }}
													</td>
												</tr>
											</table>

											<table class="table table-bordered" cellpadding="0" cellspacing="0">
												<thead>
													<tr>
														<td class="text-center" style="vertical-align: middle;">Date</td>
														<td class="text-center" style="vertical-align: middle;">Payable(Qty)</td>
														<td class="text-center" style="vertical-align: middle;">Bonus (5%)</td>
														<td class="text-center" style="vertical-align: middle;">Total (Qty)</td>
														<td class="text-center" style="vertical-align: middle;">MR</td>
														<td class="text-center" style="vertical-align: middle;">DO NO</td>
														<td class="text-center" style="vertical-align: middle;">Bank/Cash</td>
														<td class="text-center" style="vertical-align: middle;">FRY Price(1 Pcs)</td>
														<td class="text-center" style="vertical-align: middle;">Less Commission 0.10</td>
														<td class="text-center" style="vertical-align: middle;">Actual Price</td>
													</tr>
												</thead>
												<tbody>
													@php
													$result = DB::table('delivery_orders')
										            ->select('delivery_orders.*','zones.id as zid','zones.name as zname','customers.name as cname')
										            ->join('zones','zones.id','=','delivery_orders.zoneid')
										            ->join('customers','customers.id','=','delivery_orders.custid')
										            ->whereBetween('delivery_orders.do_date', [$fromDate, $toDate])
										            ->where('delivery_orders.custid', $allCustomers->id)
										            ->get();
													@endphp

													@foreach($result as $results)
													<tr>
														<td>{{ $results->do_date }}</td>
														<td class="text-right">{{ number_format($results->hybrid_monosex_tilapia_qty + $results->hybrid_monosex_pungas_qty,0) }}</td>
														<td class="text-right">{{ number_format($results->tilapia_complementary_qty + $results->pungas_complementary_qty,0) }}</td>
														<td class="text-right">{{ number_format($results->hybrid_monosex_tilapia_qty + $results->hybrid_monosex_pungas_qty + $results->tilapia_complementary_qty + $results->pungas_complementary_qty,0) }}</td>
														<td></td>
														<td></td>
														<td></td>
														<td class="text-right">1.30</td>
														<td class="text-right">0.10</td>
														<td class="text-right">1.20</td>
													</tr>
													@endforeach
												</tbody>

											</table>

											{{-- <div class="pagebreak"> </div> --}}
											<div class="page-break"></div>

										@endforeach


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