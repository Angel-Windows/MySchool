<?php
include 'app/components/footer.php';
?>
<a class="to-top" title="Наверх" data-href="#pageHeader">
    <svg id="arrow-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330" width="32" height="32">
        <path id="XMLID_14_" d="M175.605,104.393c-2.814-2.813-6.628-4.393-10.607-4.393c-3.979,0-7.794,1.581-10.607,4.394l-79.998,80
		c-5.857,5.858-5.857,15.355,0.001,21.213c5.857,5.857,15.355,5.858,21.213-0.001l69.392-69.393l69.395,69.394
		C237.322,208.536,241.161,210,245,210s7.678-1.464,10.606-4.394c5.858-5.858,5.858-15.355,0-21.213L175.605,104.393z"></path>
    </svg>
</a>


<script>
    (function () {
        'use strict';

        function trackScroll() {
            let scrolled = window.pageYOffset;
            let coords = document.documentElement.clientHeight;

            if (scrolled > coords) {
                goTopBtn.classList.add('to-top--show');
            }
            if (scrolled < coords) {
                goTopBtn.classList.remove('to-top--show');
            }
        }

        let goTopBtn = document.querySelector('.to-top');

        window.addEventListener('scroll', trackScroll);

    })();
</script>

<script type="text/javascript"
        src="./res/hooks.min.js.Без названия"
        id="wp-hooks-js"></script>
<script type="text/javascript"
        src="./res/i18n.min.js.Без названия"
        id="wp-i18n-js"></script>
<script type="text/javascript" id="wp-i18n-js-after">
    /* <![CDATA[ */
    wp.i18n.setLocaleData({"text direction\u0004ltr": ["ltr"]});
    /* ]]> */
</script>
<script type="text/javascript"
        src="./res/index.js.Без названия"
        id="swv-js"></script>
<script type="text/javascript" id="contact-form-7-js-before">
    /* <![CDATA[ */
    var wpcf7 = {
        "api": {
            "root": "https:\/\/dan-it.com.ua\/uk\/wp-json\/",
            "namespace": "contact-form-7\/v1"
        }
    };
    /* ]]> */
</script>
<script type="text/javascript"
        src="./res/index(1).js.Без названия"
        id="contact-form-7-js"></script>
<script type="text/javascript" id="toc-front-js-extra">
    /* <![CDATA[ */
    var tocplus = {"smooth_scroll": "1", "visibility_show": "+", "visibility_hide": "-", "width": "Auto"};
    /* ]]> */
</script>
<script type="text/javascript"
        src="./res/front.min.js.Без названия"
        id="toc-front-js"></script>
<script type="text/javascript"
        src="./res/jquery.maskedinput.js.Без названия"
        id="wpcf7mf-mask-js"></script>
<script type="text/javascript"
        src="./res/intlTelInput.js.Без названия"
        id="intl-tel-input-js"></script>
<script type="text/javascript"
        src="./res/utils2.js.Без названия"
        id="intl-tel-input-utils-js"></script>
<script type="text/javascript"
        src="./res/intlTelInput.min.js.Без названия"
        id="custom-script9-js"></script>
<script type="text/javascript"
        src="./res/swiper.min.js.Без названия"
        id="swiper_js-js"></script>
<script type="text/javascript"
        src="./res/front-page.js.Без названия"
        id="frontpagejs-js"></script>
<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "DAN IT Education",
        "url": "https://dan-it.com.ua/",
        "sameAs": [
            "https://www.facebook.com/daniteducation",
            "https://www.instagram.com/daniteducation/",
            "https://www.youtube.com/channel/UCroRTcnX9t12gKlx5u71P8g"
        ]
    }
</script>

<script>
    jQuery(document).ready(function ($) {
        var config = {
            autoFormat: true,
            autoPlaceholder: true,
            defaultCountry: 'ua',
            nationalMode: true, // Make sure to use "getNumber()" to extract full international number
            preferredCountries: ['ua', 'de', "pl", "us"],
            separateDialCode: true,
            hiddenInput: "tel-full",
            tilsScript: '/countrycode/js/utils2.js',
            customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                "ua" == selectedCountryData.iso2 && (selectedCountryPlaceholder = "67 123 45 67");
                "de" == selectedCountryData.iso2 && (selectedCountryPlaceholder = "1512 345678");
                return selectedCountryPlaceholder;
            }
        };

        $('input[name="userTel"]').intlTelInput(config);

        $('input[name="userTel"]').bind("change keyup keypress input click", function () {
            if ($(this).val().match(/[^0-9]/g)) {
                alert('Використовуйте лише цифри');
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            }
            var telfull = $(this).intlTelInput("getNumber");
            $(this).siblings('input[name="tel-full"]').val(telfull);
        });
    });
