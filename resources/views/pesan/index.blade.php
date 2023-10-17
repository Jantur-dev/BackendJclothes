@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/home') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ url('assets/img/product/' . $barang->gambar) }}" alt="" style="width: 500px">
                                @if ($barang->stok == 0)
                                    <h3 class="text-danger">Barang tidak tersedia!!</h3>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h1>{{ $barang->nama_barang }}</h1>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp.{{ number_format($barang->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ $barang->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $barang->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td>:</td>
                                            <td>
                                                <button onclick="ukuran('S')">S</button>
                                                <button onclick="ukuran('L')">L</button>
                                                <button onclick="ukuran('M')">M</button>
                                            </td>
                                        </tr>
                                        @if ($barang->stok !== 0)
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                                <button onclick="kurangValue()" name="minus"><box-icon
                                                    name='minus'></box-icon></button>
                                                    <input type="number" id="myNumber" class="">
                                                    <button onclick="tambahValue()" name="plus"><box-icon
                                                        name='plus'></box-icon></button>
                                                    </td>
                                                </tr>
                                                <form action="/pesan/{{ $barang->id }}" method="post">
                                                    @csrf
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                        <input type="hidden" name="ukuran" id="ukuran" required>
                                                        <input type="hidden" name="jumlah_pesan" id="input2">
                                                        <button type="submit" class="btn"
                                                            style="background-color: #3d3d3d; color: white;"><i
                                                                class='bx bx-shopping-bag'></i> Masukkan Keranjang</button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dapatkan elemen input
        let inputElement = document.getElementById("myNumber");
        // Dapatkan nilai saat ini
        var nilaiSaatIni = parseInt(inputElement.value = 1);
        let input2 = document.getElementById('input2');
        input2.value = nilaiSaatIni;
        // nilai stok dari php
        let stok = {{ $barang->stok }};

        function tambahValue() {
            // Perbarui nilai saat ini dengan nilai dari input
            nilaiSaatIni = parseInt(inputElement.value); // Tambahkan baris ini
            if (nilaiSaatIni < 1) {
                inputElement.value = 1;
            } else {
                var nilaiBaru = nilaiSaatIni + 1;
                // Periksa jika nilai baru lebih kecil dari stok sebelum menambahkannya
                if (nilaiBaru <= stok) { // Tambahkan kondisi ini
                    inputElement.value = nilaiBaru;
                    input2.value = inputElement.value;
                    document.querySelector('button[name="minus"]').disabled = false;
                }
            }
        }


        function kurangValue() {
            // Perbarui nilai saat ini dengan nilai dari input
            nilaiSaatIni = parseInt(inputElement.value); // Tambahkan baris ini
            if (nilaiSaatIni <= 1) {
                inputElement.value = 1;
                document.querySelector('button[name="minus"]').disabled = true;
            } else {
                var nilaiBaru = nilaiSaatIni - 1;
                // Periksa jika nilai baru lebih besar dari 0 sebelum menguranginya
                if (nilaiBaru > 0) { // Tambahkan kondisi ini
                    inputElement.value = nilaiBaru;
                    input2.value = inputElement.value;
                    // Aktifkan kembali tombol plus
                    document.querySelector('button[name="plus"]').disabled = false;
                }
            }
        }

        function ukuran(pilihan) {
            let pilih = document.getElementById('ukuran');
            if(pilihan == 'S') {
                pilih.value = 'S';
            } else if (pilihan == 'L') {
                pilih.value = 'L';
            } else if (pilihan == 'M') {
                pilih.value = 'M';
            }
        }
    </script>
@endsection
