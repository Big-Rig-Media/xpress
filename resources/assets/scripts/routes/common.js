import { isExternal, isEmpty, dropdownState } from '../util/helpers'

export default {
  init() {
    // JavaScript to be fired on all pages
    const anchors = document.querySelectorAll('a')
    const paragraphs = document.querySelectorAll('p')
    const hamburger = document.querySelector('.js-hamburger')
    const dropdowns = document.querySelectorAll('.menu-item-has-children')
    const hero = document.querySelector('.js-hero')

    // Handle external urls
    anchors.forEach(anchor => {
      if (isExternal(anchor)) {
        // Define attributes to set
        const attributes = {
          target: '__blank',
          rel: 'noopener',
        }

        // Set attributes
        Object.keys(attributes).forEach(attribute => {
          anchor.setAttribute(attribute, attributes[attribute])
        })
      }
    })

    // Handle empty p tags
    paragraphs.forEach(isEmpty)

    // Handle hamburger toggle
    if (window.matchMedia('(max-width: 1199px)').matches) {
      if (hamburger) {
        hamburger.addEventListener('click', () => {
          document.body.classList.toggle('nav-is-open')
        })
      }
    }

    // Handle dropdowns visibility state
    if (window.matchMedia('(max-width: 1199px)').matches) {
      dropdowns.forEach(dropdown => {
        dropdown.setAttribute('data-state', 'closed')

        dropdown.addEventListener('click', dropdownState)
      })
    }

    // Handle hero background
    if (hero) {
      const mblHero = hero.dataset.mobile
      const dskHhero = hero.dataset.desktop

      if (mblHero && dskHhero) {
        if (window.matchMedia('(min-width: 1024px)').matches) {
          hero.style.backgroundImage = `url(${dskHhero})`
        } else {
          hero.style.backgroundImage = `url(${mblHero})`
        }
      }
    }

    // Handle portals & featured listings
    if (window.matchMedia('(max-width: 1023px)').matches) {
      if ($('.js-portals').length) {
        $('.js-portals').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 5000,
          arrows: false,
          dots: true,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 415,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        })
      }

      if ($('.js-listings').length) {
        $('.js-listings').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 5000,
          arrows: false,
          dots: true,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 415,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        })
      }
    }

    // Handle testimonials
    if ($('.js-testimonials').length) {
      $('.js-testimonials').slick({
        accessibility: true,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true,
        fade: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      })
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
