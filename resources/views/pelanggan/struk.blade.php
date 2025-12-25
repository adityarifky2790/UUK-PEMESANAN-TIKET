<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Struk Pembelian</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .box { max-width: 400px; margin: auto; border: 1px solid #ccc; padding: 20px; }
    h2 { text-align: center; }
</style>
</head>
<body onload="window.print()">

<div class="box">
    <h2>Struk Pembelian Tiket</h2>
    <hr>

    <p><strong>Nama Pemesan:</strong> {{ $user }}</p>
    <p><strong>Nama Event:</strong> {{ $pesanan->tiket->nama_event }}</p>
    <p><strong>Jumlah Tiket:</strong> {{ $pesanan->jumlah }}</p>
    <p><strong>Catatan:</strong> {{ $pesanan->catatan ?? 'Tidak ada catatan' }}</p>
    <p><strong>Total Harga:</strong> Rp{{ number_format($pesanan->total_harga,0,',','.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($pesanan->status) }}</p>

    <hr>
    <p style="text-align:center;">Terima kasih telah memesan!</p>
</div>

</body>
</html>