</script>
<script type="text/javascript">
    //NBL
    jQuery(document).ready(function ($) {
        $('.header__sub-menu').on('scroll', function (event) {
            var scroll_value = $(this).scrollTop();
            var close_sub_btn = $(this).find('.close-sub-menu').css({top: scroll_value + 20});
        });


        $('form.wpcf7-form').on('submit', function () {
            var form = $(this);
            var button = form.find('input[type=submit]');
            var current_val = button.val();

            button.attr('data-value', current_val);
            button.prop("disabled", true);
            button.val("Відправлення, зачекайте");

        });

        document.addEventListener('wpcf7submit', function (event) {
            var form = $(this);
            var button = form.find('.wpcf7-submit');
            var old_value = button.attr('data-value');

            button.prop('disabled', false);
            button.val(old_value);

            dataLayer.push({'event': 'Lead'});
            fbq('track', 'CompleteRegistration');
            fbq('track', 'Lead');
        }, false);

        document.addEventListener('wpcf7invalid', function (event) {
            dataLayer.push({'event': 'error_form'});
        }, false);


        if ($('#glob-pop-form form').length > 0) {
            var cForm = document.querySelector('#glob-pop-form form');
            cForm.addEventListener("wpcf7mailsent", function (event) {
                dataLayer.push({'event': 'popup_lead'});
            }, false);
        }

        $('.login').on('click', function () {
            dataLayer.push({'event': 'login'});
        });

    });
    //jQuery(window).on('load', function(){
    //    setTimeout(() => {
    //        jQuery("#cForm form input[name='userTel']").trigger(jQuery.Event('keydown', { which: 43 })).trigger(jQuery.Event('keyup', { which: 43 }));
    //        }, 1);
    //});
</script>
<style>
    .slider {
        max-width: 100% !important;
        overflow: hidden !important;
    }

    .wpcf7-response-output.wpcf7-mail-sent-ok {
        font-weight: 700;
        font-size: 20px;
        line-height: 125%;
        text-align: center;
        letter-spacing: -0.01em;
        color: #000000;

        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        text-align: center;
        background-color: #fff;
        background-image: url('https://dan-it.com.ua/wp-content/themes/danit/assets/img/dots-bgd-landscape.png'),
        url('https://dan-it.com.ua/wp-content/themes/danit/assets/img/dots-bgd-portrait.png');
        background-size: 240px 116px, 94px 194px;
        background-repeat: no-repeat;
        background-position: left -85px top 26px, top -18px right -27px;
        box-shadow: 0 0 48px -10px rgba(0, 45, 160, 0.25);
        border-radius: 24px;
        max-width: 450px;
        width: 100%;
        padding: 40px 32px 50px !important;
        margin: 30px auto !important;
    }
</style>

<script>
    const pageTitleInputs = [...document.querySelectorAll(`[name="post_title"]`)];
    let pageTitle = document.querySelector('h1')?.textContent || '';

    pageTitle = pageTitle.trim() === "Якісна ізраїльська IT-освіта з працевлаштуванням" ? "home" : pageTitle;
    pageTitle = pageTitle.split(" ").map(el => el.trim()).join(" ");

    pageTitleInputs.forEach(el => {
        el.value = pageTitle;
    });
</script>


<script>
    const forms = [...document.querySelectorAll(".wpcf7-form")];

    forms.forEach(form => {
        /*         form.addEventListener("wpcf7beforesubmit", function(evt) {

            const blockedItems = evt.detail.inputs.filter(({
                value
            }) => value === "Фуфа" || value === "0677079200" || "0677079200@fufa.net")
            if (blockedItems.length !== 0) {
                evt.preventDefault();
                return false;
            }
             console.log(evt);

            this.querySelector('[type="submit"]').setAttribute("disabled", "");
        }); */

        form.addEventListener("wpcf7submit", async function () {

            if (!form.closest(".producing-form")) {


                const formWindow = form.querySelector(".wpcf7-response-output");

                formWindow.classList.add("wpcf7-mail-sent-ok");
                formWindow.style.display = "block";
                formWindow.textContent = "Hello";

                document.addEventListener("click", function () {
                    formWindow.classList.remove("wpcf7-mail-sent-ok");
                    formWindow.style.display = "none";
                    var btnsub = form.querySelector('[type="submit"]');
                    btnsub.value = btnsub.getAttribute('data-value');
                    btnsub.removeAttribute("disabled");
                });

            }

        });

        form.addEventListener("wpcf7mailsent", function () {
            this.querySelector('[type="submit"]').removeAttribute("disabled");
        });
    });
</script>

<script src="js/programs.js"></script>
<script src="js/script.js"></script>

</body>
</html>