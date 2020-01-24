<header role="banner">
  @if( class_exists('ACF') )
    @switch( get_field('header_component', 'option') )
      @case('header-a')
        @include('partials.headers.header-a')
      @break
      @case('header-b')
        Header B
      @break
      @case('header-c')
        Header C
      @break
      @default
        Nothing Yet
      @break
    @endswitch
  @endif
</header>
