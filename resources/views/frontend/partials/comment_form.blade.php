<div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <div  id="alert_message"></div>
    <form action="" id="comment_form"  class="p-5 bg-light">
        @csrf
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control"  name="name" id="name" required>
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
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Comment" class="btn py-3 px-4 btn-primary">
        </div>
    </form>
</div>


<script type="text/javascript">

     $('#comment_form').on('submit',function(event){
          event.preventDefault();
          $.ajax({
              url      : "{{route('comment.submit')}}",
              method   : "POST",
              data     : $(this).serialize(),
              success  : function(data){
                 if(data.toLowerCase() == "ok")
                 {
                    alert_message = document.getElementById('alert_message');
                    alert_message.classList.add('alert');
                    alert_message.classList.add('alert-success');
                    $("#alert_message").html('You comment our post');
                    document.getElementById('#name').value    = " ";
                    document.getElementById('#email').value   = " ";
                    document.getElementById('#comment').value = " ";
                 }
              }
          });
     });
</script>
