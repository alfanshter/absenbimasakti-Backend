<!DOCTYPE html>
<html>
<head>
    <title>Overtime Work</title>
</head>
<body>
    <div style="border:rgb(0, 0, 0); border-width:5px; border-style:solid;">
        <div style="border:rgb(0, 0, 0); border-width:1px; margin: 2px; border-style:solid;">
            <div align="center" style="border:rgb(0, 0, 0); border-width:2px; padding-bottom: 5px; margin: 8px 12px 8px 12px; border-style:solid;">
                <table width="100%">
                    <tr>
                        <td><img src="{{ public_path('images/header.png') }}" alt="" width="100%"></td>
                    </tr>
                    <tr>
                        <th><h4><u>FORM KERJA LEMBUR</u><br>Overtime Work Form</h4></th>
                    </tr>
                </table>
            </div>
            <div style="margin:16px">
                <p><u>Bersama Surat ini Saya yang bertanda tangan di bawah ini :</u><br>With this letter I the undersigned below</p>
                <table width="100%" style="margin: 10px;">
                    <tr>
                        <td width="15%"><u><strong>Nama</strong></u><br><i>Name</i></td>
                        <td width="75%">: {{ $overtime->name }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><u><strong>NIK</strong></u><br><i>Registration</i></td>
                        <td width="75%">: {{ $overtime->nik }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><u><strong>Departemen</strong></u><br><i>Departement</i></td>
                        <td width="75%">: {{ $overtime->department }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><u><strong>Jabatan</strong></u><br><i>Position</i></td>
                        <td width="75%">: {{ $overtime->position }}</td>
                    </tr>
                </table>
            </div>
            <div style="margin:16px">
                <table width="100%">
                    <tr>
                        <td width="75%"><u>Agar melaksanakan kerja lembur untuk menyelesaikan tugas pada bagian</u><br><i>In order to carry out overtime work to complete tasks in the</i></td>
                        <td width="25%">: {{ $overtime->complete }}</td>
                    </tr>
                </table>
            </div>
            <div style="margin:16px">
                <table width="100%" style="margin: 10px;">
                    <tr>
                        <td width="30%"><u><strong>Tanggal Lembur</strong></u><br><i>Overtimes Date</i></td>
                        <td width="70%">: {{ $overtime->o_date }}</td>
                    </tr>
                    <tr>
                        <td width="30%"><u><strong>Mulai dari Pukul</strong></u><br><i>Starting at</i></td>
                        <td width="70%">: {{ $overtime->o_start_date }} &nbsp; <strong>s.d</strong> &nbsp; {{ $overtime->o_start_date_to }}</td>
                    </tr>
                    
                    <tr>
                        <td width="30%" rowspan="2"><u><strong>Alasan Lembur</strong></u><br><i>Overtime Reason</i></td>
                        <td width="70%">: {{ $overtime->o_reason }}</td>
                    </tr>
                </table>
            </div>
            <p style="margin:40px 16px 10px 30px"><u>Harap dilaksanakan surat perintah ini dengan penuh tanggung jawab.</u><br><i>Please carry out this order with full responsibility</i></p>
            <p style="margin:20px 16px 16px 16px"><u>Demikian permohonan ini saya buat untuk mendapatkan pertimbangan sebagaimana mestinya</u><br><i>This, I make this request to get proper consideration</i></p>
            <div style="margin: 40px 150px 20px 150px;" align="center">
                <table style="border: 1px solid black; border-collapse: collapse;" width="100%">
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border-right: 1px solid;" width="50%" height="80px"></th>
                            <th style="border-collapse: collapse; border-top: 1px solid;" width="50%"></th>
                        </tr>
                        <tr>
                            <th style="border-collapse: collapse; border-right: 1px solid;">Team Leader</th>
                            <th style="border-collapse: collapse; border-right: 1px solid;">Site Manager/Engineer</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <p style="text-align: center"><u>Mengetahui</u><br><i>Acknowledge</i></p>
            <div style="margin: 10px 150px 20px 150px;" align="center">
                <table style="border: 1px solid black; border-collapse: collapse;" width="100%">
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border-right: 1px solid;" width="50%" height="80px"></th>
                            <th style="border-collapse: collapse; border-top: 1px solid;" width="50%"></th>
                        </tr>
                        <tr>
                            <th style="border-collapse: collapse; border-right: 1px solid;">Director</th>
                            <th style="border-collapse: collapse; border-right: 1px solid;">USER</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>