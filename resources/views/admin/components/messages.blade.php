@if (isset($chat[0]))

    @foreach ($chat as $message)
        <li class="{{ $message->sender_id == auth()->id() ? 'replies' : 'sent' }}">
            <span>{{ $message->sender_id == auth()->id() ? 'You' : $user->name }}</span>
            <p>{{ $message->message }}</p>
        </li>
    @endforeach
@endif
