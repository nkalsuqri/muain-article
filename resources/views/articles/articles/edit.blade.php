@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <strong> Edit Article</Article></strong>
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



<form method="post" action="{{route('articles.update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$article->id}}">


    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category )
            @if($article->category_id == $category->id)
            <option value="{{$category->id}}">{{$category->category}}</option>
            @endif
            @endforeach
        @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
      </div>


    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$article->title}}">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{$article->description}}</textarea>
      </div>
      <div class="mb-3">
        <label for="icon" class="form-label">Add Icon</label>
        <input class="form-control" type="file" id="icon" name="icon" value="{{$article->icon}}">
      </div>
      <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <textarea class="form-control" id="note" name="note" rows="3">{{$article->note}}</textarea>
      </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div></div>
@endsection
