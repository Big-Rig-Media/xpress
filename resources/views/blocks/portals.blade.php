{{--
  Title: Portals
  Description: Add portals to pages within your site.
  Category: common
  Icon: admin-links
  Keywords: portals
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  @if( have_rows('portals') )
    <section class="py-8 md:py-16 bg-white">
      <div class="w-full max-w-10xl mx-auto px-buffer">
        <div class="md:flex md:flex-row md:flex-wrap -mx-buffer js-portals">
          @while( have_rows('portals') ) @php the_row() @endphp
            @php
              // Define fields
              $image = get_sub_field('portal_image');
              $title = get_sub_field('portal_title');
              $excerpt = get_sub_field('portal_excerpt');
            @endphp
            <div class="md:w-1/3 mb-10 md:mb-0 px-buffer">
              @if( $image )
                <img class="mb-5" src="{{ $image }}" alt="{{ $title }}" />
              @else
                <img class="mb-5" src="{{ App\asset_path('images/placeholders/460x460.png') }}" alt="{{ $title }}" />
              @endif
              @if( $title )
                <h3>{{ $title }}</h3>
              @endif
              @if( $excerpt )
                {!! apply_filters('the_content', $excerpt) !!}
              @endif
            </div>
          @endwhile
        </div>
      </div>
    </section>
  @endif
@endif

