<h3>Comments</h3>
@guest
	<h2>You are not authorization</h2>
@else
<div class="row mt-5">
   <div class="col-sm-8 offset-sm-2">
     <form action="{{route('post.comment')}}" method = "post" enctype="multipart/form-data">
       @csrf
       <div class="form-group">
         <label for="name">Comment text:</label>
         <textarea id="body" name="body" rows="4" cols="50"></textarea>
       </div>
       
         <input type="hidden" name = "company_id" id = "company_id" class="form-control" value="{{$company_id}}" required>


       <button type = "submit" class = "btn btn-success">Send</button>
     </form>
   </div>
 </div>


@endguest


@if (Auth::check())
  @include('includes.errors')
  {{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}
  <p>{{ Form::textarea('body', old('body')) }}</p>
  {{ Form::hidden('post_id', $post->id) }}
  <p>{{ Form::submit('Send') }}</p>
{{ Form::close() }}
@endif
@forelse ($post->comments as $comment)
  <p>{{ $comment->user->name }} {{$comment->created_at}}</p>
  <p>{{ $comment->body }}</p>
  <hr>
@empty
  <p>This post has no comments</p>
@endforelse