@if (isset($data['users'][0]))
    @foreach ($data['users'] as $item)
        <li class="contact" data-user-id="{{ $item->id ?? 0 }}">
            <div class="wrap">
                @php

                    $img = $item->profile ?? 'assets/admin/images/Image.png';

                @endphp
                <img id="user_image{{ $item->id ?? 0 }}" src="{{ asset($img) }}" alt="" />
                <div class="meta">
                    <p class="name" id="user_name{{ $item->id ?? 0 }}">{{ $item->name ?? '' }}
                        {{ $item->last_name ?? '' }}</p>
                </div>
            </div>
        </li>
    @endforeach
@endif
