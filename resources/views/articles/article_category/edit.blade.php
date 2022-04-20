@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <strong> Edit Article Category</Article></strong>
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



<form method="POST" action="{{route('article.category.update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$categorie->id}}">
    <div class="mb-3">
        <label for="category" class="form-label">Name</label>
        <input type="text" class="form-control" id="category" name="category" placeholder="Category name" value="{{$categorie->category}}">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{$categorie->description}}</textarea>
      </div>
      <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <textarea class="form-control" id="note" name="note" rows="3">{{$categorie->note}}</textarea>
      </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div></div>
@endsection
