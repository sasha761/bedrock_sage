<header class="l-header">
  <div class="l-header__top">
    <div class="u-container">
      <div class="l-header__top-flex">
        <a class="c-logo" href="#">
          <img src="@asset('images/logo.svg')">
        </a>

        @include('forms.search')

        <a href="#" class="c-user">
          <img src="@asset('images/user.svg')">
        </a>
        
        <a href="#" class="u-btn is-purple is-cart">
          <img src="@asset('images/cart.svg')">
          <span class="c-price">£0.00</span>
        </a>
      </div>
    </div>
  </div>
  <div class="l-header__bottom">
    <div class="u-container">
      <button class="js-menu-btn">
        <img src="@asset('images/burger-icon.svg')">
        <span>Products</span>
      </button>
    </div>
  </div>
  <div class="l-header__menu">
    <div class="u-container">
      @if (has_nav_menu('primary_navigation'))
        @include('partials.menu')
      @endif
      
      @include('forms.search')
    </div>
  </div>
</header>
