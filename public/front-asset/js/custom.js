
// related product slider script
var swiper = new Swiper(".mySwiper", {
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    // home slider script
    var swiper = new Swiper(".myswiper-slide", {
        slidesPerView: 2,
        spaceBetween: 0,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        loop: true,
      });

    //   taggle mune script
  
     $(document).ready(function(){
        $(".toggle-mune i").click(function(){
            $(".mobile-mune").toggleClass("active");
        });
     });

     $(document).ready(function(){
      $('.share-button').on('mouseenter',function(){
          $('.share-link').removeClass('share-option');
      })
      $('.share-button').on('mouseleave',function(){
          $('.share-link').addClass('share-option');
      })
      // $('.share-button').on('click',function(){
      //     $('.share-link').toggle('share-option');
      // })
  })

  // fillter tab section
  $(document).ready(function(){
    $('.filter-comment a').on('click',function(event){
        let index = $(this).index();
        $('.filter-comment a').removeClass('active');
        $(this).addClass('active');

        $('.tab-comment').hide();
        $('.tab-comment').eq(index).show();

        localStorage.setItem('tabCound',index);
    });

    let getTabcount = localStorage.getItem('tabCound');
    $('.filter-comment a').eq(getTabcount).addClass('active');
    $('.tab-comment').eq(getTabcount).show();
})

