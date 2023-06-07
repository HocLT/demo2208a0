@extends('fe.layout.layout')

@section('contents')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="breadcrumb__text">
                  <h4>Check Out</h4>
                  <div class="breadcrumb__links">
                      <a href="./index.html">Home</a>
                      <a href="./shop.html">Shop</a>
                      <span>Check Out</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
      <div class="checkout__form">
          <form action="{{ Route('saveCart') }}" method="post">
            @csrf
            <input type="hidden" name="uid" value="{{ \Sentinel::check()->id }}"/>
              <div class="row">
                  <div class="col-lg-8 col-md-6">
                      <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                      here</a> to enter your code</h6>
                      <h6 class="checkout__title">Billing Details</h6>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Fist Name<span>*</span></p>
                                  <input type="text" value="{{ isset(\Sentinel::check()->first_name)?\Sentinel::check()->first_name: '' }}">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Last Name<span>*</span></p>
                                  <input type="text">
                              </div>
                          </div>
                      </div>
                      <div class="checkout__input">
                          <p>Address<span>*</span></p>
                          <input type="text" placeholder="Street Address" class="checkout__input__add">
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Phone<span>*</span></p>
                                  <input type="text">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Email<span>*</span></p>
                                  <input type="text" value="{{ isset(\Sentinel::check()->email)?\Sentinel::check()->email: '' }}">
                              </div>
                          </div>
                      </div>
                      <div class="checkout__input__checkbox">
                          <label for="diff-acc">
                              Note about your order, e.g, special noe for delivery
                              <input type="checkbox" id="diff-acc">
                              <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="checkout__input">
                          <p>Order notes</p>
                          <input type="text"
                          placeholder="Notes about your order, e.g. special notes for delivery.">
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="checkout__order">
                          <h4 class="order__title">Your order</h4>
                          <div class="checkout__order__products">Product <span>Total</span></div>
                          <ul class="checkout__total__products">
                          @php
                          $total = 0;
                          @endphp
                          @if (\Session::has('cart'))
                          @foreach(\Session::get('cart') as $item)
                              <li>{{ $item->product->name }} <span>{{ $item->product->price }} đ</span></li>
                              @php
                                $total += $item->product->price * $item->quantity;
                              @endphp
                          @endforeach
                          @endif
                          </ul>
                          <ul class="checkout__total__all">
                              <li>Subtotal <span>{{ $total }} đ</span></li>
                              <li>Total <span>{{ $total }} đ</span></li>
                          </ul>
                          <div class="checkout__input__checkbox">
                              <label for="acc-or">
                                  Create an account?
                                  <input type="checkbox" id="acc-or">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                          ut labore et dolore magna aliqua.</p>
                          <div class="checkout__input__checkbox">
                              <label for="payment">
                                  Check Payment
                                  <input type="checkbox" id="payment">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="checkout__input__checkbox">
                              <label for="paypal">
                                  Paypal
                                  <input type="checkbox" id="paypal">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          <button type="submit" class="site-btn">PLACE ORDER</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
</section>
<!-- Checkout Section End -->
@endsection