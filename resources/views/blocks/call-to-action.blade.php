{{--
  Title: Call to Action
  Description: Induce your users with a specific message.
  Category: common
  Icon: megaphone
  Keywords: call-to-action
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  <section id="{{ $block['keywords'][0] }}" class="py-8 md:py-20 cta" style="background-color:{{ get_field('call_to_action_background_color') }}">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      {!! get_field('call_to_action_content') !!}
    </div>
  </section>
@endif
