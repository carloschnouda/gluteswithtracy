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

$('#progress-form').on('submit', function (e) {
    e.preventDefault();
    $('#alert-danger').hide();
    $('#alert-success').hide();
    $('#alert-danger .message').html('');

    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        processData: false,  // Required for FormData
        contentType: false,  // Required for FormData
        beforeSend: function () {
            $('#progress-btn').hide();
            $('#loader-wrapper').removeClass('hidden');
        },
        success: function (data) {
            $('#progress-form').trigger('reset');
            $('#loader-wrapper').addClass('hidden');
            $('#progress-btn').show();
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
                    $('#alert-danger .message').append(`<p>${res.responseJSON.errors[inputName][i]}</p>`);
                }
            }
            $('#loader-wrapper').addClass('hidden');
            $('#progress-btn').show();
            $('#alert-danger').show();
        }
    });
})

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

$(document).ready(function () {
    // When workout wrapper is clicked
    $('.workout-wrapper').on('click', function () {
        
        // Check if video exists
        var videoExist = $(this).data('video');
        if (!videoExist) {
            return;
        }
        
        // Get video URL from the data attribute
        var videoUrl = $(this).data('video-url');

        // Set the video source
        var videoElement = $('#workoutVideo');
        videoElement.attr('src', videoUrl);
        
        // Autoplay the video
        videoElement.get(0).play();

        // Show the modal
        $('#videoModal').removeClass('hidden');
        $('body').addClass('no-scroll');
        $('html').addClass('no-scroll');
        
    });

    // When close button is clicked
    $('#closeModal').on('click', function () {
        // Hide the modal
        $('#videoModal').addClass('hidden');

        // Stop the video from playing
        var videoElement = $('#workoutVideo').get(0);
        videoElement.pause();
        videoElement.src = '';
        
        $('body').removeClass('no-scroll');
        $('html').removeClass('no-scroll');
    });

    // When user clicks outside the modal content, close the modal
    $(window).on('click', function (e) {
        if ($(e.target).is('#videoModal')) {
            
            // Hide the modal
            $('#videoModal').addClass('hidden');

            // Stop the video
            var videoElement = $('#workoutVideo').get(0);
            videoElement.pause();
            videoElement.src = '';

            // Remove the no-scroll class
            $('body').removeClass('no-scroll');
            $('html').removeClass('no-scroll');
        }
    });
});

//Animation Scroll
$(window).scroll(function () {
    $('[animate]').each(function () {
        var $this = $(this);
        var top_of_element = $this.offset().top;
        var bottom_of_element = $this.offset().top + $this.outerHeight();
        var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
        var top_of_screen = $(window).scrollTop();

        if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
            $this.addClass('show');
        }
        else {
            $this.removeClass('show');
        }
    });
}).scroll();
