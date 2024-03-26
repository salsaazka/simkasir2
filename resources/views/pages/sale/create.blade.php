@extends('template.index')

@section('content-admin')
<div class="card">
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Input Name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" id="" class="form-control" placeholder="Input Price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Input Price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Input Price">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted">Role</label>
                <select class="form-select" aria-label="Default select example" name="role">
                    <option value="admin">Admin</option>
                    <option value="cashier">Cashier</option>
                </select>
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