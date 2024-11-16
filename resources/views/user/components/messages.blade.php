@if (isset($chat[0]))

    @foreach ($chat as $message)
        <div class="msg {{ $message->sender_id == auth()->id() ? 'user1' : 'repply' }} ">
            <span class="avtr">
                {{ $message->sender_id == auth()->id() ? 'You' : 'Support' }}
            </span>
            <span class="responsText">{{ $message->message }}</span>
        </div>
    @endforeach
@endif
