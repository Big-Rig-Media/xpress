<footer role="contentinfo">
  @if( class_exists('ACF') )
    @switch( get_field('footer_component', 'option') )
      @case('footer-a')
        @include('partials.footers.footer-a')
      @break
      @case('footer-b')
        Footer B
      @break
      @case('footer-c')
        Footer C
      @break
      @default
        Nothing Yet
      @break
    @endswitch
  @endif
</footer>
