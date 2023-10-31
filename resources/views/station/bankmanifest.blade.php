
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Advantage Management Definition</title>
    <link rel="stylesheet" href="/grade/style.css" media="all" />
    <style>.clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 16cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }</style>
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{url('/assets/images/logo.png')}}">
    </div>
{{--    <h1>PAYSLIP For the Month of {{$payslip[0]->month.' '.$payslip[0]->year}}</h1>--}}
    <div id="company" class="clearfix">
{{--        <div>{{$payslip[0]->seeker->organization->name}}</div>--}}



    </div>
    @php
        $date= explode('-', $manifest->send_date);
    @endphp
    <div id="project">
        <div class="service">{{$date[2].''. date("S", mktime(0, 0, 0, $date[2], 10)).' '. date("F", mktime(0, 0, 0, $date[1], 10)).' '. $date[0] }}</div>
        <div class="service">The Manager </div>
        <div class="service">{{$manifest->bank_name}} </div>
        <div class="service">{{$manifest->location_bank}} </div>
        <div class="service">Dear sir/ma, </div>
        <div style="height:18px;  margin-left: 50px;"> Letter of Instruction</div>
        <p></p>
        <div style="height:58px; width: 200px;  vertical-align:middle">Warm greetings. Please take this as authorization to debit {{$manifest->account_name}} with account number {{$manifest->account_number}} ,
            <br>with the sum of {{$manifest->accounts->sum('amount')}} and credit the accounts stated below:</div>
    </div>

</header>
<main>

    <table>

        <thead>
        <tr>
            <th class="service">Account Name</th>
            <th></th>
            <th class="service">Account Number</th>
            <th></th>
            <th class="service">Amount</th>
            <th></th>

  
        </tr>
        </thead>
        <tbody>
        @foreach($manifest->accounts as $accounts)
        <tr>
            <td class="service">{{$accounts->account_name}}</td>
            <td class="qty"></td>
            <td class="service"> {{$accounts->account_number}}</td>
            <td class="unit"></td>
            <td class="unit">N{{$accounts->amount}}</td>
           
           
        </tr>


        @endforeach



       

       
       <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">N{{$manifest->accounts->sum('amount')}}</td>
        </tr>
        </tbody>
    </table>
    <div id="notices">

        <div class="notice">Thank you.</div>
        <p></p>
        <div class="notice">
            <span style="float: left"> Authorized Signatory</span>
            <span style="float: right"> Authorized Signatory</span>
        </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>