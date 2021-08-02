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
											<h3><b> INVOICE </b></h3></span>
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
													<td style='width: 150px'>Invoice No</td>
													<td style='width: 300px'>: {{ $result->invoice_no }}</td>
												</tr>
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
													<td style='width: 150px'>Invoice Date</td>
													<td style='width: 150px'>: {{ date('d-m-Y', strtotime($result->date)) }}</td>
												</tr>
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
											<td class='text-center' style='vertical-align: middle;'> Quantity </td>
											<td class='text-center' style='vertical-align: middle;'> Rate </td>
											<td class='text-center' style='vertical-align: middle;'> Amount (Tk.) </td>
											{{-- <td class='text-center' style='vertical-align: middle;'>Remarks</td> --}}
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='text-center'>1</td>
											<td>Hybrid Monosex Telapia Fry</td>
											<td style='padding: 0px; text-align: center;'> {{ number_format(($result->hybrid_monosex_tilapia_qty + $result->tilapia_complementary_qty) ,0) }} </td>
											<td class="text-center">1.30</td>
											<td class="text-center">{{ number_format(($result->hybrid_monosex_tilapia_qty + $result->tilapia_complementary_qty) * '1.30',0) }}</td>
											{{-- <td class="text-center"></td> --}}
										</tr>

										<tr>
											<td class='text-center'>2</td>
											<td>Complementary (5%)</td>
											<td style='padding: 0px; text-align: center;'> {{ number_format(($result->tilapia_complementary_qty) ,0) }} </td>
											<td class="text-center">-</td>
											<td class="text-center">-</td>
											{{-- <td class="text-center"></td> --}}
										</tr>

										<tr>
											<td class='text-center'>3</td>
											<td>Hybrid Monosex Pungas Fry</td>
											<td style='padding: 0px; text-align: center;'> @if($result->hybrid_monosex_pungas_qty!='') {{ number_format(($result->hybrid_monosex_pungas_qty + $result->pungas_complementary_qty ),0) }} @else - @endif</td>
											<td class="text-center">@if($result->hybrid_monosex_pungas_qty!='') 1.30 @else - @endif</td>
											<td class="text-center">@if($result->hybrid_monosex_pungas_qty!='') {{ number_format(($result->hybrid_monosex_pungas_qty+ $result->pungas_complementary_qty) * '1.30',0) }} @else - @endif</td>
											{{-- <td class="text-center"></td> --}}
										</tr>

										<tr>
											<td class='text-center'>4</td>
											<td>Complementary (5%)</td>
											<td style='padding: 0px; text-align: center;'> @if($result->pungas_complementary_qty!=''){{ number_format(($result->pungas_complementary_qty) ,0) }} @else - @endif </td>
											<td class="text-center">-</td>
											<td class="text-center">-</td>
											{{-- <td class="text-center"></td> --}}
										</tr>

										@php 
										$totalAmount = (($result->hybrid_monosex_pungas_qty+ $result->pungas_complementary_qty) * '1.30') + (($result->hybrid_monosex_tilapia_qty + $result->tilapia_complementary_qty) * '1.30');

										$totalQuantity = ($result->hybrid_monosex_tilapia_qty + $result->tilapia_complementary_qty + $result->hybrid_monosex_pungas_qty + $result->pungas_complementary_qty);

										@endphp
										<tr>
											<td class='text-center'></td>
											<td class="text-center"><b>Total</b></td> 
											<td style='padding: 0px; text-align: center;'></td>
											<td class="text-center"><b> </b></td>
											<td class="text-center"><b> 
												{{ number_format($totalAmount,0) }}


											 </b></td>
											{{-- <td class="text-center"><b>  </b></td> --}}
										</tr>
									</tbody>
								</table>

								<table>
									<tr>
										<td colspan="2" width="50%">Less : Commission  &nbsp;&nbsp; {{ $totalQuantity }} x 0.10</td>
										<td width="0%"> &nbsp; </td>
										<td> &nbsp; </td>
										<td style="border-bottom: 1px dotted #000; text-align: center;"> 
										@php
										$lessCommission = $totalQuantity * '0.10';
										echo number_format($lessCommission,0);

										$lessCarriageOut =0;
										if($result->delivery_charge=='Yes')
										{
											$lessCarriageOut  = $totalQuantity * $result->carriage_charge;
											$netPayableAmount = $totalAmount - ($lessCommission + $lessCarriageOut);
										}
										else
										{
											$netPayableAmount = $totalAmount - $lessCommission;
										}
										@endphp
									</td>
									</tr>
									<tr>
										<td colspan="2">Less : Carriage Out  @if($result->delivery_charge=='Yes')&nbsp;&nbsp; {{ $totalQuantity }} x {{ $result->carriage_charge }} @endif </td>
										<td width="0%"> &nbsp; </td>
										<td> &nbsp; </td>
										<td style="border-bottom: 1px dotted #000; text-align: center;">
											@if($result->delivery_charge=='Yes')
											  {{ number_format($lessCarriageOut,0) }}
											@else
											0
											@endif
										</td>
									</tr>
									<tr>
										<td colspan="2">Net Payable Amount</td>
										<td width="0%"> &nbsp; </td>
										<td> &nbsp; </td>
										<td style="border-bottom: 1px dotted #000; text-align: center;"><b>{{ number_format($netPayableAmount,0) }}</b></td>
									</tr>
									<tr>
										<td colspan="1" width="200">Inwords : Taka</td>
										<td width="520" style=" float: left; border-bottom: 1px dotted #000; text-align: left; padding-left: 5px;padding-right: 5px;">{{ ucwords($converter->convert($netPayableAmount)) }}</td>
									</tr>								
								</table>
								
								<p>&nbsp;</p>
								<table class='table' style='border-bottom: 0px; float: left;'>
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