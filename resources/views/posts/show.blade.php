@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <div class="card-body">
                        <h2 class="text-center text-primary"> Welcome To Our blog</h2>
                        <br>
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->description}}</p>

                        @include('posts.like', ['like'=>$post->like, 'post_id'=>$post->id])

                        <hr>

                    <h4>Comments</h4>

                    @include('posts.comments', ['comments'=>$post->comments, 'post_id'=>$post->id])

                    <hr>

                    <form method="POST" action="{{route('comments.store')}}">
                        @csrf
                        <div class="form-group">
                           <textarea type="text" class="form-control" name="description"></textarea>
                        <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}">
                         </div>
                        <button type="submit" class="btn btn-primary">Add comments</button>
                      </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{url('like.js')}}" ></script>

    <script type="text/javascript">
        var url = "{{route('like')}}";
        var token = "{{Session::token()}}";
    </script>

@endsection
