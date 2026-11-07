<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>FITA TEST</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/public/asset_home') }}/img/fita.png" rel="icon">
    <link href="{{ asset('/public/asset_home') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/public/asset_home') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/public/asset_home') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/public/asset_home') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('/public/asset_home') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('/public/asset_home') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('/public/asset_home') }}/css/main.css" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VYKZSPPCRW"></script>

</head>

<body>
{{-- header --}}
@include('user.layouts.headerlanding')


{{-- main menu --}}
@yield('main-content')


{{--footer  --}}
<footer id="footer" class="footer position-relative">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">FITA TEST</span>
                </a>

                <div class="social-links d-flex mt-4">
                    <a href="https://x.com/FitaTest2024" target="_blank"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/fitatest" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/fitatest" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Địa chỉ</h4>
                <ul>
                    <li><p>Học viện Nông nghiệp Việt Nam, Trâu Quỳ, Gia Lâm, Hà Nội, Việt Nam </p></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Phone</h4>
                <ul>
                    <li><span>0384 869 336</span></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Email</h4>
                <ul>
                    <li><span>fitatest2024@gmail.com</span></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="contact-button" onclick="toggleContact()">
        <span>+</span>
    </div>
    <div class="contact-menu">
        <ul>
            <li><a href="https://www.facebook.com/BTH.2106/" target="_blank" rel="nofollow"><i class="icon-facebook"></i></a></li>
            <li><a href="https://zalo.me/0384869336" target="_blank" rel="nofollow"><i class="icon-zalo"></i></a></li>
            <li>
                <a href="tel:0384869336" class="icon-call">
                    <i class="icon-phone"></i>
                </a>
            </li>
        </ul>
    </div>

<style>
    .contact-button {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: #388da8;
        border-radius: 50%;
        color: white;
        text-align: center;
        line-height: 50px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 10000000;
    }

    .contact-menu {
        position: fixed;
        bottom: 140px;
        right: 20px;
        display: none;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        padding: 10px;
        z-index: 10000000;
    }

    .contact-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .contact-menu ul li a {
        text-decoration: none;
        color: #515151;
        display: flex;
        align-items: center;
    }

    .contact-menu ul li a i {
        width: 36px;
        height: 36px;
        display: block;
        transition: transform 0.2s;
    }

    .contact-menu ul li a:hover i {
        transform: scale(1.2);
    }

    .icon-call {
        animation: ring 1.5s ease-in-out infinite;
    }

    @keyframes ring {
        0% { transform: rotate(0deg); }
        10% { transform: rotate(15deg); }
        20% { transform: rotate(-10deg); }
        30% { transform: rotate(15deg); }
        40% { transform: rotate(-10deg); }
        50% { transform: rotate(5deg); }
        60% { transform: rotate(-5deg); }
        70% { transform: rotate(0deg); }
        100% { transform: rotate(0deg); }
    }

    .icon-facebook {
        background: url('https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg') no-repeat center center;
        background-size: contain;
    }

    .icon-zalo {
        background: url('https://inuvdp.com/wp-content/uploads/2022/08/logo-zalo-02.jpg') no-repeat center center; /* Đường dẫn mới cho Zalo */
        background-size: contain;
    }

    .icon-phone {
        background: url('https://cdn-icons-png.flaticon.com/512/455/455705.png') no-repeat center center; /* Đường dẫn mới cho icon gọi điện */
        background-size: contain;
    }

</style>

    <script>
        function toggleContact() {
            const menu = document.querySelector('.contact-menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }


    </script>
    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">FITA TEST</strong><span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="https://www.facebook.com/fitatest" target="_blank" >FITA TEST</a>
        </div>
    </div>

</footer>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<script src="{{ asset('/public/asset_home') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/public/asset_home') }}/vendor/aos/aos.js"></script>
<script src="{{ asset('/public/asset_home') }}/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('/public/asset_home') }}/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="{{ asset('/public/asset_home') }}/js/main.js"></script>
</body>

</html>
