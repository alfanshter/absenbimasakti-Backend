<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        <tbody>
            <tr class="tr-header">
                <td class="tg-q9j0" colspan="10"><span style="font-weight:bold">LAPORAN INTERNAL PURCHASE REQUESTION</span> </td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <td colspan="10" style="background-color: #FFFFFF;padding-top: 20px;border-color:#fff"></td>
            </tr>
            <tr>
                <th class="tg-pht7">No</th>
                <th class="tg-pht7">Ref ID</th>
                <th class="tg-pht7">Date</th>
                <th class="tg-pht7">Departmen</th>
                <th class="tg-pht7">Position</th>
                <th class="tg-pht7">Project Location</th>
                <th class="tg-pht7">Completed Address</th>
                <th class="tg-pht7">User Created</th>
                <th class="tg-pht7">Created Date</th>
                <th class="tg-pht7">Status</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <td class="tg-pht7">{{$loop->iteration}}</td>
                <td class="tg-pht7">{{$data->ref_id}}</td>
                <td class="tg-pht7">{{$data->date}}</td>
                <td class="tg-pht7">{{$data->department}}</td>
                <td class="tg-pht7">{{$data->position}}</td>
                <td class="tg-pht7">{{$data->project_location}}</td>
                <td class="tg-pht7">{{$data->completed_addres}}</td>
                <td class="tg-pht7">{{$data->user_created}}</td>
                <td class="tg-pht7">{{$data->created_at}}</td>
                <td class="tg-pht7">{{$data->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>