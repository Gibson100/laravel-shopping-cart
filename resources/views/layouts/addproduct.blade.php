@extends('layouts.master')
@section('content')
<div class="container">
    @include('layouts.inc.messages')
    <form action="/add/products" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Product</h1>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Product name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Product Price</label>
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" autocomplete="price" autofocus>

                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label">Product Category</label>
                    <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category"
                        value="{{ old('category') }}" autocomplete="category" autofocus required>
                        <option value="">choose option</option>
                        <option value="Smartphones">Smartphones</option>
                        <option value="Desktop Computes">Desktop Computers</option>
                        <option value="Laptops">Laptops</option>
                        <option value="Womens Fashon">Womens Fashon</option>
                        <option value="Mens Fashon">Mens Fashon</option>
                        <option value="Electronics">Electronics</option>
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">

                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Product description</label>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                        value="{{ old('description') }}" autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Upload Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row p-3">
                    <button class="row btn btn-primary">Add New Product</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection