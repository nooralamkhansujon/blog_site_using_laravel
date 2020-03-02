<style>
    .reply_form,.reply_text{
        display:none;
    }

   .show{
       display:block;
   }


</style>

<?php

function reply_message($reply)
{
    $output = '';
    if($reply && $reply->childrens()->count() == 0)
        return ;
    else{
        $substring ='';
        if($reply)
        {
            $substring = '<ul class="children">';
            foreach($reply->childrens as $children)
            {
                $substring  .= '<li class="comment">
                                <div class="vcard bio">
                                    <img src="'.asset("images/person_1.jpg").'" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <div class="meta">'.$children->created_at->format('M D, Y').'</div>
                                    <p>'.$children->reply.'</p>';
                $substring  .= reply_button($children);
                $substring  .= reply_message($children);
                $substring  .= '</div></li>';
            }
            $substring .="</ul>";
        }

    }
    return $output.=$substring;
}

function reply_button($reply){

    $output = "<p><a href='#' class='reply' data-parent_id='{$reply->id}' data-comment_id='{$reply->comment_id}'>Reply</a></p>
        <div class='row'>
            <div class='col-md-12'>
                <textarea name='reply' placeholder='Enter Your comment'
                id='reply_text_{$reply->id}' class='form-control reply_text'
                 cols='10' rows='5'></textarea>
            </div>
            <div class='col-md-12 mt-2'>
                <form action='' class='reply_form' method='POST' id='reply_form_{$reply->id}'>
                    <input type='hidden' name='_token' value='".csrf_token()."' >
                    <button type='submit'  class='btn btn-secondary'>Enter</button>
                </form>
            </div>
        </div>";
    return $output;
}



?>


    <div class="col-lg-8 ftco-animate">
        {{-- if project is set  --}}
        @if(isset($project))
            <img width="100%" src="{{asset('storage/'.$project->project_image)}}" alt="{{ $project->project_title }}"
            class="img-fluid">
            <h2 class="mb-3 mt-5 text-success">{{ $project->project_title }}</h2>
            <p class="lead">{{ $project->project_description }}</p>
        {{-- else if blog is set  --}}
        @elseif(isset($blog))
            <img width="100%" src="{{asset('storage/'.$blog->image)}}" alt="{{ $blog->title }}"
            class="img-fluid">
            <h2 class="mb-3 mt-5 text-success">{{ $blog->title }}</h2>
            <p class="lead">{{ $blog->description }}</p>
        @endif

        <div class="pt-5 mt-5">
                @php  $commentBelongs =(isset($blog)?$blog:$project); @endphp
                <h3 class="mb-5">{{$commentBelongs->comments->count()}} Comments</h3>
                @foreach($commentBelongs->comments as $comment)
                    <ul class="comment-list">
                       <li class="comment">
                           <div class="vcard bio">
                                 <img src="{{asset('images/image_1.jpg')}}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{ $comment->name }}</h3>
                                <div class="meta">{{ $comment->created_at->format('M d, Y ') }}</div>
                                <p>{{ $comment->comment }}</p>
                                <p>
                                    <a href='#' class='reply ' data-parent_id='0'
                                    data-comment_id='{{$comment->id}}'>Reply</a>
                                </p>
                                <div class='row'>
                                        <div class='col-md-12'>
                                            <textarea name='reply' placeholder='Enter Your comment'
                                            id='reply_text_{{$comment->id}}_parent'
                                             class='form-control reply_text'
                                             cols='10' rows='5'></textarea>
                                             <div class='col-md-12 mt-2'>
                                                 <form action="" class="reply_form" method="POST"
                                                 id='reply_form_{{$comment->id}}_parent'>
                                                      @csrf
                                                     <button type="submit"  class='btn btn-secondary'>Enter</button>
                                                 </form>
                                              </div>
                                         </div>
                                 </div>
                                {{-- if comment has replies which parent_id = 0 --}}
                                @php
                                    if($commentBelongs->replies($comment->id)->count() > 0)
                                    {
                                        //show all the reply message which parent_id =0;
                                        $substring = '<ul class="children">';
                                        foreach($commentBelongs->replies($comment->id) as $replyObject)
                                        {

                                            $replyObject     =  App\Reply::find($replyObject->id);
                                            $substring      .= '<li class="comment">
                                                                <div class="vcard bio">
                                                                    <img src="'.asset("images/person_1.jpg").'" alt="Image placeholder">
                                                                </div>
                                                                <div class="comment-body">
                                                                    <div class="meta">
                                                                        '.$replyObject->created_at->format('M D, Y').'
                                                                    </div>';
                                            $substring      .= '<p>'.$replyObject->reply.'</p>';
                                            $substring      .= "<p><a href='#' class='reply'
                                                                    data-reply_parent='{$replyObject->id}'
                                                                    data-parent_id='{$replyObject->id}'
                                                                    data-comment_id='{$replyObject->comment_id}'>Reply</a>
                                                                </p>";
                                            //this is button section
                                            $substring   .= "<div class='row'>
                                                                <div class='col-md-12'>
                                                                    <textarea name='reply' placeholder='Enter Your comment'
                                                                    id='reply_text_{$replyObject->id}_reply'
                                                                    class='form-control reply_text'
                                                                    cols='10' rows='5'></textarea>
                                                                    <div class='col-md-12 mt-2'>
                                                                        <form action='' class='reply_form' method='POST'
                                                                        id='reply_form_{$replyObject->id}_reply'>
                                                                            <input type='hidden' name='_token'
                                                                            value='".csrf_token()."' />
                                                                            <button type='submit' class='btn btn-secondary'>
                                                                                Enter
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div></div>";

                                            //if reply has any child comments then
                                            if($replyObject->childrens()->count() > 0)
                                            {
                                                $substring  .= reply_message($replyObject);
                                            }
                                            $substring     .= '</div></li>';
                                        }
                                        $substring .='</ul>';
                                        echo $substring;

                                    }
                                @endphp
                            </div>
                         </li>
                    </ul>
                @endforeach
                <!-- END comment-list -->

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Leave a comment</h3>
                    <div  id="alert_message"></div>
                    <form action="" id="comment_form"  class="p-5 bg-light">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control"  name="name" id="name" required >
                        </div>
                        <div class="form-group">
                            @if(isset($blog))
                                 <input type="hidden" class="form-control"  name="commentable_id"   value="{{ $blog->id }}">
                                 <input type="hidden" class="form-control"  name="commentable_type" value="blog">
                            @elseif(isset($project))
                                <input type="hidden" class="form-control"  name="commentable_id"   value="{{ $project->id }}">
                                <input type="hidden" class="form-control"  name="commentable_type" value="project">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email"  class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment *</label>
                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Comment" class="btn py-3 px-4 btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            {{-- end of comments list  --}}
        </div>








