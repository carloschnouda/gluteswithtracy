$(document).ready(function () {
    toggleUserDropdownMenu();
    toastPopup();
    scrollToSectionFunction();
    addSectionActiveState();

    $('#burger-menu-button').on('click', function () {
        handleMobileNav();
        burgerMenuAnimation();
    });

    handleAccordion();

    $('#banner-button').on('click', function () {
        $('html, body').animate({
            scrollTop: $(`#contact`).offset().top - 70
        }, 1000);

    });
});

function handleMobileNav() {
    $('#mobile-navbar').toggleClass('active');
    $('.body-overlay').toggleClass('active');
}
function toastPopup() {
    $('#toast-success-close').on('click', function () {
        $('#toast-success').remove();
    });

    $('#toast-danger-close').on('click', function () {
        $('#toast-danger').remove();
    });
}

function toggleUserDropdownMenu() {
    const $dropdown = $('#user-dropdown');
    const $button = $('#user-menu-button');

    // Function to close the dropdown when clicking outside
    $(document).click(function (event) {
        if (!$button.is(event.target) && !$dropdown.is(event.target) && $dropdown.has(event.target).length === 0) {
            $dropdown.addClass('hidden');
        }
    });

    // Handle mobile click to toggle dropdown
    $button.on('click', function (event) {
        if ($(window).width() < 768) { // Mobile view
            $dropdown.toggleClass('hidden');
        }
    });
}

function scrollToSectionFunction() {
    function scrollToSection(section) {
        $('html, body').animate({
            scrollTop: $(`#${section}`).offset().top - 70
        }, 1000);
    }

    let url = new URLSearchParams(window.location.search);
    let sectionSlug = url.get('section');

    if (sectionSlug) {
        scrollToSection(sectionSlug);
    }

    $("#navbar-user ul li div, #mobile-navbar ul li div").click(function (e) {
        e.preventDefault();

        var section = $(this).data('section');

        if (window.location.pathname === '/') {
            window.history.pushState({}, '', `?section=${section}`);
            scrollToSection(section);
        } else {
            window.location.href = `/?section=${section}`;
        }
        handleMobileNav();
        burgerMenuAnimation();
    });

    $("#navbar-user ul li a, #mobile-navbar ul li a").click(function (e) {
        e.preventDefault();

        var section = $(this).data('section');
        if (window.location.pathname === '/') {
            window.history.pushState({}, '', `?section=${section}`);
            scrollToSection(section);
        } else {
            window.location.href = `/?section=${section}`;
        }
        handleMobileNav();
        burgerMenuAnimation();
    });
}

function addSectionActiveState() {
    // Cache selectors
    var lastId,
        topMenu = $("#navbar"),
        topMenuHeight = topMenu.outerHeight() + 15,
        // All list items
        menuItems = topMenu.find(".navlink"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
            var section = $(this).data("section");
            var item = $("#" + section);
            if (item.length) {
                return item;
            }
        });

    // Bind to scroll
    $(window).scroll(function () {
        // Get container scroll position
        var fromTop = $(this).scrollTop() + topMenuHeight;

        // Get id of current scroll item
        var cur = scrollItems.map(function () {
            if ($(this).offset().top - 200 < fromTop)
                return this;
        });

        // Get the id of the current element
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";

        if (lastId !== id) {
            lastId = id;
            // Set/remove active class
            menuItems
                .removeClass("active")
                .filter("[data-section='" + id + "']")
                .addClass("active");
        }
    });
}

function burgerMenuAnimation() {
    var body = $(document.body);
    if ($(document.body).hasClass("menu-open")) {
        body.removeClass("menu-open");
        return;
    }
    body.addClass("menu-open");

}

function handleAccordion() {
    const items = document.querySelectorAll(".accordion button");

    function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');

        for (i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }

        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
    }

    items.forEach(item => item.addEventListener('click', toggleAccordion));
}

$('#contact-form').on('submit', function (e) {
    e.preventDefault();
    $('#alert-danger').hide();
    $('#alert-success').hide();
    $('#alert-danger .message').html('');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        beforeSend: function () {
            $('#submit-btn').hide();
            $('#loader-wrapper').removeClass('hidden');
        },
        success: function (data) {
            $('#contact-form').trigger('reset');
            $('#loader-wrapper').addClass('hidden');
            $('#submit-btn').show();
            $('#alert-success').show(500);
            setTimeout(function () {
                $('#alert-success').hide(500);
            }, 10000);
        },
        error: function (res) {
            // errors = data.responseJSON.errors;
            // console.log(errors);
            for (let inputName in res.responseJSON.errors) {
                for (let i = 0; i < res.responseJSON.errors[inputName].length; i++) {
                    $('#alert-danger .message').append('<p>' + res.responseJSON.errors[inputName][i] + '</p>');
                }
            }
            $('#loader-wrapper').addClass('hidden');
            $('#submit-btn').show();
            $('#alert-danger').show();
        }
    });
})
