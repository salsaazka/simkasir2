@extends('template.index')

@section('content-admin')
<div>
    
    <div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Sale</h5>
                @if (auth()->user()->role === 'cashier')
                <a href="{{ route('sale.create') }}" class="btn add-new btn-primary m-1 float-end"><i class="ti ti-plus"></i></a>
                @endif
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tanggal Penjualan</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total Harga</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Dibuat oleh</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($dataSale as $sale)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $sale['name'] }}</td>
                                    <td>{{ $sale['date'] }}</td>
                                    <td>{{ $sale['total_price'] }}</td>
                                    <td>{{ $sale['sale_id'] }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('sale.edit', $sale->id) }} " class="btn btn-warning" style="margin-right: 5px"><i class="ti ti-edit"></i></a>
                                        <form action="/sale/delete/{{ $sale->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection