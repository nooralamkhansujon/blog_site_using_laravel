

<ul class="children">
    <li class="comment">
        <div class="vcard bio">
            <img src="{{asset('images/person_1.jpg')}}" alt="Image placeholder">
        </div>
        <div class="comment-body">
            <h3>{{$reply->}}</h3>
            <div class="meta">October 03, 2018 at 2:21pm</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
            <p><a href="#" class="reply" id="replay_{{$reply->parent_id}}">Reply</a></p>
            {{--
            <div class="row">
                <div class="col-md-12">
                    <textarea name="reply" id="" class="form-control replay_form" data-comment_id ="{{ $comment->id }}" cols="30" rows="10"></textarea>
                </div>
            </div>
            --}}
        </div>
    </li>
</ul>

