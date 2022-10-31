<!DOCTYPE html>
<html>
<head>
    <title>Internal Purchase Requestion</title>
</head>
<body style="border:rgb(0, 0, 0); border-width:5px; border-style:solid;">
    <div>
        <div style="border:rgb(0, 0, 0); border-width:2px; padding-bottom: 5px; margin: 8px 12px 8px 12px; border-style:solid;">
            <h4 align="center"><u>INTERNAL PURCHASE REQUESITION</u></h4>
        </div>
        <div style="margin:16px">
            <table width="100%">
                <tr>
                    <td width="15%"><u><strong>Diminta Oleh</strong></u><br><i>Requestioned By</i></td>
                    <td width="35%">: {{ $internal->requestioned_by }}</td>
                    <td width="15%"><u><strong>Lokasi Proyek</strong></u><br><i>Project Location</i></td>
                    <td width="35%">: {{ $internal->project_location }}</td>
                </tr>
                <tr>
                    <td width="15%"><u><strong>Tanggal</strong></u><br><i>Date</i></td>
                    <td width="35%">: {{ $internal->date }}</td>
                    <td width="15%"><u><strong>Alamat Lengkap</strong></u><br><i>Completed Address</i></td>
                    <td width="35%">: {{ $internal->completed_addres }}</td>
                </tr>
                <tr>
                    <td width="15%"><u><strong>Departemen</strong></u><br><i>Departement</i></td>
                    <td width="35%">: {{ $internal->department }}</td>
                    <td width="15%"></td>
                    <td width="35%"></td>
                </tr>
                <tr>
                    <td width="15%"><u><strong>Jabatan</strong></u><br><i>Position</i></td>
                    <td width="35%">: {{ $internal->position }}</td>
                    <td width="15%"></td>
                    <td width="35%"><td>
                </tr>
            </table>
        </div>
        <div style="margin:12px">
            <table style="border: 1px solid black; border-collapse: collapse;" width="100%">
                <thead>
                <tr>
                    <th style="border-collapse: collapse; border: 1px solid;" width="10%">Quantity</th>
                    <th style="border-collapse: collapse; border: 1px solid;" width="15%">Catalog</th>
                    <th style="border-collapse: collapse; border: 1px solid;" width="30%">Description</th>
                    <th style="border-collapse: collapse; border: 1px solid;" width="15%">Size</th>
                    <th style="border-collapse: collapse; border: 1px solid;" width="10%">Unit Price</th>
                    <th style="border-collapse: collapse; border: 1px solid;" width="20%">Amount</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $data)
                        
                    @endforeach
                    <tr>
                        <td style="border-collapse: collapse; border: 1px solid;" width="10%">{{ $data->quantity }}</td>
                        <td style="border-collapse: collapse; border: 1px solid;" width="15%">{{ $data->catalog }}</td>
                        <td style="border-collapse: collapse; border: 1px solid;" width="30%">{{ $data->description }}</td>
                        <td style="border-collapse: collapse; border: 1px solid;" width="15%">{{ $data->size }}</td>
                        <td style="border-collapse: collapse; border: 1px solid;" width="10%">{{ $data->unit_price }}</td>
                        <td style="border-collapse: collapse; border: 1px solid;" width="20%">{{ $data->amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style="margin:12px"><u>Perusahaan tidak akan memproses permintaan yang kurang lengkap</u><br><i>Company will not process incomplete requesition</i></p>
        <div style="margin: 10px 150px 20px 150px;" align="center">
            <table style="border: 1px solid black; border-collapse: collapse;" width = "100%">
                <thead>
                    <tr>
                        <th style="border-collapse: collapse; border: 1px solid;" width="50%" >USER</th>
                        <th style="border-collapse: collapse; border: 1px solid;" width="50%" ><i>Dept.Purchasing & Procurement</i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr height="100px">
                        <td style="border-collapse: collapse; border: 1px solid;" height="80px"></td>
                        <td style="border-collapse: collapse; border: 1px solid;" height="80px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style="text-align: center;"><i >Acknowledge</i></p>
        <div style="margin: 10px 350px 20px 350px;" align="center">
            <table style="border: 1px solid black; border-collapse: collapse;" width="100%">
                <thead>
                    <tr>
                        <th style="border-collapse: collapse; border: 1px solid;" width="100%">Director</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td height="80px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>