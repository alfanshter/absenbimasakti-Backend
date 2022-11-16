<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style type="text/css">
        table {
            width: 100%;
            margin-top: 20px;
        }

        .tg {
            border-collapse: collapse;
            border-color: #ccc;
        }

        .tg td {
            background-color: #fff;
            border-color: #ccc;
            border-style: solid;
            border-width: 1px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            word-break: normal;
        }

        .tg th {
            background-color: #f0f0f0;
            border-color: #ccc;
            border-style: solid;
            border-width: 1px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            word-break: normal;
        }


        .tg .tg-pht7 {
            border-color: inherit;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            text-align: center;
            vertical-align: middle;
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: center;
            vertical-align: middle
        }

        .tg .th-header {
            border-color: black;

        }

        .tg .tg-q9j0 {
            border-color: black;
            font-size: 14px;
            text-align: center;
            vertical-align: middle;
            padding-bottom: 10px;
            padding-top: 10px;

        }

        .tg .tg-9wq8 {
            text-align: center;
            border-color: #ffffff;
            vertical-align: middle;
            padding-bottom: 20px;
        }
    </style>

    <table class="tg">
        <thead>
            <tr>
                <th class="th-header" colspan="7">
                    <img src="{{public_path('storage/foto/header.png')}}" alt="Image" style="width: 100%;">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="tr-header">
                <td class="tg-q9j0" colspan="7"><span style="font-weight:bold">LAPORAN ABSENSI</span><br>
                    <hr style="width: 140px;"><span style="font-weight:bold">ATTENDENCE</span>
                </td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <td colspan="7" style="background-color: #FFFFFF;padding-top: 20px;border-color:#fff"></td>
            </tr>
            <tr>
                @if($starts_at!=null && $ends_at!=null )
                <td colspan="7" style="border-left-color: #FFFFFF;border-right-color:#FFFFFF;padding-bottom:20px"> Date : {{$starts_at}} to {{$ends_at}}</td>
                @endif
            </tr>
            <tr>
                <th class="tg-0pky">No</th>
                <th class="tg-pht7">Group</th>
                <th class="tg-pht7">Date</th>
                <th class="tg-pht7">Check In</th>
                <th class="tg-pht7">Picture In</th>
                <th class="tg-pht7">Check Out</th>
                <th class="tg-pht7">Picture Out</th>
            </tr>
            @foreach($attendence as $data)
            <tr>
                <td class="tg-0pky">{{$loop->iteration}}</td>
                <td class="tg-pht7">{{$data->nama_grup}}</td>
                <td class="tg-pht7">{{$data->date}}</td>
                <td class="tg-pht7">{{$data->check_in}}</td>
                <td class="tg-pht7"><img style="width: 100px; height:100px" src="{{public_path('storage/'.$data->picture_in)}}" alt="" srcset=""></td>
                <td class="tg-pht7">{{$data->check_out}}</td>
                <td class="tg-pht7"><img style="width: 100px; height:100px" src="{{public_path('storage/'.$data->picture_out)}}" alt="" srcset=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>