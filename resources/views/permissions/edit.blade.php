@extends('layouts.base-admin')

@section('title')
    <title>Edit Permission | MBKM Poliwangi</title>
@endsection

@section('content')
    <section>
        <div class="row py-5">
            <div class="col-md-12">
                <div class="bg-light p-4 rounded">
                    <h2>Edit permission</h2>
                    <div class="lead">
                        Ubah Permission.
                    </div>

                    <div class="container mt-4">

                        <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                            @method('patch')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $permission->name }}" type="text" class="form-control" id="name"
                                    name="name" placeholder="Name" required>

                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Save permission</button>
                            <a href="{{ route('permissions.index') }}" class="btn bg-white">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection