<!DOCTYPE html>
<html>

<head>
  <title>Laporan Inventaris Barang</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }
  </style>
</head>

<body>
  <h1>Laporan Inventaris Barang</h1>
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Kode Barang</th>
        <th>Jenis Barang</th>
        <th>Jumlah</th>
        <th>Tanggal Pembelian</th>
        <th>Tanggal Pemakaian</th>
        <th>Ruang</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($inventarisBarang->isEmpty())
        <tr>
          <td colspan="8" class="text-center">No Data Yet</td>
        </tr>
      @else
        @foreach ($inventarisBarang as $item)
          <tr>
            <td>{{ $loop->iteration }}.</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>
              @if ($item->daftarPembelian->isNotEmpty())
                {{ $item->daftarPembelian->first()->created_at->format('Y-m-d') }}
              @else
                No Pembelian Data Available
              @endif
            </td>
            <td>
              @if ($item->daftarPemakaian->isNotEmpty())
                {{ $item->daftarPemakaian->first()->tanggal }}
              @else
                No Pemakaian Data Available
              @endif
            </td>
            <td>
              @if ($item->daftarPemakaian->isNotEmpty())
                {{ $item->daftarPemakaian->first()->ruang }}
              @else
                No Pemakaian Data Available
              @endif
            </td>
            <td>
              @if ($item->daftarPemakaian->isNotEmpty())
                {{ $item->daftarPemakaian->first()->keterangan }}
              @else
                No Pemakaian Data Available
              @endif
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
</body>

</html>
