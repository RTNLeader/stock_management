@extends('layout.app')
@section('title') {{'Insert Product'}} @endsection
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
                        <div class="card-title">Insert New Product</div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-group" action="{{route('insert-data-product')}}" enctype="multipart/form-data">
                            @csrf
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
                                            <option value="{{$status_item->id}}">{{$status_item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="uom_id">UOM</label>
                                        <select class="form-select" id="uom_id" name="uom_id">
                                            <option value="">Chosse UOM</option>
                                            @foreach($unit_of_measures as $unit_of_measure)
                                            <option value="{{$unit_of_measure->id}}">{{$unit_of_measure->unit}}</option>
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
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select class="form-select" id="type" name="category_id">
                                            <option value="">Chosse Categories</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="stock_id">Stock</label>
                                        <select class="form-select" id="type" name="stock_id">
                                            <option value="">Chosse Stock</option>
                                            @foreach($stocks as $stock)
                                            <option value="{{$stock->id}}">{{$stock->name}}</option>
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
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
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