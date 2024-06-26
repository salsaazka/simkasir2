@extends('template.index')

@section('content-admin')
<div class="card">
    <div class="card-body">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Input Name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" name="price" id="" class="form-control" placeholder="Input Price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stok</label>
                <input type="number" name="stock" id="" class="form-control" placeholder="Input Stok">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"
                    >Upload Image</label
                >
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
            </div>
            <button
                type="submit"
                class="btn text-white mb-5"
                style="background-color: #55D090"
            >
                Submit
            </button>
        </form>
    </div>
</div>
@endsection