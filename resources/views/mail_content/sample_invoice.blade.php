<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
   </head>
   <style>
      #invoice{
      padding: 30px;
      }
      .invoice {
      position: relative;
      background-color: #FFF;
      min-height: 680px;
      padding: 15px
      }
      .invoice header {
      padding: 0px 0px 112px 0;
      margin-bottom: 51px;
      border-bottom: 1px solid #3989c6;
      }
      .invoice .company-details {
      text-align: right
      }
      .invoice .company-details .name {
      margin-top: 0;
      margin-bottom: 0
      }
      .invoice .contacts {
      margin-bottom: 20px
      }
      .invoice .invoice-to {
      text-align: left
      }
      .invoice .invoice-to .to {
      margin-top: 0;
      margin-bottom: 0
      }
      .invoice .invoice-details {
      text-align: right
      }
      .invoice .invoice-details .invoice-id {
      margin-top: 0;
      color: #3989c6
      }
      .invoice main {
      padding-bottom: 50px
      }
      .invoice main .thanks {
      margin-top: -100px;
      font-size: 2em;
      margin-bottom: 50px
      }
      .invoice main .notices {
      padding-left: 6px;
      border-left: 6px solid #3989c6
      }
      .invoice main .notices .notice {
      font-size: 1.2em
      }
      .invoice table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px
      }
      .invoice table td,.invoice table th {
      padding: 15px;
      background: #eee;
      border: 1px solid #ddd
      }
      .invoice table th {
      white-space: nowrap;
      font-weight: 400;
      font-size: 16px
      }
      .invoice table td h3 {
      margin: 0;
      font-weight: 400;
      color: #3989c6;
      font-size: 1.2em
      }
      .invoice table .qty,.invoice table .total,.invoice table .unit {
      text-align: right;
      font-size: 1.2em
      }
      .invoice table .no {
      color: #fff;
      font-size: 1.6em;
      background: #15b1bf;
      }
      .invoice table .unit {
      background: #ddd
      }
      .invoice table .total {
      background: #15b1bf;
      color: #fff
      }
      .invoice table tbody tr:last-child td {
      border: none
      }
      .invoice table tfoot td {
      background: 0 0;
      border-bottom: none;
      white-space: nowrap;
      text-align: right;
      padding: 10px 20px;
      font-size: 1.2em;
      border-top: 1px solid #aaa
      }
      .invoice table tfoot tr:first-child td {
      border-top: none
      }
      .invoice table tfoot tr:last-child td {
      color: #15b1bf;
      font-size: 1.4em;
      border-top: 1px solid #15b1bf;
      }
      .invoice table tfoot tr td:first-child {
      border: none
      }
      .invoice footer {
      width: 100%;
      text-align: center;
      color: #777;
      border-top: 1px solid #aaa;
      padding: 8px 0
      }
      @media print {
      .invoice {
      font-size: 11px!important;
      overflow: hidden!important
      }
      .invoice footer {
      position: absolute;
      bottom: 10px;
      page-break-after: always
      }
      .invoice>div:last-child {
      page-break-before: always
      }
      }
      td.celpad {
      background-color: #fff !important;
      font-weight:bold;
      }
      .col {
      width: 50%;
      float: left;
      /* padding-bottom: 36px; */
      }
   </style>
   <body>
      <!--Author      : @arboshiki-->
      <div id="invoice">
         <div class="invoice overflow-auto">
            <div style="min-width: 600px">
               <header>
                  <div class="row">
                     <div class="col">
                        <a target="_blank" href="">
                        <img src="{{ asset('theme_files/images/trentygo_logo.jpeg') }}" alt="" height="50"  class="logo-lg" style="padding: 10px;">
                        </a>
                     </div>
                     <div class="col company-details">
                        <h2 class="name">
                           <a target="_blank" href="">
                           trentygo
                           </a>
                        </h2>
                        <div>NO:7 Bharathi Street,Ellaipillaichavady,Pondicherry</div>
                        <div>97919876764</div>
                        <div>trentygo@gmail.com</div>
                     </div>
                  </div>
               </header>
               <main>
                  <table border="0" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td class="celpad">
                              Date
                           </td>
                           <td>
                           </td>
                           <td class="celpad">
                              Invoice Period 
                           </td>
                           <td>
                              00-ce24324325
                           </td>
                        </tr>
                        <tr>
                           <td colspan="2" class="celpad">
                              Bill To
                           </td>
                           <td colspan="2" class="celpad">
                              Customer Information
                           </td>
                        </tr>
                        <tr>
                           <td class="celpad">Customer Name:</td>
                           <td></td>
                           <td class="celpad">Customer Id:</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="celpad">32453254</td>
                           <td>00-2678</td>
                           <td class="celpad">Reservation Id:</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="celpad">Phone</td>
                           <td></td>
                           <td class="celpad">Invoice</td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
                  <table border="0" cellspacing="0" cellpadding="0">
                     <thead>
                        <tr>
                           <th>S No</th>
                           <th class="text-left">Rental Splits</th>
                           <th class="text-right">Description</th>
                           <th class="text-right">Actual Amount</th>
                           <th class="text-right">Paid Amount</th>
                           <th class="text-right">Balance Amount</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="no">01</td>
                           <td class="text-left">
                              <h3>Balance Founded</h3>
                           </td>
                           <td class="unit">$0.00</td>
                           <td class="qty">100</td>
                           <td class="unit">$0.00</td>
                           <td class="total">$0.00</td>
                        </tr>
                        <tr>
                           <td class="no">02</td>
                           <td class="text-left">
                              <h3>Due Amount</h3>
                           </td>
                           <td class="unit">$40.00</td>
                           <td class="qty">30</td>
                           <td class="unit">$0.00</td>
                           <td class="total">$1,200.00</td>
                        </tr>
                        <tr>
                           <td class="no">03</td>
                           <td class="text-left">
                              <h3>Acutal Amount</h3>
                           </td>
                           <td class="unit">$40.00</td>
                           <td class="qty">80</td>
                           <td class="unit">$0.00</td>
                           <td class="total">$3,200.00</td>
                        </tr>
                        <tr>
                           <td class="no">04</td>
                           <td class="text-left">
                              <h3> Balance Founded</h3>
                           </td>
                           <td class="unit">$40.00</td>
                           <td class="qty">20</td>
                           <td class="unit">$0.00</td>
                           <td class="total">$800.00</td>
                        </tr>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td colspan="5">SUBTOTAL</td>
                           <td>$5,200.00</td>
                        </tr>
                        <tr>
                           <td colspan="5">TAX 25%</td>
                           <td>$1,300.00</td>
                        </tr>
                        <tr>
                           <td colspan="5">GRAND TOTAL</td>
                           <td>$6,500.00</td>
                        </tr>
                     </tfoot>
                  </table>
                  <div class="thanks">Thank you!</div>
                  <div class="notices">
                     <div>NOTICE:</div>
                     <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                  </div>
               </main>
               <footer>
                  Invoice was created on a computer and is valid without the signature and seal.
               </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
         </div>
      </div>
   </body>
</html>