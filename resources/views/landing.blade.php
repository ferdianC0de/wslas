<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/flowbite.min.css') }}" rel="stylesheet" />
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <style>
    .nav-active{
        color: #5552ff !important;
    }


        /*------------------*/
        /*  SKEW CLOCKWISE  */
        /*------------------*/
    .skew-cc{
        width:100%;
        height:100px;
        position:absolute;
        left:0px;
        z-index: 1;
        background: linear-gradient(to right bottom, #5552ff 49%, #202020 50%),    linear-gradient(-50deg, #202020 16px, #000 0);
    }


        /*-------------------------*/
        /* SKEW COUNTER CLOCKWISE  */
        /*-------------------------*/
    .skew-c{
        width:100%;
        height:100px;
        position:absolute;
        left:0px;
        background: linear-gradient(to left bottom, #202020 49%, #5552ff 50%);
    }
    </style>

    <title>{{ env('app_name', 'Laravel') }}</title>
</head>
<body style="background-color: #202020">
    @include('layouts.navbar')
    <div style="margin-top: 10vh">
        @include('layouts.slider')
        {{-- <div class="container mx-auto">
        </div> --}}
    </div>

    <div class="skew-c"></div>

    <div style="background-color: #5552ff">
        <div id="product" class="flex flex-wrap justify-center" style="margin-top: 11vh">
            @foreach ( $products as $product)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-1 my-2">
                {{-- <a href="#"> --}}
                    <img class="rounded-t-lg object-scale-down h-48 w-96" src="{{ asset('images/produk/'.$product->product_photo) }}" alt="{{ $product->product_photo }}" />
                {{-- </a> --}}
                <div class="p-5">
                    {{-- <a href="#"> --}}
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Produk {{ $product->product_name }} </h5>
                    {{-- </a> --}}
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->product_description }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp. {{ number_format($product->product_price) }}</p>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <div class="skew-cc"></div>

    <div class="container mx-auto my-10" style="margin-top: 14vh">
        @include('layouts.project-table')
    </div>

    <div class="skew-c"></div>
    <div id="contact" style="background-color: #5552ff; margin-top: 14vh; padding-top: 5px; padding-bottom: 7px;">
        <div class="flex flex-wrap justify-center">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15860.140429291427!2d106.87684175000001!3d-6.3894715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1690211972789!5m2!1sid!2sid"
                width="600"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="ml-3">
                <table class="text-xl">
                    <tr>
                        <td>Jalan</td>
                        <td>:</td>
                        <td>Jl Daha II/15 A, Dki Jakarta</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td>Dki Jakarta</td>
                    </tr>
                    <tr>
                        <td>State/province/area</td>
                        <td>:</td>
                        <td>Jakarta</td>
                    </tr>
                    <tr>
                        <td>Phone number</td>
                        <td>:</td>
                        <td>0-21-724-6429</td>
                    </tr>
                    <tr>
                        <td>Zip code</td>
                        <td>:</td>
                        <td>12110</td>
                    </tr>
                    <tr>
                        <td>Country calling code</td>
                        <td>:</td>
                        <td>+62</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td>Indonesia</td>
                    </tr>
                </table>
                {{-- <address> --}}
                    {{-- <h1 class="text-4xl">Owned by <a href="mailto:webmaster@example.com">Fer D</a>.</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h3 class="text-4xl">Visit us at:</h3>
                    <br>
                        - {{ url('/') }}
                        <br>
                        - Kecamatan, Kota, Indonesia --}}
                {{-- </address> --}}
            </div>
        </div>

        @include('layouts.footer')
    </div>

    <script src="{{ asset('js/flowbite.min.js') }}"></script>
    <script
    src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>
        $( document ).ready(function() {
            let path = window.location.pathname;
            console.log(path);

            function goTo(param) {
                $('.nav-active').removeClass('nav-active');

                switch (param) {
                    case 'nav-home':
                        $('#nav-home').addClass("nav-active");
                        $('html, body').animate({
                            scrollTop: 0
                        }, 1000);
                        break;
                    case 'nav-product':
                        console.log($('#nav-product'));
                        $('#nav-product').addClass("nav-active");
                        $('html, body').animate({
                            scrollTop: $('#product').offset().top - 100
                        }, 1000);

                        break;
                    case 'nav-project':
                        $('#nav-project').addClass("nav-active");
                        $('html, body').animate({
                            scrollTop: $('#table-project').offset().top - 100
                        }, 1000);


                        break;
                    case 'nav-contact':
                        $('#nav-contact').addClass("nav-active");
                        $('html, body').animate({
                            scrollTop: $('#contact').offset().top
                        }, 1000);


                        break;

                    default:
                        break;
                }
            }

            $('.navigation').click((e) => {
                // console.log(e.target.id);
                goTo(e.target.id);
            });

        });
    </script>
</body>
</html>
