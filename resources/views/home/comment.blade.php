<div class="center">
    <h2 class="text-xl">Comments</h2>
    <form action="{{url('add_comment')}}" method="POST">
        @csrf
    <textarea style="width:500px,height:100px" name="comment"></textarea>
    <input type="text" id="comment_id" name="comment_id">
    <input type="text" id="reply" name="reply" hidden="">
    <br>
    <input type="submit" class="btn btn-primary" value="comment">
    </form>
</div>

<div class="center">
    <h2 class="text-xl">New Top 10 Comments</h2>

    @foreach($comment as $key=>$comment)
    <div>
        <p>CommentNo:{{$key+1}}</p>
        <p>UserName:{{$comment->name}}</p>
        <p>Comment:{{$comment->comment}}</p>
        <a href="javascript::void(0);" onclick="reply_close(this)" class="btn btn-light">Close</a>
        <a href="javascript::void(0);" onclick="reply(this)" class="btn btn-primary" data-Commentid="{{$comment->id}}">ReplyToComment</a>

        @foreach($reply as $rep)
            @if($rep->comment_id == $comment->id)
            <div style="padding-left:10%;">
                <p>UserName:{{$rep->name}}</p>
                <p>Reply:{{$rep->comment}}</p>
                <a href="javascript::void(0);" onclick="reply_close(this)" class="btn btn-light">Close</a>
                <a href="javascript::void(0);" onclick="reply(this)" class="btn btn-success" data-Commentid="{{$comment->id}}">ReplyToReply</a>
            </div>
            @endif
        @endforeach
    
    </div>
    @endforeach
    
    <div style="display:none;" class="replyDiv">

    <form action="{{url('add_reply')}}" method="POST">
    <input type="text" id="commentId" name="commentId" >
    <input type="text" id="reply" name="reply" hidden="">
        @csrf
    <textarea style="width:500px,height:100px" name="reply"></textarea>
    <br>
    <button type="submit" class="btn btn-info">SendReply</button>
    </form>
    </div>

</div>