@extends('fe.layout.layout')

@section('contents')
<!-- Hero Section Begin -->
<section class="hero">
  @include('fe.index.hero')
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<section class="banner spad">
  @include('fe.index.banner')
</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
  @include('fe.index.product')
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
  @include('fe.index.category')
</section>
<!-- Categories Section End -->

<!-- Instagram Section Begin -->
<section class="instagram spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
              <div class="instagram__pic">
                  <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-1.jpg"></div>
                  <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-2.jpg"></div>
                  <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-3.jpg"></div>
                  <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-4.jpg"></div>
                  <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-5.jpg"></div>
                  <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-6.jpg"></div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="instagram__text">
                  <h2>Instagram</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.</p>
                  <h3>#Male_Fashion</h3>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title">
                  <span>Latest News</span>
                  <h2>Fashion New Trends</h2>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="blog__item">
                  <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                  <div class="blog__item__text">
                      <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                      <h5>What Curling Irons Are The Best Ones</h5>
                      <a href="#">Read More</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="blog__item">
                  <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                  <div class="blog__item__text">
                      <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                      <h5>Eternity Bands Do Last Forever</h5>
                      <a href="#">Read More</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="blog__item">
                  <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                  <div class="blog__item__text">
                      <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                      <h5>The Health Benefits Of Sunglasses</h5>
                      <a href="#">Read More</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Latest Blog Section End -->
@endsection