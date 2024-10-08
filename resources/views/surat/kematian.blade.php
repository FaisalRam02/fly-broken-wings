<!DOCTYPE html>
<html>
<head>
    <title>Surat Keterangan Kematian</title>
    <style>
         @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            color: #000000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .header p {
            margin: 0;
            padding: 0;
            line-height: 1.2;
        }

        .header .ler {
            position: absolute;
            top: 20;
            left: 0;
            right: 0;
        }

        .nigga {
            position: absolute;
            top: 53;
            left: 0;
            right: 0;
        }

        .header img {
            width: 700px;
            height: auto;
            margin-top: 5px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }

        .content {
            margin: 20px 0;
        }

        .content table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        .content td {
            padding: 5px;
            vertical-align: top;
        }

        .content .label {
            width: 30%;
            font-weight: bold;
        }

        .signature {
            margin-top: 60px;
            text-align: right;
        }

        .signature p {
            margin: 0;
        }
        
        .signature hr {
            margin-top: 1x;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="ler">
            <p style="font-family: Arial, sans-serif; font-size: 22px ; ">PEMERINTAH KABUPATEN GARUT</p>
            <p style="font-family: Arial, sans-serif; font-size: 20px ; ">KECAMATAN TAROGONG KIDUL</p>
            <p style="font-family: Arial, sans-serif; font-size: 18px ; font-weight: bold;">DESA KEMATIAN</p>
            <div class="nigga">
            <p style="font-family: Arial, sans-serif; font-size: 10px ; ">Jalan Perenungan No. 888 Kode Pos 10001</p>
            </div>
        </div>
        <img src="{{ public_path('storage/kop.png') }}" alt="Logo">
    </div>

    <div class="title">
        Surat Keterangan Kematian
        <hr style="width: 265px; border: 1px solid black; margin-center: 0;">
        Nomor:474/8-KEL/XI/2024
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Kematian Kecamatan Pemikiran Kabupaten Perwujudan, dengan ini menerangkan bahwa:</p>
        <table>
            <tr>
                <td class="label">Nama</td>
                <td>: {{ $penduduk->nama }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td>: {{ $penduduk->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td class="label">Tempat/Tanggal Meninggal</td>
                <td>: {{ $penduduk->tempat_lahir }}, {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Agama</td>
                <td>: {{ $penduduk->agama }}</td>
            </tr>
            <tr>
                <td class="label">Status Perkawinan</td>
                <td>: {{ $penduduk->status_perkawinan }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td>: {{ $penduduk->pekerjaan->nama_pekerjaan }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td>: {{ $penduduk->alamat_spesifik }}</td>
            </tr>
        </table>
        <p>Adalah benar Penduduk Desa Kematian Kecamatan Pemikiran Kabupaten Perwujudan, dan benar orang diatas tersebut telah mati dan kami selayaknya keluarga almarhum/almarhumah ingin membuat Akta Kematian.</p>
        <p>Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
    </div>


    <div class="signature">
        <p>Garut, {{ now()->format('d F Y') }}</p>
        <p>Kepala Desa Kematian,</p>
        <br><br><br>
        <p><strong>Faisal, SK.</strong></p>
        <hr style="width: 138px; border: 1px solid black; margin-right: 0;">
        <p>NIP. 089 KAPAN KAPAN</p>
    </div>
</body>
</html>