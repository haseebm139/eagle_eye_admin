@extends('layout.app')
@section('title', 'Home')

@section('style')

@endsection
@section('content')

    <section id="back_btn_sec">
        <div class="container">
            <div class="product_page_top_bar">
                <a href="{{ route('home') }}" class="product_back_btn">

                    <img src="{{ asset('assets/website/images/svg/back.svg') }}" alt="error" />

                    Back
                </a>
            </div>
        </div>

    </section>
    <section id="products_details_sec">
        <div class="container">

            <div class="row">
                <div class="col-xxl-7 col-xm-7 col-lg-7 col-md-12 col-sm-12">
                    <div class="product_images_wrapper">
                        <div class="product_extra_images_wrapper">
                            <img src="{{ asset('assets/website/images/image.png') }}" class="other_img" alt="error" />
                            <img src="{{ asset('assets/website/images/image_1.png') }}" class="other_img" alt="error" />
                            <img src="{{ asset('assets/website/images/image_728.png') }}" class="other_img"
                                alt="error" />
                        </div>
                        <div class="product_feature_image_wrapper">
                            <img src="{{ asset('assets/website/images/main.png') }}" id="featured_img" alt="error" />
                        </div>
                    </div>

                </div>
                <div class="col-xxl-5 col-xm-5 col-lg-5 col-md-12 col-sm-12 mt-sm-5 mt-lg-0">
                    <div class="product_details_wrapper">
                        <h1 class="product_title">Flatbed Printing</h1>
                        <p class="product_price">$<span id="product_price">0.00</span> /per piece</p>
                        <p class="extra_paragraph">Flatbed printed materials with UV ink</p>
                        <form action="" method="post" class="product_details_form">
                            <div class="row">
                                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 pr-3">
                                    <label for="height" class="form-label">Height<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="height" name="height"
                                        placeholder="Enter Height" required />
                                </div>
                                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 pl-3">
                                    <label for="height" class="form-label">Width<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Width" name="Width"
                                        placeholder="Enter Width" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 pr-3">
                                    <label for="Material" class="form-label">Material<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Material" name="Material"
                                        placeholder="Enter Height" required />
                                </div>
                                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 pl-3">
                                    <label for="printed_sides" class="form-label">Printed Sides<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="printed_sides" name="printed_sides"
                                        placeholder="Enter Width" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 pr-3">
                                    <label for="flute_direction" class="form-label">Flute Direction<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="flute_direction" name="flute_direction"
                                        placeholder="Enter Height" required />
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <label for="special_instructions" class="form-label">Special Instructions<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control mt-4" id="special_instructions"
                                        name="special_instructions" placeholder="Enter Height" required />
                                </div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <label for="flute_direction" class="form-label">Quantity<span
                                            class="text-danger">*</span></label>
                                    <div class="quantity_selector mt-2">
                                        <button id="plus_quantity" type="button" class="qty_buttons"><img
                                                src="{{ asset('assets/website/images/svg/minus.svg') }}"
                                                width="20px"></button>
                                        <input type="text" class="qty_selector" id="selector" name="qty"
                                            value="1" min="1">
                                        <button id="minus_quantitiy" type="button" class="qty_buttons"><img
                                                src="assets/website/images/svg/plus.svg" width="20px"></button>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <div class="product_description">
                                        <p>We accept the following file types: PDF, AI, SVG, EPS, PSD, JPG, TIF, PNG</p>
                                        <p>Files should be in the CMYK colorspace, if not they will be converted to CMYK
                                            andwe are not responsible if the results are not what you expected.</p>
                                        <p>Finally, for large file transfers (over 100mb total), we recommend uploading them
                                            AFTER the order is placed, to avoid a long order confirmation wait when you hit
                                            the final payment button.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <label for="Additional_file_notes" class="form-label">Additional File Notes<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="Additional_file_notes"
                                        name="Additional_file_notes" placeholder="Enter Height" required />
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="uploader_area " id="upload_image_area">
                                        <img id="preview_image"
                                            style="display:none; max-width: 100px; max-height: 100px;">
                                        <img src="assets/website/images/svg/upload_image.svg" id="preview_image">
                                    </div>
                                    <!-- Hidden file input -->
                                    <input type="file" name="Additional_file" id="image_input" accept="image/*"
                                        style="display:none;">
                                    <!-- Image preview area -->
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="add-to-cart-button-wrapper mt-3">
                                        <input type="submit" value="Add To Cart" class="add-to-cart-btn"
                                            name="add-to-cart" id="add-to-cart">
                                        <a href="{{ route('home') }}" class="back_btn">Back</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="product_page_description_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="products_details_sec_title">
                        Description
                    </h1>
                </div>
            </div>
            <div class="row  align-items-center">
                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12  mt-4">
                    <div class="description_item_wrapper">
                        <img src="assets/website/images/Group_1597881064.png">
                        <div class="description_item_content">
                            <h1 class="description_item_content_heading">Dibond</h1>
                            <p class="description_item_content_paragraph">An excellent and durable material originally
                                designed for building facades. It consists of a black polyethylene core with .012″ aluminum
                                faces on both sides. Easy to cut and shape with a pleasing gloss enamel white finish on both
                                sides. It won’t bow or oil can like standard metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b>3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b>48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b> White/White</li>
                                <li><b>Finish:</b> Gloss</li>
                                <li><b>Durability:</b> Long Term</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12  mt-4">
                    <div class="description_item_wrapper">
                        <img src="assets/website/images/Group_1597881065.png">
                        <div class="description_item_content">
                            <h1 class="description_item_content_heading">Coroplast</h1>
                            <p class="description_item_content_paragraph">An excellent and durable material originally
                                designed for building facades. It consists of a black polyethylene core with .012″ aluminum
                                faces on both sides. Easy to cut and shape with a pleasing gloss enamel white finish on both
                                sides. It won’t bow or oil can like standard metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b>3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b>48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b>White/White</li>
                                <li><b>Finish:</b>Gloss</li>
                                <li><b>Durability:</b>Long Term</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 mt-4">
                    <div class="description_item_wrapper">
                        <img src="assets/website/images/Group_1597881066.png">
                        <div class="description_item_content">
                            <h1 class="description_item_content_heading">Lusterboard</h1>
                            <p class="description_item_content_paragraph">An excellent and durable material originally
                                designed for building facades. It consists of a black polyethylene core with .012″ aluminum
                                faces on both sides. Easy to cut and shape with a pleasing gloss enamel white finish on both
                                sides. It won’t bow or oil can like standard metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b>3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b>48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b>White/White</li>
                                <li><b>Finish:</b>Gloss</li>
                                <li><b>Durability:</b>Long Term</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 mt-4">
                    <div class="description_item_wrapper">
                        <img src="assets/website/images/Group_1597881067.png">
                        <div class="description_item_content">
                            <h1 class="description_item_content_heading">PVC aka Sintra</h1>
                            <p class="description_item_content_paragraph">An excellent and durable material originally
                                designed for building facades. It consists of a black polyethylene core with .012″ aluminum
                                faces on both sides. Easy to cut and shape with a pleasing gloss enamel white finish on both
                                sides. It won’t bow or oil can like standard metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b>3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b>48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b>White/White</li>
                                <li><b>Finish:</b>Gloss</li>
                                <li><b>Durability:</b>Long Term</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <a href="{{ route('home') }}" class="description_see_more_btn">
                        See More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="container ">
        <div class="d-flex justify-content-between align-items-center mt-5 mb-2">
            <h2 class="heading">Similar Equipment</h2>
        </div>
        <div class="swiper  " id="Simmilar_Equipments_sec">
            <div class="swiper-wrapper swiper-wrapper3 ">
                <div class="swiper-slide">
                    <div>
                        <img class="Equipment_product_img" src="assets/website/images/1.png" />
                        <div class="Product_content_wrapper">
                            <p class="product_title"> 5 Agfa Titan HS 60" X <br> 120" Flatbed UV Printer</p>
                            <a href="" class="arrow_btn "><img src="/assets/website/images/svg/Vector.svg"></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">

                    <div>
                        <img class="Equipment_product_img" src="assets/website/images/2.png" />
                        <div class="Product_content_wrapper">
                            <p class="product_title"> 5 Agfa Titan HS 60" X <br> 120" Flatbed UV Printer</p>
                            <a href="{{ route('product_detail') }}" class="arrow_btn "><img
                                    src="/assets/website/images/svg/Vector.svg"></a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div>
                        <img class="Equipment_product_img" src="assets/website/images/3.png" />

                        <div class="Product_content_wrapper">
                            <p class="product_title"> 5 Agfa Titan HS 60" X <br> 120" Flatbed UV Printer</p>
                            <a href="{{ route('product_detail') }}" class="arrow_btn "><img
                                    src="/assets/website/images/svg/Vector.svg"></a>
                        </div>

                    </div>
                </div>


                <div class="swiper-slide">
                    <div>
                        <img class="Equipment_product_img" src="assets/website/images/4.png" />
                        <div class="Product_content_wrapper">
                            <p class="product_title"> 5 Agfa Titan HS 60" X <br> 120" Flatbed UV Printer</p>
                            <a href="{{ route('product_detail') }}" class="arrow_btn "><img
                                    src="/assets/website/images/svg/Vector.svg"></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div>
                        <img class="Equipment_product_img"src="assets/website/images/1.png" />
                        <div class="Product_content_wrapper">
                            <p class="product_title"> 5 Agfa Titan HS 60" X <br> 120" Flatbed UV Printer</p>
                            <a href="{{ route('product_detail') }}" class="arrow_btn "><img
                                    src="/assets/website/images/svg/Vector.svg"></a>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">

                    <div>
                        <img class="Equipment_product_img" src="assets/website/images/2.png" />
                        <div class="Product_content_wrapper">
                            <p class="product_title"> 5 Agfa Titan HS 60" X <br> 120" Flatbed UV Printer</p>
                            <a href="{{ route('product_detail') }}" class="arrow_btn "><img
                                    src="/assets/website/images/svg/Vector.svg"></a>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div>
                        <img class="Equipment_product_img" src="assets/website/images/1.png" />
                        <div class="Product_content_wrapper">
                            <p class="product_title"> 5 Agfa Titan HS 60" X <br> 120" Flatbed UV Printer</p>
                            <a href="{{ route('product_detail') }}" class="arrow_btn "><img
                                    src="/assets/website/images/svg/Vector.svg"></a>
                        </div>
                    </div>
                </div>


            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>





@endsection
@section('script')
    <script>
        var swiper = new Swiper("#Simmilar_Equipments_sec", {
            slidesPerView: 1, // Default number of slides visible at a time
            spaceBetween: 20, // Space between each slide
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next", // Your custom "next" button
                prevEl: ".prev", // Your custom "prev" button
            },
            breakpoints: {
                // When window width is >= 1200px
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                // When window width is >= 992px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                // When window width is >= 768px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                // When window width is < 768px
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
        });


        $(document).ready(function() {
            $('.other_img').on('click', function(e) {
                e.preventDefault();
                var src = $(this).attr('src');
                $('#featured_img').attr('src', src);
            })
            // When the upload area is clicked, trigger the file input
            $('#upload_image_area').on('click', function() {
                $('#image_input').click();
            });

            // When an image is selected, display it in the preview area
            $('#image_input').on('change', function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Set the preview image's src to the selected file
                    $('#preview_image').attr('src', e.target.result);
                    // Show the preview image
                    $('#preview_image').show();
                    // Optionally hide the upload icon or keep it
                    $('#upload_icon').hide();
                }
                // Read the selected file as DataURL
                reader.readAsDataURL(event.target.files[0]);
            });
        });
    </script>
@endsection
