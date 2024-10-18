<div class="container  d-flex mt-5 topAlignment flex-direcction-column">
    <div class="d-flex flex-column para2   mb-2">
        <h2>Products Offered</h2>
        <p class="para">
            As a leading sign company in Kansas City, KS, we handle every aspect of the sign creation process.
            This means we not only fabricate your signs, we also offer complete design assistance, professional
            installation,
            and any repairs/maintenance you need to keep your signage looking great.
        </p>

        <div class="controls">
            <button class="btn1 prev2"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                    alt="Prev" /></button>
            <button class="btn1 btn2 next2"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                    alt="Next" /></button>
        </div>
    </div>
    <div class="swiper mySwiper23 mt-3">
        <div class="swiper-wrapper">
            @if (isset($data['products'][0]))
                @foreach ($data['products'] as $item)
                    @php
                        $img = $item->image->path ?? 'assets/website/images/image_(1).png';
                    @endphp
                    <div class="swiper-slide">
                        <div>
                            <img src="{{ asset($img) }} " />
                            <div class="d-flex justify-content-start align-items-center">
                                <p> {{ $item->name ?? '1 Mimaki UJV100-160 64" UV printer' }}</p>
                                <a href="{{ route('product_detail', ['slug' => $item->slug ?? $item->id]) }}"
                                    class="btn1 btn2"><img
                                        src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- <div class="swiper-pagination"></div> -->
    </div>
</div>
