<div class="center">
    <h2 class="text-xl">Comments</h2>
    <form action="{{url('add_comment')}}" method="POST">
        @csrf
    <textarea style="width:500px,height:100px" name="comment"></textarea>
    <br>
    <input type="submit" class='btn btn-primary' value="comment">
    </form>
</div>

<div class="center">
    <h2 class="text-xl">All Comments</h2>
    @foreach($comment as $comment)
    
    <div>
        <p>{{$comment->name}}</p>
        <p>{{$comment->comment}}</p>
        <a href="javascript::void(0);" onclick="reply(this)">Reply</a>
    </div>
    @endforeach
    
    <div style="display:none;" class="replyDiv">
    <textarea style="width:500px,height:100px"></textarea>
    <br>
    <a href="" class='btn btn-primary'>comment</a>
    </div>
</div>
