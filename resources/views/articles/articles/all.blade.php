
@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-3">
      <a class="btn btn-md btn-primary" href="/articles/create" role="button">New Article &raquo;</a>
    </div>
    </div>
</div>
<br>

    <div class="row">


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
        </div>

        @endif
      <div class="col">
        <div class="card" >


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" style="width: 60%">Article Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i=0
      @endphp
    @foreach ($articles as $article)
    @php
    $i++
      @endphp
  <tr>
    <th scope="row">{{$i}}</th>
    <td>{{$article->title}}</td>
    <td><a class="btn btn-sm btn-warning" href="/articles/edit/{{$article->id}}" role="button">Update</a>
    <a class="btn btn-sm btn-danger" href="/articles/delete/{{$article->id}}" role="button">Delete</a></td>
  </tr>
    @endforeach
  </tbody>
</table>
            </div>
          </div>
      </div>


    </div>
  </div>
@endsection
