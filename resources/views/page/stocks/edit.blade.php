@extends('layout.app')
@section('title') {{'Update Role'}} @endsection
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
                    <a href="{{route('role')}}">Role</a>
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
                        <div class="card-title">@yield('title')</div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-group" action="{{ route('edit-data-stock', $stock->id)}}" enctype="multipart/form-data">
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
                                        value="{{$stock->name}}"
                                        />
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="type">Category</label>
                                        <select class="form-select" id="type" name="category_id">
                                            <option value="">Chosse Categories</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $stock->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_id">Status</label>
                                        <select class="form-select" id="status_id" name="status_id">
                                            <option value="">Chosse Status</option>
                                            @foreach($status as $item)
                                            <option value="{{$item->id}}" {{$item->id == $stock->status_id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="quantity"
                                            name="quantity"
                                            placeholder="Enter Quantity"
                                            value="{{$stock->quantity}}"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="uom_id">UOM</label>
                                        <select class="form-select" id="uom_id" name="uom_id">
                                            <option value="">Chosse UOM</option>
                                            @foreach($uoms as $item)
                                            <option value="{{$item->id}}" {{$item->id == $stock->uom_id ? 'selected' : '' }}>{{$item->unit}}</option>
                                            @endforeach
                                        </select>
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