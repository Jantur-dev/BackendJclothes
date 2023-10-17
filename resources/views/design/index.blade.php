<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/x-icon">

        <!--=============== BO  1XICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/design/css/style.css">

        <title>JCLothes || Create Your Des</title>
    </head>

<body>
    <header class="header" id="header">
        <nav class="nav container primary-navigation">
            <a href="#" class="nav__logo "><img src="assets/img/logoBlackMode.png" class="nav__logo">JCLothes</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="/home" class="nav__link ">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="/design" class="nav__link active-link">Design Own &dtrif;</a>
                        <ul class="dropdown" style="position: absolute">
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
            <!-- navButton dark mode dan chart -->
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
                            <img src="{{ url('assets/img/product/' . $pesanan_detail->barang->gambar) }}"
                                alt="" class="cart__img">
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

    <!-- Main Home -->
    <!--==================== MAIN ====================-->
    <!-- <div class="main"> -->
    <!-- button right -->

    <div class="home__container container grid">
        <div class="Main">
            <div class="ButtonRightContainer">
                <div class="container__button__right">
                    <div class="Icon">
                        <div class="button__right">
                            <div class="div__rotate">
                                <!-- <img class="button__rightImg" > -->
                                <i class='bx bx-rotate-right'></i>
                                <!-- <div style="color: rgba(0, 0, 0, 0.54); font-size: 24px; font-family: Material Icons; font-weight: 400; line-height: 24px; word-wrap: break-word">360</div> -->
                                <div class="SpanTextUppercase">
                                    <div class="button__title">Rotate</div>
                                </div>
                            </div>
                            <div class="div__select__all">
                                <i class='bx bx-selection'></i>
                                <div class="SpanTextUppercase">
                                    <div class="button__title">Select All</div>
                                </div>
                            </div>
                            <div class="div__clear">
                                <i class='bx bxs-eraser'></i>
                                <div class="SpanTextUppercase">
                                    <div class="button__title">Clear</div>
                                </div>
                            </div>
                            <div class="div__undo">
                                <i class='bx bx-undo'></i>
                                <div class="SpanTextUppercase">
                                    <div class="button__title">Undo</div>
                                </div>
                            </div>
                            <div class="div__redo">
                                <i class='bx bx-redo'></i>
                                <div class="SpanTextUppercase">
                                    <div class="button__title">Redo</div>
                                </div>
                            </div>
                            <div class="div__zoom">
                                <i class='bx bxl-zoom'></i>
                                <div class="SpanTextUppercase">
                                    <div class="button__title">Zoom</div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="DivMT1" style="width: 83px; height: 104px"></div> -->
                    </div>
                </div>
            </div>
            <div class="container__design">
                <img src="assets/design/img_design/tshirtDesign.png" alt="" style="margin-top: 45px;">
            </div>
            <div class="add__design__panel"></div>
            <div class="container__panel">
                <div class="margin__heading__dan__button">
                    <div class="text__panel">
                        <div class="heading__panel">Kreasikan DesignMu </div>
                        <div class="sub__heading__panel">Apa Yang Kamu Butuhkan Untuk DesignMu ?.</div>
                    </div>
                    <div class="container__add__design">
                        <div class="Item"
                            style=" justify-content: flex-start; align-items: center; display: inline-flex">
                            <div class="ImgMargin"
                                style="width: 40px; align-self: stretch; padding-right: 16px; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                                <i class='bx bx-image-add'></i>
                            </div>
                            <div class="text__panel__list">
                                <div class="text__inside">Add Image</div>
                            </div>
                            <div class="margin__image">
                                <i class='bx bxs-chevron-right'></i>
                            </div>
                        </div>
                        <div class="Item"
                            style=" justify-content: flex-start; align-items: center; display: inline-flex">
                            <div class="ImgMargin"
                                style="width: 40px; align-self: stretch; padding-right: 16px; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                                <i class='bx bx-text'></i>
                            </div>
                            <div class="text__panel__list">
                                <div class="text__inside">Add Text</div>
                            </div>
                            <div class="margin__image">
                                <i class='bx bxs-chevron-right'> </i>
                            </div>
                        </div>
                        <div class="Item"
                            style="align-self: stretch;  background: var(container); justify-content: flex-start; align-items: center; display: inline-flex">
                            <div class="ImgMargin"
                                style="width: 40px; align-self: stretch; padding-right: 16px; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                                <i class='bx bxs-spray-can'></i>
                            </div>
                            <div class="text__panel__list"></div>
                            <div class="text__inside">Add Art</div>
                            <div class="margin__image">
                                <i class='bx bxs-chevron-right'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view__container__bottom">
                <div class="text__view__bottom">
                    <div class="ViewFront">View : Front</div>
                </div>
                <div class="view__blue__container">
                    <div class="ImgMargin"
                        style="width: 32px; align-self: stretch; padding-right: 8px; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                        <i class='bx bx-rotate-left blue'></i>
                    </div>
                    <div class="text__blue__container">
                        <div class="PutarViewProduct">Putar View Product</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container__footer">
            <div class="text__footer">Custom Short Sleeves Design
                <div class="text__link__footer">Design Product Lainnya
                </div>
            </div>
        </div>

        <div class="image__of__currentProduct">
            <img src="assets/img/product/tshirtDesign.png" class="img__footer" alt="">
        </div>
        <button href="" class="footer__save__container">
            <div class="button__save">SAVE DESIGN</div>
        </button>
    </div>
    <!-- end main -->

    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>
