@if (isset($chat[0]))

    @foreach ($chat as $message)
        <li class="{{ $message->sender_id == auth()->id() ? 'replies' : 'sent' }}">
            <span>{{ $message->sender_id == auth()->id() ? 'You' : $user->name }}</span>
            <p>{{ $message->message }}</p>
            <span>{{ \Carbon\Carbon::parse($message->created_at)->format('d M Y, h:i A') }}</span>
        </li>
    @endforeach
@endif
