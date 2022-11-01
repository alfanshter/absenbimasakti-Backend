<!DOCTYPE html>
<html>
<head>
    <title>Hot Work Premit</title>
</head>
<body>
    <div style="border:rgb(0, 0, 0); border-width:2px; border-style:solid;">
        <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
            <tr>
                <th width="25%" style="border-collapse: collapse; border: 1px solid;"><img src="" alt=""></th>
                <tD width="45%" style="border-collapse: collapse; border: 1px solid; text-align: center;"><strong>IJIN BEKERJA DENGAN PANAS</strong>
                    <br><i>HOT WORK PERMIT</i></tD>
                <td width="30%" style="border-collapse: collapse; border: 1px solid;">No. : {{ $hot->ref_id }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-collapse: collapse; border: 1px solid;">Pekerjaan/ Job : {{ $hot->job }}</td>
                <td style="border-collapse: collapse; border: 1px solid;">Kontraktor/ Contractor : {{ $hot->contractor }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-collapse: collapse; border: 1px solid;">Lampirkan No Ijin Kerja/Attached with PTW No. : {{ $hot->attached_ptw_no }}</td>
                <td style="border-collapse: collapse; border: 1px solid;">Lokasi/ Location : {{  $hot->location }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <strong>A. Definisi Bekerja dengan Panas</strong> / <i>DEFINE TYPE OF HOT WORK</i>:                     
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 10px; border-bottom: 1px solid">
                    1. Pengelasan /Welding : (a). Las listrik /Arc Welding (b). Blender /Oxyacethylene Welding (c). Lainnya /Others.<br>
                    2. Peralatan dengan semburan api /Equipment with naked flame : (a). Busur api /Burning Torches (b). Lainnya /Others.<br>
                    3. Peralatan dengan elemen pemanas /Equipment with heated elements : (a). Solder /Soldering iron (b). Lainnya /Others.<br>
                    4. Pekerjaan berpotensi timbul percikan api /work which could produce incendiary sparks : (a). Grinding (b). Pemotongan /Cutting.<br>
                    5. Mesin/alat yg menggunakan bahan bakar /vehicles, tools & equipment powered by internal combustion engine.<br>
                    6. Peralatan listrik yg tdk perlu sertifikasi /non certified electrical equipment. (a). Hp/Handphone (b). Lainnya /Others.<br>
                    7. Lainnya /Others                   
                </td>
            </tr>
            <tr>
                <td colspan="3"><strong>B. Deskripsi Pekerjaan</strong> / BRIEF DESCRIPTION OF WORK TO BE DONE:</td>
            </tr>
            <tr>
                <td colspan="3">{{ $hot->brief_description }}</td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid"><strong>C. Peralatan Yg Harus disiapkan </strong>/ <i>EQUIPMENT CHECK</i>:</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 10px; border-bottom: 1px solid">1. Peralatan Yg Perlu Inspeksi / <i>Hot Work Service Equipment</i></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                        <tr>
                            <th width="4%" style="border: 1px solid black; border-collapse: collapse;">No</th>
                            <td width="24%" style="border: 1px solid black; border-collapse: collapse; text-align: center;"><Strong>Peralatan<br></Strong><i>Equipment</i></td>
                            <td width="24%" style="border: 1px solid black; border-collapse: collapse; text-align: center;"><Strong>No Inspeksi<br></Strong><i>Inspection No</i></td>
                            <td width="24%" style="border: 1px solid black; border-collapse: collapse; text-align: center;"><Strong>Di Inspeksi Oleh<br></Strong><i>Inspected by</i></td>
                            <td width="24%" style="border: 1px solid black; border-collapse: collapse; text-align: center;"><Strong>Tgl. Inspeksi<br></Strong><i>Inspection Date</i></td>
                        </tr>
                        @foreach ( $equipment as $data )
                        <tr>
                            <td style="border: 1px solid black; border-collapse: collapse;">{{ $loop->iteration }}</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->equipment }}</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->inspection_no }}</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->inspected_by }}</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">{{ $data->inspection_date }}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    2. Peralatan pemadam api /Fire Preventing & Fighting Equipment
                    <div style="margin-left: 15px;">
                        (a) APAR atau Hydrant dalam jangkauan 10m /Fire Exstinguishers, hydrant within 10m
                    </div>
                </td>
                <td style="text-align: end; padding-right: 10px;">{{ strtolower($data->fire_exs) }}</td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    3. Pelindung las untuk melindungi mata orang disekitar dan melindungi pecahan panas material. /Welding screening to protect eyes
                    of people near by and to prevent hot debris spouting out.
                </td>
                <td style="text-align: end; padding-right: 10px;">{{ strtolower($data->welding) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-collapse: collapse;">
                    <strong>D. Lingkungan Area Kerja Yg Harus di Cek / </strong><i>WORKING AREA CHECK & CLEARANCE</i>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    1. Terdapat material yg mudah terbakar /Flammable materials around, underneath Sudah diisolasi /Already cleared, isolated
                </td>
                <td colspan="2" style="padding-right: 10px; text-align: end;">{{ strtolower($data->wacc_flammable) }}</td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    2. Terdapat material yg mudah menyala /Combustible materials around, underneath Sudah diisolasi /Already cleared, isolated
                </td>
                <td colspan="2" style="padding-right: 10px; text-align: end;">{{ strtolower($data->wacc_combustible) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-collapse: collapse;">
                    <strong>E. Check Personel yang terlibat/ </strong><i>CHECK PERSONNEL PARTICIPATED:</i>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    1. Apakah personel yg bekerja merasa tdk sehat?/Does person who work feel unwell/problem with health check?
                </td>
                <td colspan="2" style="padding-right: 10px; text-align: end;">{{ strtolower($data->cpp_problem_health) }}</td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    2. Kecukupan APD/ Adequate PPEs: 
                    <br>&nbsp;&nbsp;&nbsp;(a) Pelindung mata, muka/ eye protector, face mask
                </td>
                <td colspan="2" style="padding-right: 10px; text-align: end;">{{ strtolower($data->cpp_adequote) }}</td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    3. Pekerja memahami prosedur keadaan darurat /Understand site emergency response procedure
                </td>
                <td colspan="2" style="padding-right: 10px; text-align: end;">{{ strtolower($data->cpp_understand_site) }}</td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 10px;">
                    4. Pekerja mengerti cara penggunaan APAR/hydrant /Know how to use fire exstinguisher, water hose reel
                </td>
                <td colspan="2" style="padding-right: 10px; text-align: end;">{{ strtolower($data->cpp_kextinguidsher) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-collapse: collapse;"><strong>F. Pencegahan Lain</strong> / OTHER PRECAUTIONS:</td>
            </tr>
            <tr>
                <td colspan="3">{{ $hot->other_precaution }}</td>
            </tr>
            <tr style="border-top: 1px solid black; border-collapse: collapse;">
                <td colspan="3">
                    <table width="100%">
                        <tr>
                            <td width="40%">
                                <strong>G. Periode Ijin</strong> / <i>VALID PERIOD: </i>
                             </td>
                             <td width="40%">
                                 Dari / <i>from</i>:&nbsp; Tanggal/ <i>Date</i>: {{ $vpf_date }}
                             </td>
                             <td width="20%">
                                 Jam/ <i>Time</i> : {{ $vpf_time }}
                             </td>
                        </tr>
                        <tr>
                            <td width="40%">
                             </td>
                             <td width="40%">
                                Sampai / <i>to</i>: Tanggal/ <i>Date</i>: {{ $vpt_date }}
                             </td>
                             <td width="20%">
                                 Jam/ <i>Time</i> : {{ $vpt_time }}
                             </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td width="40%" style="padding-left: 10px;">
                                Pemberi Ijin / <i>Issuer</i> : {{ $hot->issuer }}
                            </td>
                            <td width="40%" style="padding-left: 80px;">
                                &nbsp;Tanggal/ <i>Date</i>: {{ $vpd_date }}
                            </td>
                            <td width="20%">
                                Jam/ <i>Time</i> : {{ $vpd_date }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-collapse: collapse;">
                    <strong>H. Komitmen/ </strong><i>COMMITMENT :</i>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 10px;">
                    Saya telah memahami dan akan mematuhi scope & area kerja serta aspek safety seperti tersebut diatas.
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 10px;">
                    <i>We have understood and will obey the Scope of Work, Area Covered and Safety Aspects mentioned above.</i>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%">
                        <tr>
                            <td width="40%" style="padding-left: 10px;">
                                Pemberi Ijin / <i>Acceptor</i> : {{ $hot->c_acceptor }}
                            </td>
                            <td width="40%" style="padding-left: 80px;">
                                &nbsp;Tanggal/ <i>Date</i>: {{ $c_date }} 
                            </td>
                            <td width="20%">
                                Jam/ <i>Time</i> : {{ $c_time }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr style="border-top: 1px solid black; border-collapse: collapse;">
                <td colspan="2">
                    <strong>K. Pekerjaan dihentikan ( sebutkan alasan) / </strong><i>STOP WORKING (specify reason)</i> : <br> {{ $hot->stop_working }}
                </td>
                <td>
                    Dihentikan oleh/ <i>Stopped by</i> : {{ $hot->stoped_by }}
                </td>
            </tr>
            <tr style="border-top: 1px solid black; border-collapse: collapse;">
                <td colspan="3">
                    <strong>L. Serah Terima/</strong> <i>HANDOVER</i> : 
                </td>
            </tr>
            <tr>
                <td style="padding-left: 10px;" colspan="3">
                    Pekerjaan telah selesai, semua personel yg terlibat telah diberitahu , area sudah dibersihkan dan rapi
                </td>
            </tr>
            <tr>
                <td style="padding-left: 10px;" colspan="3">
                    <i>The task has been completed, all relevant persons informed and the site has been rearranged tidily.</i>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%">
                        <tr>
                            <td width="40%" style="padding-left: 10px;">
                                Pemberi Ijin / <i>Acceptor</i> : {{ $hot->h_acceptor }}
                            </td>
                            <td width="40%" style="padding-left: 80px;">
                                &nbsp;Tanggal/ <i>Date</i>: {{ $hc_date }}
                            </td>
                            <td width="20%">
                                Jam/ <i>Time</i> : {{ $hc_time }}
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="padding-left: 10px;">
                                Pemberi Ijin / <i>Issuer</i> : {{ $hot->h_issuer }}
                            </td>
                            <td width="40%" style="padding-left: 80px;">
                                &nbsp;Tanggal/ <i>Date</i>: {{ $hi_date }}
                            </td>
                            <td width="20%">
                                Jam/ <i>Time</i> : {{ $hi_time }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>