<html>
    <head>
        <style>
            table {
                width: 100%;
                border: 1px solid black;
                border-collapse: collapse;
                page-break-inside: auto
            }
        </style>
    </head>
<body>
        @php
            $figure=new NumberFormatter("en_IN",NumberFormatter::CURRENCY);
            $figure->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS,2);
        @endphp
        <table style="border: 0px solid black;">
            <thead>
                <tr>
                    <th>KABA RECHARGE MOBILE BAD TV JONG I {{strtoupper($mrt_rc->first()->MrtAgent->kyrteng)}} NA KA BYNTA U BNAI {{date_format(date_create($month),"m-Y")}}</th>
                </tr>                
            </thead>
            <tr>
                <td>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Mobile/Tv No</th>
                                <th>Company</th>
                                <th>Tarik</th>
                                <th>Recharge Value</th>
                                <th>Jingkynthoh</th>
                            </tr>
                        </thead>
                        @foreach ($mrt_rc as $item)
                        <tr>
                            <td align="center">{{$loop->iteration}}</td>
                            <td align="center">{{$item->mrt_rc_no}}</td>
                            <td align="center">{{$item->MrtServiceProvider->service_provider}}</td>
                            <td align="center">{{date_format(date_create($item->date),"j-m-Y")}}</td>
                            <td align="right">@php $rc_val[]=$item->MrtPlanValue->rechage_value; @endphp {{$figure->format($item->MrtPlanValue->rechage_value)}}</td>
                            <td>{{$item->remark}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><B>Total</B></td>
                            <td align="right"><B>@if(isset($rc_val)) {{$figure->format(array_sum($rc_val))}} @endif</B></td>
                            <td align="right"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    <script>
    window.print();
</script>
</html>