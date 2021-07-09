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
    <table border="1">
    <thead>
        <tr>
            <th>Sl No.</th>
            <th>Kyrteng Agent</th>
            <th>Mobile/Tv No</th>
            <th>Company</th>
            <th>Tarik</th>
            <th>Plan Value</th>
            <th>Recharge Value</th>
            <th>Jingkynthoh</th>
        </tr>
        </thead>
        @foreach ($mrt_rc as $item)
        <tr>
            <td align="right">{{$item->id}}</td>
            <td>{{$item->MrtAgent->kyrteng}}</td>
            <td align="right">{{$item->mrt_rc_no}}</td>
            <td>{{$item->MrtServiceProvider->service_provider}}</td>
            <td>{{$item->date}}</td>
            <td align="right">@php $plan_val[]=$item->MrtPlanValue->plan_value_edit(); @endphp {{$figure->format($item->MrtPlanValue->plan_value_edit())}}</td>
            <td align="right">@php $rc_val[]=$item->MrtPlanValue->rechage_value; @endphp {{$figure->format($item->MrtPlanValue->rechage_value)}}</td>
            <td>{{$item->remark}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td align="right">{{$figure->format(array_sum($plan_val))}}</td>
            <td align="right">{{$figure->format(array_sum($rc_val))}}</td>
            <td></td>
        </tr>
        </table>
    </body>
    <script>
    window.print();
</script>
</html>