@extends('template.index')

@section('content-admin')
<div>
    
    <div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Product</h5>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('product.create') }}" class="btn add-new btn-primary m-1 float-end"><i class="ti ti-plus"></i></a>
                @endif
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Image</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Price</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Stock</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($dataProduct as $product)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ asset('assets/images/data/' . $product['image']) }}"
                                            alt="Book Image" width="50" height="50">
                                    </td>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['stock'] }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('product.edit', $product->id) }} " class="btn btn-warning" style="margin-right: 5px"><i class="ti ti-edit"></i></a>
                                        <form action="/product/delete/{{ $product->id }}" method="POST">
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