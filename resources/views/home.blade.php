@extends('layouts.app')

@section('content')
    <!--==================== HEADER ====================-->
    <!-- headerrrrr -->
    <header class="header" id="header">
        <nav class="nav container primary-navigation">
            <a href="#" class="nav__logo "><img src="assets/img/logoBlackMode.png" alt="">JCLothes</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="/design" class="nav__link">Design Own &dtrif;</a>
                        <ul class="dropdown" style="position: absolute;">
                            <?php
                            $data = DB::table('design_categories')->get();
                            ?>
                            @foreach ($data as $item)
                                <li><a href="/design/{{ $item->nama }}">{{ ucfirst($item->nama) }}</a></li>
                            @endforeach
                        </ul>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">Our Product</a>
                    </li>
                    <li class="nav__item">
                        <a href="#new" class="nav__link">Contact</a>
                    </li>
                </ul>

                <!-- close tab navbar responsive -->

                <div class="nav__close" id="nav-close">
                    <i class="bx bx-x"></i>
                </div>
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <div class="nav__shop" id="cart-shop">
                    <?php
                    $pesanan_utama = App\Models\Pesanan::where('user_id', Auth::user()->id)
                        ->where('status', 0)
                        ->first();
                    if (!empty($pesanan_utama)) {
                        $notif = App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                    }
                    ?>
                    <i class='bx bx-shopping-bag'></i>
                    @if (!empty($notif))
                        <span class="badge"
                            style="visibility: <?= $notif == 0 ? 'hidden' : 'visible' ?>">{{ $notif }}</span>
                    @endif
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>

                <div>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle fw-bold" href="" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
            </div>
        </nav>
    </header>

    <!--==================== CART ====================-->
    <div class="cart" id="cart">
        <i class='bx bx-x cart__close' id="cart-close"></i>

        <h2 class="cart__title-center">Keranjang saya</h2>

        <div class="cart__container">
            <?php
            $pesanan = App\Models\Pesanan::where('user_id', Auth::user()->id)
                ->where('status', 0)
                ->first();
            if (!empty($pesanan)) {
                $pesanan_details = App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get();
            }
            ?>
            @if (!empty($pesanan_details))
                @foreach ($pesanan_details as $pesanan_detail)
                    <article class="cart__card">
                        <div class="cart__box">
                            <img src="{{ url('assets/img/product/' . $pesanan_detail->barang->gambar) }}" alt=""
                                class="cart__img">
                        </div>

                        <div class="cart__details">
                            <h3 class="cart__title">{{ $pesanan_detail->barang->nama_barang }}</h3>
                            <span class="cart__price">Rp.{{ number_format($pesanan_detail->barang->harga) }}</span>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>

        <div class="cart__prices">
            {{-- <span class="cart__prices-item">3 items</span>
            <span class="cart__prices-total">Rp.375.000,00</span> --}}
            <a href="/checkout">detail</a>
        </div>
    </div>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <div class="home__container container grid">
                <div class="home__img-bg">
                    <img src="assets/img/product/satoru.png" alt="PageHome" class="home__img">
                </div>

                <div class="home__social">
                    <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                        Facebook
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="home__social-link">
                        Twitter
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                        Instagram
                    </a>
                </div>

                <div class="home__data">
                    <h1 class="home__title">JCLothes<br> We Bring Your Ideas <br> Into Life</h1>

                    <p class="home__description">
                        Pakai pakaian sesuai keinginan <br>
                        Ciptakan StyleMu sendiri

                    </p>

                    <div class="home__btns">
                        <a href="#" class="button button--gray button--small">
                            Desain Sekarang
                        </a>

                    </div>
                </div>
            </div>
        </section>

        <!--==================== FEATURED ====================-->
        <section class="featured section container" id="Design">
            <h2 class="section__title">
                Design Now
            </h2>

            <div class="featured__container grid">
                <article class="featured__card">
                    <span class="featured__tag">Design It</span>

                    <img src="assets/img/product/tshirtDesign.png" class="featured__img">

                    <div class="featured__data">
                        <h3 class="featured__title">T-Shirt</h3>
                        <span class="featured__price">Rp.55.000,00</span>
                    </div>

                    <button class="button featured__button">ADD TO CART</button>
                </article>


                <article class="featured__card">
                    <span class="featured__tag">Design It</span>

                    <img src="assets/img/product/Longsleeves.png" alt="" class="featured__img">

                    <div class="featured__data">
                        <h3 class="featured__title">Long Sleeves</h3>
                        <span class="featured__price">Rp.70.000,00</span>
                    </div>

                    <button class="button featured__button">ADD TO CART</button>

                </article>
                <article class="featured__card">
                    <span class="featured__tag">Design It</span>

                    <img src="assets/img/product/hoodieDesign.png" class="featured__img">

                    <div class="featured__data">
                        <h3 class="featured__title">Hoodie</h3>
                        <span class="featured__price">Rp.150.000,00</span>
                    </div>

                    <button class="button featured__button">ADD TO CART</button>
                </article>
            </div>
        </section>

        <!--==================== Template design ====================-->
        <section class="story section container">
            <div class="story__container grid">
                <div class="story__data">
                    <h2 class="section__title story__section-title">
                        Our Design
                    </h2>

                    <h1 class="story__title">
                        Bingung mau nyetak design apa?
                    </h1>

                    <p class="story__description">
                        Santai aja, kita udah nyiapin design yang bisa kalian pakai juga yak
                    </p>

                    <a href="#" class="button button--small">Cek Disini</a>
                </div>

                <div class="story__images">
                    <img src="assets/img/product/satoru.png" alt="" class="story__img">
                    <div class="story__square"></div>
                </div>
            </div>
        </section>

        <!--==================== PRODUCTS template design====================-->
        <section class="products section container" id="products">
            <h2 class="section__title">
                See Our Design
            </h2>

            <div class="products__container grid">
                @foreach ($barangs as $barang)
                    <article class="products__card">
                        <a href="pesan/{{ $barang->id }}">
                            <div
                                style="width: 100%; height: 100%; position: absolute; top: 0; background-color: <?= $barang->stok == 0 ? 'rgba(0,0,0,0.5)' : '' ?>">
                            </div>
                            <img src="{{ url('assets/img/product/' . $barang->gambar) }}" alt=""
                                class="products__img">

                            <h3 class="products__title">{{ $barang->nama_barang }}</h3>
                            <span class="products__price">Rp{{ number_format($barang->harga) }}</span>

                            <a href="pesan/{{ $barang->id }}" class="products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>

        <!--==================== TESTIMONIAL ====================-->
        <section class="testimonial section container">
            <div class="testimonial__container grid">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">
                        <div class="testimonial__card swiper-slide">
                            <div class="testimonial__quote">
                                <i class='bx bxs-quote-alt-left'></i>
                            </div>
                            <p class="testimonial__description">
                                Kimi Ga areda ora ora
                            </p>
                            <h3 class="testimonial__date">Sep 2 23</h3>

                            <div class="testimonial__perfil">
                                <img src="assets/img/testimonial1.jpg" alt="" class="testimonial__perfil-img">

                                <div class="testimonial__perfil-data">
                                    <span class="testimonial__perfil-name">Ikhsan D Saktiawan</span>
                                    <span class="testimonial__perfil-detail">Eko Ceo</span>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial__card swiper-slide">
                            <div class="testimonial__quote">
                                <i class='bx bxs-quote-alt-left'></i>
                            </div>
                            <p class="testimonial__description">
                                Nazeda Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique tempora, nihil
                                deserunt hic aperiam assumenda eveniet iusto voluptatibus enim pariatur, sequi ipsa nulla
                                aliquam, perferendis quasi. Iste numquam voluptatum praesentium!
                            </p>
                            <h3 class="testimonial__date">Sep 2 23</h3>

                            <div class="testimonial__perfil">
                                <img src="assets/img/testimonial1.jpg" alt="" class="testimonial__perfil-img">

                                <div class="testimonial__perfil-data">
                                    <span class="testimonial__perfil-name">Joko Jondo</span>
                                    <span class="testimonial__perfil-detail">Guru Informatika</span>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial__card swiper-slide">
                            <div class="testimonial__quote">
                                <i class='bx bxs-quote-alt-left'></i>
                            </div>
                            <p class="testimonial__description">
                                Kaizokuoni ore wa naru
                            </p>
                            <h3 class="testimonial__date">Sep 2 23</h3>

                            <div class="testimonial__perfil">
                                <img src="assets/img/testimonial.jpg" alt="" class="testimonial__perfil-img">

                                <div class="testimonial__perfil-data">
                                    <span class="testimonial__perfil-name">Jamaludin</span>
                                    <span class="testimonial__perfil-detail">Director of a company</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next">
                        <i class='bx bx-right-arrow-alt'></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class='bx bx-left-arrow-alt'></i>
                    </div>
                </div>
                
                <div class="testimonial__images">
                    <div class="testimonial__square">
                        <div class="testimonial_comment_container">
                            <div class="testimonial_comment_head">
                                <img src="assets/img/testimonial1.jpg" alt="">
                                <div class="rating-container">
                                    <h3>Add a comment</h3>
                                    <div class="rating">
                                        <i class='bx bxs-star star' onclick=""></i>
                                        <i class='bx bxs-star star'></i>
                                        <i class='bx bxs-star star'></i>
                                        <i class='bx bxs-star star'></i>
                                        <i class='bx bxs-star star'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="comment">
                                <form action="" method="post">
                                    <textarea name="comment" id="comment" placeholder="Comment"></textarea>
                                    <div class="button-container">
                                        <button type="submit" name="submit" class="kirim">Kirim</button>
                                        <button type="submit" name="cancel" class="cancel">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <img src="assets/img/testimonial.png" alt="" class="testimonial__img">
                </div>
            </div>
        </section>

        <!--==================== NEW ====================-->
        <section class="new section container" id="new">
            <h2 class="section__title">
                Our Best Design
            </h2>

            <div class="new__container">
                <div class="swiper new-swiper">
                    <div class="swiper-wrapper">
                        <article class="new__card swiper-slide">
                            <span class="new__tag">The Best Of The Week</span>

                            <img src="assets/img/product/satoru.png" alt="" class="new__img">

                            <div class="new__data">
                                <h3 class="new__title">Satoru</h3>
                                <span class="new__price">Rp,55.000,00</span>
                            </div>

                            <button class="button new__button">ADD TO CART</button>
                        </article>

                        <article class="new__card swiper-slide">
                            <span class="new__tag">New</span>

                            <img src="assets/img/product/EARTH1.png" alt="" class="new__img">

                            <div class="new__data">
                                <h3 class="new__title">Earth 001</h3>
                                <span class="new__price">Rp.50.000,00</span>
                            </div>

                            <button class="button new__button">ADD TO CART</button>
                        </article>

                        <article class="new__card swiper-slide">
                            <span class="new__tag">New</span>

                            <img src="assets/img/product/hoodieTampakBelakang.png" class="new__img">

                            <div class="new__data">
                                <h3 class="new__title">Gojo Hoodie</h3>
                                <span class="new__price">Rp.150.000,00</span>
                            </div>

                            <button class="button new__button">ADD TO CART</button>
                        </article>

                    </div>
                </div>
            </div>
        </section>

        <!--==================== NEWSLETTER ====================-->
        <section class="newsletter section container">
            <div class="newsletter__bg grid">
                <div>
                    <h2 class="newsletter__title">Subscribe Our <br> Newsletter</h2>
                    <p class="newsletter__description">
                        Don't miss out on your discounts. Subscribe to our email
                        newsletter to get the best offers, discounts, coupons,
                        gifts and much more.
                    </p>
                </div>

                <form action="" class="newsletter__subscribe">
                    <input type="email" placeholder="Enter your email" class="newsletter__input">
                    <button class="button">
                        SUBSCRIBE
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <h3 class="footer__title">Our information</h3>

                <ul class="footer__list">
                    <li>Email : jantur29@gmail.com</li>
                    <li>Purwokerto, Banyumas, Jawa Tengah</li>
                    <li>No Telepon : 089542277317</li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">About Us</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Support Center</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Customer Support</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Copy Right</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Supplier</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">BBA Salon</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">TeeLaunch</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">T-Pop</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Other Printing</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Social Media Kami</h3>

                <ul class="footer__social">
                    <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-facebook'></i>
                    </a>

                    <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-twitter'></i>
                    </a>

                    <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-instagram'></i>
                    </a>
                </ul>
            </div>
        </div>

        <span class="footer__copy">&#169; Jantur Dev || JCLothes</span>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>
@endsection
