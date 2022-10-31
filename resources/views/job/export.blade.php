<!DOCTYPE html>
<html>
<head>
    <title>Job Safety Analysis</title>
</head>
<body style="border:rgb(0, 0, 0); border-width:5px; border-style:solid;">
    <div style="border:rgb(0, 0, 0); border-width:1px; margin: 2px; border-style:solid; padding: 8px 12px 8px 12px;">
        <div align="center" style="border:rgb(0, 0, 0); border-width:2px; padding-bottom: 5px; margin: 8px 12px 8px 12px; border-style:solid;">
            <table width="100%">
                <tr>
                    <td><img src="{{ public_path('images/header.png') }}" alt="" width="100%"></td>
                </tr>
                <tr>
                    <th><h4>Job Safety Analysis</h4></th>
                </tr>
            </table>
        </div>
        <div>
            <p style="margin-bottom: 0;">No Reg : <strong>{{ $job->ref_id }}</strong></p>
            <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <td width="20%">Judul Pekerjaan <br><i>(Job Title)</i></td>
                    <td width="30%" style="border-right: 1px solid black;">: <strong>{{ $job->job_title }}</strong></td>
                    <td width="20%">Lokasi Pekerjaan <br><i>(Work Location)</i></td>
                    <td width="30%">: <strong>{{ $job->work_location }}</strong></td>
                </tr>
                <tr>
                    <td width="20%">Tim Kerja <br><i>(Team Work)</i></td>
                    <td width="30%" style="border-right: 1px solid black;"><strong>{{ $job->team_work }}</strong></td>
                    <td width="20%">Jumlah Personel Yang Bekerja <br><i>(The Number of Personnel Working)</i></td>
                    <td width="30%">: <strong>{{ $job->number_personal_working }}</strong></td>
                </tr>
                <tr>
                    <td width="20%">Verifikasi & Tanda Tangan Supervisor<br><i>(Verified by Leader / Supervisor Approval)</i></td>
                    <td width="30%" style="border-right: 1px solid black;">:............</td>
                    <td colspan="2">
                        <table width="100%">
                            <tr>
                                <td width="20%">Dibuat Oleh <br><i>(Prepared by)</i></td>
                                <td width="30%">: <strong>{{ $job->user_created }}</strong></td>
                                <td width="20%">Tanggal <br><i>(Date)</i></td>
                                <td width="30%">: <strong>{{ $job->created_at }}</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="20%">Tanda Tangan Manager<br><i>(Manager Approval)</i></td>
                    <td width="30%" style="border-right: 1px solid black;">:........</td>
                    <td width="20%">Review & Tanda Tangan oleh Safety Officer <br><i>(Review & Approval by Safety Officer)</i></td>
                    <td width="30%">:..........</td>
                </tr>
            </table>
            <br>
            <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <th colspan="6" width="100%" style="border: 1px solid black; border-collapse: collapse;">PERTANYAAN KHUSUS <i>(CRITICAL QUESTIONS)</i></th>
                </tr>
                <tr>
                    <td width="28%">Semua anggota siap bekerja ?<br><i>(Every One Capable to Work?)</i></td>
                    <td width="5%" style="border-right: 1px solid black; border-collapse: collapse; text-align: end; padding-right: 1%;"><strong>{{ strtoupper($job->every_one_capable_to_work) }}</strong></td>
                    <td width="29%">Potensi tumpahan / gas release telah dicegah?<br><i>(Potential Spill/Gas Released has been prevented?)</i></td>
                    <td width="5%" style="border-right: 1px solid black; border-collapse: collapse; text-align: end; padding-right: 1%;"><strong>{{ strtoupper($job->potensi_tumpahan) }}</strong></td>
                    <td width="28%">Skenario terburuk didiskusikan?<br><i>(Worst Case Discussed?)</i></td>
                    <td width="5%" style="border-right: 1px solid black; border-collapse: collapse; text-align: end; padding-right: 1%;"><strong>{{ strtoupper($job->work_case) }}</strong></td>
                </tr>
            </table>
        </div>
        <br>
        <div> 
            <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <th colspan="5" width="100%" style="border: 1px solid black; border-collapse: collapse;">PERTANYAAN KHUSUS <i>(CRITICAL QUESTIONS)</i></th>
                </tr>
                <tr>
                    <td width="5%" align="center" style="border: 1px solid black; border-collapse: collapse;"><strong>No</strong></td>
                    <td width="25%" align="center" style="border: 1px solid black; border-collapse: collapse;"><strong>LANGKAH PEKERJAAN</strong> <br><i>(SEQUENCE OF JOB STEPS)</i></td>
                    <td width="25%" align="center" style="border: 1px solid black; border-collapse: collapse;"><strong>BAHAYA & RESIKO</strong> <br><i>(HAZARDS & RISK)</i></td>
                    <td width="30%" align="center" style="border: 1px solid black; border-collapse: collapse;"><strong>BAGAIMANA MENCEGAH / MENGURANGI BAHAYA & RESIKO</strong> <br><i> (HOW TO REDUCE HAZARDS & RISK)</i></td>
                    <td width="15%" align="center" style="border: 1px solid black; border-collapse: collapse;"><strong>PIC</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;" rowspan="3">1</td>
                    <td style="border: 1px solid black; border-collapse: collapse;" rowspan="3">
                        Mempersiapkan peralatan listrik 
                        <b(membawa tangga kerja)
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        1a. (h) tangan terjepit/terhimpit peralatan
                        <br>  (r) memar / retak
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        1. Pekerja yang membawa tangga menggunakan sarung tangan
                    <td style="border: 1px solid black; border-collapse: collapse;" rowspan="3"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;">2. (H) Tangga membentur properti lain
                        <br>(R) properti rusak
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        2. Pekerja membawa tangga secara hati-hati dengan cara angkat yang aman
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        3. (H) Tangga mengenai orang lain
                        <br>(R) cidera pada orang lain
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        3. Pekerja membawa tangga secara hati-hati dengan cara angkat yang aman
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;" rowspan="3">2</td>
                    <td style="border: 1px solid black; border-collapse: collapse;" rowspan="3">
                        Mematikan listrik dari pusat MCB dengan cara naik tangga
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        1. (H) Orang tersetrum, 
                        <br>(R) Pingsan / Fatality
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        1. memakai sarung tangan kulit dan sepatu karet
                    <td style="border: 1px solid black; border-collapse: collapse;" rowspan="3"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        2. (H) Orang terjatuh, 
                        <br>(R) Nyeri pinggang / Patah Tulang / Pingsan / Fatality
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        2. a. Memposisikan tubuh di pijakan yang ergonomi dan aman
                        <br>2. b. Menggunakan alas sepatu yang tidak licin
                        <br>2.c. memastikan pijakan tangga tidak licin
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        3. (H) Tombol pada pusat MCB bisa dinyalakan orang lain
                        <br>(R) pekerja yang memperbaiki listrik bisa tersengat dan pingsan atau fatalilty
                    </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">
                        3. Pasang Lock Out Tag Out (LOTO)
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <td colspan="8" style="text-align: center; border: 1px solid black; border-collapse: collapse;"><strong>ALAT PELINDUNG DIRI YANG DIPERLUKAN UNTUK PEKERJAAN INI <i>(PPE will be use / wear on this job)</i></strong></td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;" width="15%">Helmet Safety</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;" width="10%">
                        @if (in_array('Helmet Safety', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;" width="15%">Vest Jacket</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;" width="10%">
                        @if (in_array('Vest Jacket', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;" width="15%">Self Breathing Apparatus</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;" width="10%">
                        @if (in_array('Self Breathing Apparatus', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;" width="15%">Lock Out Tag Out</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;" width="10%">
                        @if (in_array('Lock Out Tag Out', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Safety Shoes</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Safety Shoes', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Safety Harness</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Safety Harness', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Apron</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Apron', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;" rowspan="3">Ijin Kerja (Pengelasan/ Confined Space)? (Permit to Work (hot work, confined spaces)</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;" rowspan="3">
                        @if (in_array('Ijin Kerja', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Safety Glasses</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Safety Glasses', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Half Face Shield</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Half Face Shield', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Cover All / Tyvex / Tychem</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Cover All / Tyvex / Tychem', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Cotton Glove</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Cotton Glove', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Goggle</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Goggle', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Eye shower</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Eye shower', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Rubber Glove</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Rubber Glove', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Dust Mask</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Dust Mask', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">APAR (Fire Extinguisher)</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('APAR', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;" rowspan="2">Lain-Lain (other) :</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;" rowspan="2">
                        @if (in_array('Other', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Leather Glove</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Leather Glove', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Chemical Respirator</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Chemical Respirator', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                    <td style="border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">Barricade Tape / Safety line</td>
                    <td style="border-bottom: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse; text-align:center;">
                        @if (in_array('Barricade Tape', $ppe))
                        <img src="{{ public_path('images/recent_check.png') }}" height="20px">
                        @else
                        <img src="{{ public_path('images/recent.png') }}" height="20px">
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <td colspan="6" style="text-align: center; border: 1px solid black; border-collapse: collapse;"><strong>AFTER ACTION REVIEW (AAR)</strong></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; border-collapse: collapse;" width="15%">Date</th>
                    <th style="border: 1px solid black; border-collapse: collapse;">
                        LANGKAH PEKERJAAN
                        <br><i>(SEQUENCE OF JOB STEPS)</i>
                    </th>
                    <th style="border: 1px solid black; border-collapse: collapse;" width="17%">
                        LANGKAH PEKERJAAN
                        <br><i>(SEQUENCE OF JOB STEPS)</i>
                    </th>
                    <th style="border: 1px solid black; border-collapse: collapse;" width="17%">
                        POTENSI BAHAYA & RESIKO
                        <br><i>(POTENTIAL HAZARDS & RISK)</i>
                    </th>
                    <th style="border: 1px solid black; border-collapse: collapse;" width="17%">
                        BAGAIMANA MENGURANGI POTENSI BAHAYA & RESIKO
                        <br><i>(HOW TO REDUCE POTENTIAL HAZARDS & RISK)</i>
                    </th>
                    <th style="border: 1px solid black; border-collapse: collapse;" width="17%">PIC</th>
                </tr>
                @foreach ($aar as $data )
                    
                <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->date }}</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->sequence_of_job_step }}</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->reduce_potential }}</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->reduce_potential }}</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->pic }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>