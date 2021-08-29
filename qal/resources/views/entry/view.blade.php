<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      {{-- <h4 class="page-title">History Page</h4> --}}
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <button type="button" class="btn btn-success mr-2" onclick="printDiv()"> <i class="fa fa-print" aria-hidden="true"></i> Print</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">

  <div class="card" id="printableAreaM">
    <div class="card-body">
      
      <div class="row">
        <div class="col-12 table-responsive">
          <div class="card">
            <div class="card-body" style="padding: 0px;">
              <div class="table-responsive">
                  <table width="100%">
                    <thead>
                      <tr class="text-center">
                        <th colspan="9"><h1> Quality Integrated Agro Limited </h1></th>
                      </tr>
                      <tr class="text-center">
                        <th class="text-center" colspan="9">House-14, Road-07, Sector-04, Utttara, Dhaka</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr class="text-center">
                        <th class="text-center" colspan="9">Home Delivery Lead Conversion Ratio</th>
                      </tr>
                      <tr class="text-center">
                        <th colspan="9">{{ date('d-m-Y', strtotime($fromDate)) }} &nbsp; To &nbsp; {{ date('d-m-Y', strtotime($toDate)) }}</th>
                      </tr>
                    </tbody>
                  </table>
                  
                  <table cellpadding="0" cellpadding="0" class="table table-hover table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Lead</th>                      
                        <th>New Lead</th>
                        <th>Existing Lead</th>
                        <th>Total Conversion</th>
                        <th>Total Query</th>
                        <th>Total Lead</th>                      
                        <th>Ratio</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $sl=0; $rowTotal=1; $date='';@endphp
                      @foreach($results as $results)
                      @php
                      $totalLead = $results->total_new + $results->total_queries + $results->total_old;
                      $totalConversion = $results->total_new + $results->total_old;
                      
                      $sl++;
                      @endphp
                      <tr>
                        <td>{{ $sl }}</td>
                        <td>{{ $results->date }}</td>
                        <td>{{ $results->lead }}</td>                      
                        <td class="text-center">{{ $results->total_new }}</td>
                        <td class="text-center">{{ $results->total_old }}</td>
                        <td class="text-center">{{ $totalConversion }}</td>
                        <td class="text-center">{{ $results->total_queries }}</td>
                        <td class="text-center">{{ $totalLead }}</td>                      
                        <td class="text-center">{{ round(($totalConversion / $totalLead)*100) }}%</td>
                      </tr>
                     
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