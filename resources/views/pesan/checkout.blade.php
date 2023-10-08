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
                        <h1><box-icon name='cart-alt'></box-icon> Checkout</h1>
                        @if (!empty($pesanan))
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Ukuran</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                            <td>{{ $pesanan_detail->ukuran }}</td>
                                            <td>{{ $pesanan_detail->jumlah }}</td>
                                            <td>Rp.{{ number_format($pesanan_detail->barang->harga) }}</td>
                                            <td>Rp.{{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                            <td>
                                                <form action="{{ url('checkout/' . $pesanan_detail->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="confirm('yakin hapus item di keranjang?')"><box-icon
                                                            type="solid" name='trash'></box-icon></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total Harga : </strong></td>
                                        <td><strong>Rp.{{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                        <td>
                                            <a href="{{ url('/confirm-checkout') }}" class="btn btn-success" onclick="confirm('Anda yakin mau checkout?')"><box-icon
                                                    name='cart-alt'></box-icon> Checkout</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
