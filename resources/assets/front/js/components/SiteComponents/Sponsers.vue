<template>
  <div dir="ltr">
    <slick
    ref="slick" class="sponsers-slick"
    :options="slickOptions">
    <slot></slot>
  </slick>
</div>
</template>

<script>
 import LazyLoad from '../GeneralComponents/LazyLoad';
 import Slick from 'vue-slick';
 export default {
  name: "sponsers",
  components: { Slick, LazyLoad },

  data() {
    return {
      slickOptions: {
        slidesToShow: 6,
        draggable: true,
        autoplay: true,
        infinite: false,
        dots: false,
        arrows: true,
        dotsClass:'primary-dots transparent-bg-dots slick-dots',
        nextArrow: `<button class="button next-btn has-text-primary" aria-label="Next" type="button">
        <i class="fa-regular fa-arrow-left"></i>
        </button>`,
        prevArrow: `<button class="button prev-btn has-text-primary" aria-label="Prev" type="button">
        <i class="fa-regular fa-arrow-right"></i>
        </button>`,
        responsive: [
          {
            breakpoint: 1367,
            settings: {
              slidesToShow: 6,
            }
          },
          {
            breakpoint: 1201,
            settings: {
              slidesToShow: 5,
            }
          },
          {
            breakpoint: 769,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 522,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 421,
            settings: {
              slidesToShow: 2,
            }
          },
          ]

      },
    };
  },
  methods: {

  },
}
</script>
<style>

</style>
