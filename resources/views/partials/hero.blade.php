@if( class_exists('ACF') && get_field('hero_component') )
  @php
    // Define fields
    $hero_wdt = get_field('hero_width');
    $hero_mbl = get_field('hero_background_image')['sizes']['w960x562'] ?: App\asset_path('images/placeholders/920x562.png');
    $hero_dsk = get_field('hero_background_image')['sizes']['w1920x562'] ?: App\asset_path('images/placeholders/1920x562.png');
    $hero_cnt = get_field('hero_content') ?: 'Your Hero Content';

    // Consolidate all options to pass to partials
    $options = [
      'width'   => $hero_wdt,
      'mobile'  => $hero_mbl,
      'desktop' => $hero_dsk,
      'content' => $hero_cnt,
    ];
  @endphp
  <section class="{{ $hero_wdt === 'full' ? 'w-full' : 'w-full max-w-10xl mx-auto' }} hero">
    @switch( get_field('hero_component') )
      @case('hero-a')
        @include('partials.heroes.hero-a', [$options])
      @break
      @case('hero-b')
        @include('partials.heroes.hero-b', [$options])
      @break
      @case('hero-c')
        @include('partials.heroes.hero-c', [$options])
      @break
      @default
      @break
    @endswitch
  </section>
@endif
