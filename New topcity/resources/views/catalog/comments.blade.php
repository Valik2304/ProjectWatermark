@foreach($comments as $comment)
    <div class="comments__items col-12">
        <p class="comments__text">{{ $comment->text }}</p>
        <span class="comments__name">{{ $comment->name }}</span>
        <span class="comments__date">{{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y, H:i') }}</span>
    </div>
@endforeach