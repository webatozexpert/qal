
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Requisition print copy</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style type="text/css">

      @font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

/*a {
  color: #0087C3;
  text-decoration: none;
}*/

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  text-align: center;
}

/*#logo {
  float: left;
  margin-top: 8px;
}*/

/*#logo img {
  height: 70px;
}*/

/*#company {
  text-align: center;
  
}*/


/*#details {
  margin-bottom: 50px;
}*/

/*#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}*/

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

/*#invoice {
  float: right;
  text-align: right;
}*/

/*#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}*/

/*#invoice .date {
  font-size: 1.1em;
  color: #777777;
}*/

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 10px;
  
  text-align: center;
  border: 5px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
  font-size: 1.2em;
}

table td {
  text-align: left;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #000000;
  font-size: 1em;
 
}

/*table .desc {
  text-align: left;
}
*/
table .unit {
  background: #DDDDDD;
}

table .qty {
}



table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

/*table tbody tr:last-child td {
  border: none;
}*/

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

/*table tfoot tr:first-child td {
  border-top: none; 
}*/

/*table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}*/

/*table tfoot tr td:first-child {
  border: none;
}*/

/*#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}*/

/*#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}*/

/*#notices .notice {
  font-size: 1.2em;
}
*/
footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}


    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        
      </div>
      <div id="company">
        <h2 class="name">Purchase Requisition</h2>
        <div>Branch Name : </div>
      </div>
      </div>
    </header>
   <main>
 <div class='card' id="section-to-print">
 
      <div ]lass='row'>
        <div class='col-12 table-responsive'>
          <div class='card'>
            <div class='card-body' style='padding: 0px;'>

              <div class='table-responsive'>
                

                <table class='table' cellspacing="0">
                  <tr>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                        <tr>
                          <td style='width: 150px'>Requisition No</td>
                          <td style='width: 150px'>: </td>
                        </tr>
                       
                        <tr>
                          <td>Branch Name</td>
                          <td style=''>: </td>
                        </tr>
                        <tr>
                          <td>Item Group</td>
                          <td style=''>: </td>
                        </tr>
                        <tr>
                          <td>Budget Name</td>
                          <td style=''>: </td>
                        </tr>
                      </table>
                    </td>
                    <td style='width: 30px;'>&nbsp;</td>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                        <tr>
                          <td style='width: 150px'>Date</td>
                          <td style='width: 150px'>: </td>
                        </tr>
                        <tr>
                          <td style='width: 150px'>Required Date</td>
                          <td style='width: 150px'>: </td>
                        </tr>
                        <tr>
                          <td>Priority</td>
                          <td style=''>: </td>
                        </tr>
                        <tr>
                          <td style='width: 150px'>Procurement Type</td>
                          <td style='width: 50px'>: </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>


                <table class='table table-bordered' cellspacing="0">
                  <thead >
                    <tr class="card-header">
                      <td class='text-center' style='vertical-align: middle;'>Sl#</td>
                      <td class='text-center' style='vertical-align: middle;'>Product Name </td>
                      <td class='text-center' style='vertical-align: middle;'>Units</td>
                      <td class='text-center' style='vertical-align: middle;'>Quality</td>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>1</td>
                      <td>Hybrid Monosex Telapia Fry</td>
                      <td>Pcs</td>
                        <td>900</td>
                    </tr>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>2</td>
                      <td>Hybrid Monosex Telapia Fry</td>
                      <td>Kg</td>
                        <td>100</td>
                    </tr>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>3</td>
                      <td>Hybrid Monosex Telapia Fry</td>
                      <td>job</td>
                        <td>500</td>
                    </tr>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>4</td>
                      <td>Hybrid Monosex Telapia Fry</td>
                      <td>coil</td>
                        <td>2</td>
                    </tr>
                  </tbody>
                </table>
                <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                 <table class='table' style='border-bottom: 0px;'>
                  <thead>
                    <tr>
                      <td style="text-align: left;">Note :</td>
                     
                    
                  </thead>
                </table>
                <p>&nbsp;</p>
                <table class='table' style='border-bottom: 0px;'>
                  <thead>
                    <tr>
                      <td width='50%'><b>Requisition By </b></td>
                     
                      <td width='50%'><b> Purchase Authorized By  </b></td>
                    </tr>
                    <tr>
                      <td>Signature </td>
                      <td>Signature </td>
                      
                    </tr>
                    <tr>
                      <td>Name :</td>
                      <td>Name :</td>
                      
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
</main>
    <footer>
      Printed From QAL 07-08-2021                                 Page 1 of 1
    </footer>
  </body>

</html>