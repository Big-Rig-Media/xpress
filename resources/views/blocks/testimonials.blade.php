{{--
  Title: Testimonials
  Description: Add a testimonials carousel
  Category: common
  Icon: format-quote
  Keywords: testimonials
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  @php
    // Define fields
    $testimonials_wdt = get_field('testimonial_width');
    $testimonials_mbl = get_field('testimonial_background_image')['sizes']['w960x562'] ?: App\asset_path('images/placeholders/920x562.png');
    $testimonials_dsk = get_field('testimonial_background_image')['sizes']['w1920x562'] ?: App\asset_path('images/placeholders/1920x562.png');
    $testimonials_cnt = get_field('testimonial_content');
  @endphp
  <section id="{{ $block['keywords'][0] }}" class="{{ $testimonials_wdt === 'full' ? 'w-full' : 'w-full max-w-10xl mx-auto' }} py-8 md:py-24 text-white bg-primary-1 bg-center bg-cover bg-no-repeat testimonials" data-mobile="{{ $testimonials_mbl }}" data-desktop="{{ $testimonials_dsk }}" style="background-image:url({{ $testimonials_dsk }})">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      @if( $testimonials_cnt )
        {!! apply_filters('the_content', $testimonials_cnt) !!}
      @endif
      {!! do_shortcode('[testimonials]') !!}
    </div>
  </section>
@endif

