<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JCLothes || Make Your Ideas Into Reality</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font style -->
    <style>
        /*=============== GOOGLE FONTS ===============*/
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");

        html {
            font-family: 'Roboto', sans-serif;
        }

        .text-auth:hover {
            color: rgb(150, 150, 248);
        }
        .text-auth {
            margin-right: 5px; color: rgb(128, 128, 128); font-size: 17px; font-weight: 500;transition:0.5s;
        }
    </style>

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="{{ url('assets/img/favicon/favicon.ico') }}" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ url('assets/css/swiper-bundle.min.css') }}">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
</head>

<body class="antialiased">
    <!--==================== HEADER ====================-->
    <!-- headerrrrr -->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo "><img src="assets/img/favicon/favicon.ico" alt="">JCLothes</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#custom" class="nav__link">Design</a>
                    </li>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">Our Product</a>
                    </li>
                    <li class="nav__item">
                        <a href="#new" class="nav__link">New Design</a>
                    </li>
                </ul>

                <!-- close tab navbar responsive -->

                <div class="nav__close" id="nav-close">
                    <i class="bx bx-x"></i>
                </div>
            </div>
            <!-- navButton dark mode dan chart -->
            <div class="nav__btns">
                <!-- Theme change button -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <div class="nav__shop" id="cart-shop">
                    <i class='bx bx-shopping-bag'></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>

            </div>
            <div
                class="sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/home') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-auth">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-auth">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>
    </header>

    <!--==================== CART ====================-->
    <div class="cart" id="cart">
        <i class='bx bx-x cart__close' id="cart-close"></i>

        <h2 class="cart__title-center">Keranjang saya</h2>

        <div class="cart__container">

        </div>

        <div class="cart__prices sm:flex sm:gap-6">
            {{-- <span class="cart__prices-item">3 items</span>
            <span class="cart__prices-total">Rp.375.000,00</span> --}}
            @if (Route::has('login'))
                <div class="w-16 mx-auto sm:flex sm:justify-between" style="height: 50px; flex-direction: column;">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
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
                <article class="products__card">
                    <img src="assets/img/product/satoru.png" alt="" class="products__img">

                    <h3 class="products__title">Satoru</h3>
                    <span class="products__price">Rp.50.000,00</span>

                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>

                <article class="products__card">
                    <img src="assets/img/product/hoodieGojo.png" alt="" class="products__img">

                    <h3 class="products__title">Gojo Design</h3>
                    <span class="products__price">Rp.150.000,00</span>

                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>

                <article class="products__card">
                    <img src="assets/img/product/varsity.png" alt="" class="products__img">

                    <h3 class="products__title">Varsity Custom</h3>
                    <span class="products__price">Rp.450.000,00</span>

                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>

                <article class="products__card">
                    <img src="assets/img/product/MOON1.png" alt="" class="products__img">

                    <h3 class="products__title">Moon Tshirt</h3>
                    <span class="products__price">Rp.55.000,00</span>

                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>

                <article class="products__card">
                    <img src="assets/img/product/ghostrideHoodie.png" alt="" class="products__img">

                    <h3 class="products__title">Ghost Ride Hoodie</h3>
                    <span class="products__price">Rp.150.000,00</span>

                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>
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
                                <img src="assets/img/testimonial1.jpg" alt=""
                                    class="testimonial__perfil-img">

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
                                Nazeda Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
                                tempora, nihil deserunt hic aperiam assumenda eveniet iusto voluptatibus enim
                                pariatur, sequi ipsa nulla aliquam, perferendis quasi. Iste numquam voluptatum
                                praesentium!
                            </p>
                            <h3 class="testimonial__date">Sep 2 23</h3>

                            <div class="testimonial__perfil">
                                <img src="assets/img/testimonial1.jpg" alt=""
                                    class="testimonial__perfil-img">

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
                    <div class="testimonial__square"></div>
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

                            <img src="assets/img/product/hoodieTampakBelakang.png">

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

    <!--=============== SWIPER JS ===============-->
    <script src="{{ url('assets/js/swiper-bundle.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ url('assets/js/main.js') }}"></script>
    </div>
    </div>
</body>

</html>