<script defer  type="text/javascript">

    $(document).ready(function(){
        var replies = document.querySelectorAll('a.reply');
        // console.log(replies);
        replies.forEach((element)=>{
           element.addEventListener('click',function(event){
                event.preventDefault();
                const  comment_id  = this.dataset.comment_id;
                const  parent_id   = this.dataset.parent_id;
                // if this is reply has reply_parent dataset property
                if(this.dataset.reply_parent)
                {
                    reply_parent    = this.dataset.reply_parent;
                    textform        = document.getElementById(`reply_text_${reply_parent}_reply`);
                    button_form     = document.getElementById(`reply_form_${reply_parent}_reply`);
                }
                else if(parent_id == 0)
                {
                    textform        = document.getElementById(`reply_text_${comment_id}_parent`);
                    button_form     = document.getElementById(`reply_form_${comment_id}_parent`);
                }
                else{
                    textform        = document.getElementById(`reply_text_${parent_id}`);
                    button_form     = document.getElementById(`reply_form_${parent_id}`);
                }

                button_form.classList.toggle('show');
                textform.classList.toggle('show');
                //if button is clicked then
                button_form.addEventListener('submit',function(event){
                       event.preventDefault();
                       textdata  = textform.value;
                       console.log(textdata);
                       $.ajax({
                            url      : "{{route('reply.submit')}}",
                            type     : "post",
                            data     : {comment_id:comment_id,parent_id:parent_id,textdata:textdata,_token:this._token.value},
                            success  : function(data){
                                if(data.toLowerCase() == 'ok'){
                                    addMetaTag();
                                }
                            }
                        });
                });
            });
        });

    });

    $('#comment_form').on('submit',function(event){
         event.preventDefault();
         $.ajax({
             url      : "{{route('comment.submit')}}",
             method   : "POST",
             data     : $(this).serialize(),
             success  : function(data){
                console.log(data);
                if(data.toLowerCase() == "ok")
                {
                    alert_message = document.getElementById('alert_message');
                    alert_message.classList.add('alert');
                    alert_message.classList.add('alert-success');
                    $("#alert_message").html('You comment our post');
                    document.getElementById('name').value    = " ";
                    document.getElementById('email').value   = " ";
                    document.getElementById('comment').value = " ";
                    addMetaTag();

                }
            }
         });
    });

    function addMetaTag()
    {
        let metatag  = document.createElement('meta');
        let head    = document.getElementsByTagName('head')[0];
        metatag.setAttribute('http-equiv','refresh');
        metatag.setAttribute('content',"3");
        head.appendChild(metatag);
    }

</script>


