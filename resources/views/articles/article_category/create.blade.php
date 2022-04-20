@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <strong> Edit Category</strong>
    </div>
    <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
        </div>

        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
<div class="row">





<form method="POST" action="{{route('article.category.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="category" class="form-label">Name</label>
        <input type="text" class="form-control" id="category" name="category" placeholder=" Category Name">
      </div>
      @error('category')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
      </div>
      @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="mb-3">
    <label for="note" class="form-label">Add Note</label>
    <textarea class="form-control" id="note" name="note" rows="2"></textarea>
  </div>
  @error('note')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div></div>
@endsection
