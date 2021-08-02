@extends('masterDashboard')
@section('content')


{{-- <header>
	Our Code World
</header> --}}

{{-- <footer>
    Software Generate Report | Design & Developed By : QFL IT, www.qfl.com.bd
</footer> --}}

<div class='row'>
	<div class='col-12' style="text-align: right;float: right;">
		<img src='{{URL::asset('resources/assets/images/printer.png')}}' width="20" height="20" id="printDiv" onclick="printDiv()" style="cursor: pointer;" title="Print">
	</div>
</div>

<main>
	<div class='container-fluid'>
		<div class='card'>
			<div class='card-body'>
				<div class='row'>
                    <div class='col-2'></div>
					<div class='col-9 table-responsive' id="section-to-print">
						<div class='card'>
							<div class='card-body' style='padding: 0px;'>
								<div class='table-responsive'>
									<table class="table table-responsive">
                                        <tr>
                                            <table>
                                                <tr>
                                                    <td width="22%"><img src="{{ url('resources/assets/images/fav.png') }}" style="width: 130px;height: 70px;"  id="quotationLogo"></td>
                                                    <td width="61%" class="text-center">
                                                        <b style="font-size: 20px;"> Quality Aquabreeds Limited </b> <br />
                                                        House 14, Road 7 Sector 4, Uttara Dhaka-1230, Bangladesh <br />
                                                        Overseas+88-02-41090390
                                                    </td>
                                                    <td class="align-bottom">
                                                        Date :  {{ date('d-m-Y', strtotime($result->added_date)) }} 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. <b style="font-size: 16px;">  {{ $result->serial_no }}  </b></td>
                                                    <td class="text-center">
                                                        <b style="font-size: 18px;"> Money Receipt </b>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </tr>
                                        <tr>
                                            <table width="100%" style="background: #F2F2F2; margin-top: 10px;">
                                                <tr>
                                                    <td style="padding: 0px 0px 0px 0px;">
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="210" style="padding: 0px 0px 0px 0px;">Received with thanks from M/S</td>
                                                                <td style="padding: 0px 0px 0px 0px;border-bottom: 1px dotted #000;">  {{ $result->cname }} </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0px 0px 0px 0px;">
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="95" style="padding: 0px 0px 0px 0px;">a sum of Taka</td>
                                                                <td style="padding: 0px 0px 0px 0px;border-bottom: 1px dotted #000;">  {{ number_format($result->amount,2) }} </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0px 0px 0px 0px;">
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="90" style="padding: 0px 0px 0px 0px;">By Cash/Cheque/Pay-order/No</td>
                                                                <td width="150" style="padding: 0px 0px 0px 0px;border-bottom: 1px dotted #000;"> Cash </td>

                                                                <td width="30" style="padding: 0px 0px 0px 0px;">drawn on</td>
                                                                <td width="100" style="padding: 0px 0px 0px 0px;border-bottom: 1px dotted #000;"> {{ $result->bname }} </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0px 0px 0px 0px;">
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="100" style="padding: 0px 0px 0px 0px;">on account of</td>
                                                                <td style="padding: 0px 0px 0px 0px;border-bottom: 1px dotted #000;"> {{ $result->note }} </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0px 0px 0px 0px;">
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="100" style="padding: 0px 0px 0px 0px;">Taka (in word) : </td>
                                                                <td class="taka" style="padding: 0px 0px 0px 0px;">  {{ ucwords($converter->convert($result->amount)) }} .</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                        </tr>
                                        <tr></tr>
                                    </table>
                                    <p>&nbsp;</p>

									<table class='table table-responsive'>
										<tr>
											<td width="1000" style="padding: 0px;">
												<table id='table' class='table-responsive' width='100%'>
													<tr>
														<td style="padding: 0px;"> Acceptance of cheque is subject to realization </td>
													</tr>													
												</table>
											</td>
											<td width="1000">&nbsp;</td>
											<td width="300" style="text-align: right; padding: 0px;">
												<table id='table' width='100%'>
													<tr>
														<td width="100%" height="70" style="border: 1px solid #000; text-align: center;padding: 0px;">
															Proof of receipt
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>

									<table class='table'>
										<tr>
											<td width="1000" style="padding: 0px;">
												<table id='table' class='table-responsive' width='100%'>
													<tr>
														<td style="border-top: 1px solid #000; padding: 0px;"> On behalf of Quality Aquabreeds Limited </td>
													</tr>
													
												</table>
											</td>
											
										</tr>
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
