<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .wrap {
            width: 100%;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <h3 style="text-align: center">
            KARTU PINJAMAN ANGGOTA <br>
            KOPERASI JASA LOHJINAWI KARYA MANDIRI
        </h3>

        <div class="wrap">
            <table>
                <tr>
                    <td style="width: 50%">
                        <table>
                            <tr>
                                <th style="text-align: left; width: 50%">NO PINJAMAN</th>
                                <td style="text-align: left; width: 50%"><b>:</b> {{ $pinjaman->id }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left">NOMOR ANGGOTA</th>
                                <td style="text-align: left"><b>:</b> {{ $pinjaman->nama }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left">NAMA ANGGOTA</th>
                                <td style="text-align: left"><b>:</b> {{ $pinjaman->anggota->nama }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left">TANGGAL PINJAM</th>
                                <td style="text-align: left"><b>:</b> {{ date('d F Y', strtotime($pinjaman->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left">JATUH TEMPO</th>
                                <td style="text-align: left"><b>:</b> {{ date('d F Y', strtotime('+'. $pinjaman->jumlah_bulan.' month', strtotime($pinjaman->created_at))) }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 50%">
                        <table>
                            <tr>
                                <th style="text-align: left; width: 50%">BESAR PINJAMAN</th>
                                <td style="text-align: left; width: 50%"><b>:</b> Rp.{{ number_format($pinjaman->besar_pinjaman) }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left">JANGKA WAKTU</th>
                                <td style="text-align: left"><b>:</b> {{ $pinjaman->jumlah_bulan }} Bulan</td>
                            </tr>
                            <tr>
                                <th style="text-align: left">ANGSURAN</th>
                                <td style="text-align: left"><b>:</b> Rp.{{ number_format($pinjaman->angsuran_perbulan) }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left">TOTAL PINJAM</th>
                                @php
                                    $totalPinjam = $pinjaman->jumlah_bulan * $pinjaman->angsuran_perbulan;
                                @endphp
                                <td style="text-align: left"><b>:</b> Rp.{{ number_format($totalPinjam) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            

            
        </div>

        <div class="wrap">
            <table style="border-collapse: collapse">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000 !important">NO</th>
                        <th style="border: 1px solid #000 !important">TANGGAL</th>
                        <th style="border: 1px solid #000 !important">BULAN</th>
                        <th style="border: 1px solid #000 !important">BESAR ANGSURAN</th>
                        <th style="border: 1px solid #000 !important">PARAF</th>
                        <th style="border: 1px solid #000 !important">KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= $pinjaman->jumlah_bulan; $i++)
                        <tr>
                            <td style="border: 1px solid #000 !important; text-align: center">{{ $i }}</td>
                            <td style="border: 1px solid #000 !important"></td>
                            <td style="border: 1px solid #000 !important"></td>
                            <td style="border: 1px solid #000 !important"></td>
                            <td style="border: 1px solid #000 !important"></td>
                            <td style="border: 1px solid #000 !important"></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>