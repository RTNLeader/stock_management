@extends('layout.app')
@section('title') {{'Update Product'}} @endsection
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">@yield('title')</h3>
            <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('product')}}">Product</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">@yield('title')</a>
            </li>
            </ul>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Product</div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-group" action="{{ route('edit-data-product', $product->id)}}" enctype="multipart/form-data">
                            @csrf  
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="Name"
                                        name="name"
                                        placeholder="Enter Name"
                                        value="{{$product->name}}"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input
                                        type="file"
                                        class="form-control"
                                        id="image"
                                        name="image"
                                        placeholder="Enter Image"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="status_id">Status</label>
                                        <select class="form-select" id="status_id" name="status_id">
                                            <option value="">Chosse Status</option>
                                            @foreach($status as $status_item)
                                            <option value="{{$status_item->id}}" {{$status_item->id == $product->status_id ? 'selected' : '' }}>{{$status_item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">UOM</label>
                                        <select class="form-select" id="uom_id" name="uom_id">
                                            <option value="">Chosse UOM</option>
                                            @foreach($unit_of_measures as $unit_of_measure)
                                            <option value="{{$unit_of_measure->id}}" {{$unit_of_measure->id == $product->uom_id ? 'selected' : '' }}>{{$unit_of_measure->unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="Quantity">Quantity</label>
                                        <input
                                        type="number"
                                        class="form-control"
                                        id="quantity"
                                        name="quantity"
                                        placeholder="Enter Quantity"
                                        value="{{$product->quantity}}"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Category</label>
                                        <select class="form-select" id="type" name="category_id">
                                            <option value="">Chosse Categories</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="stock_id">Stock</label>
                                        <select class="form-select" id="stock_id" name="stock_id">
                                            <option value="">Chosse Stock</option>
                                            @foreach($stocks as $stock)
                                            <option value="{{$stock->id}}" {{$stock->id == $product->stock_id ? 'selected' : '' }}>{{$stock->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input
                                        type="number"
                                        class="form-control"
                                        id="price"
                                        name="price"
                                        placeholder="Enter Price"
                                        value="{{$product->price}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="5">{{$product->description}}</textarea>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <button class="btn btn-danger" onclick="history.back(); return false;">Cancel</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection