@if( class_exists('ACF') && get_field('testimonial_component', 'option') )
  @php
    // Define fields
    $testimonials_mbl = get_field('hero_background_image')['sizes']['w960x562'] ?: App\asset_path('images/placeholders/920x562.png');
    $testimonials_dsk = get_field('hero_background_image')['sizes']['w1920x562'] ?: App\asset_path('images/placeholders/1920x562.png');
  @endphp
  <section class="py-8 md:py-16 text-white bg-primary-1" data-mobile={{ $testimonials_mbl }} data-desktop={{ $testimonials_dsk }}>
    <div class="w-full max-w-10xl mx-auto px-buffer">
      <h1>What Our Clients Are Saying</h1>
    </div>
  </section>
@endif
