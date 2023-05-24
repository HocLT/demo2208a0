@extends('admin.layout.layout')

@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('admin.product.index') }}">Products</a></li>
            <li class="breadcrumb-item active">Create Product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form class="row" action="{{ Route('admin.product.update', $product->id) }}" method="post" 
              enctype="multipart/form-data">
      @csrf
      @method('put')
      <input type="hidden" name="id" value="{{ $product->id }}"/>
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Product Information</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}"/>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" id="price" class="form-control" name="price" value="{{ $product->price }}"/>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select id="category" class="form-control custom-select" name="category_id">
                @foreach($cates as $item)
                <option value="{{ $item->id }}" @if ($item->id==$product->category_id) 'selected' @endif>{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Other</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            @if($product->image != null)
            <div class="form-group">
            <img src="{{ asset('images/'.$product->image) }}" alt="" style="width:400px;height:auto;">
            </div>
            @endif
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" id="image" class="form-control" name="photo">
            </div>
            <input type="submit" value="Create" class="btn btn-success">
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </form>
    
  </section>
  <!-- /.content -->
</div>
@endsection