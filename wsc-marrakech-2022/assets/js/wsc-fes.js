(function () {
  if ($) {
    // Basice Code keep it
    $(document).ready(function () {
      $(document).on("scroll", onScroll);

      //smoothscroll
      $('a[href^="#"]').on("click", function (e) {
        e.preventDefault();
        $(document).off("scroll");

        $("a").each(function () {
          $(this).removeClass("active");
        });
        $(this).addClass("active");

        var target = this.hash;
        $target = $(target);
        $("html, body")
          .stop()
          .animate(
            {
              scrollTop: $target.offset().top - 65,
            },
            800
          );
      });
    });

    // Use Your Class or ID For Selection

    function onScroll() {
      var scrollPos = $(document).scrollTop() + 60;
      $("#left-nav ul li a").each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        var nav = $(".item-nav");
        if (nav.length) {
          if (
            refElement.position().top <= scrollPos &&
            refElement.position().top + refElement.height() > scrollPos
          ) {
            $("#left-nav.item-nav ul li").removeClass("active");
            currLink.addClass("active");
          } else {
            currLink.removeClass("active");
          }
        }
      });
    }

    // Sticky menu background
    window.addEventListener("scroll", function () {
      if (window.scrollY > 150) {
        document.querySelector("#jsc-nav").style.background = "rgba(0,0,0,0.9)";
      } else {
        document.querySelector("#jsc-nav").style.background = "transparent";
      }
    });

    // Scroll and keep the background navbar color after reload
    $(document).ready(function () {
      checkHeaderStatus();
      $(window).scroll(function () {
        checkHeaderStatus();
      });
    });

    function checkHeaderStatus() {
      var navbar = $("#jsc-nav");
      var scrollPosition = $(window).scrollTop();
      if (scrollPosition < 150) {
        navbar.css("background-color", "transparent");
      } else {
        navbar.css("background-color", "rgba(0,0,0,0.9)");
      }
    }
  }
})();

// Countdown full Script

// countdown

(function ($) {
  $.fn.countdown = function (options, callback) {
    //custom 'this' selector
    thisEl = $(this);

    // array of custom settings
    var settings = {
      date: null,
      format: null,
    };

    // append the settings array to options
    if (options) {
      $.extend(settings, options);
    }

    //create the countdown processing function
    function countdown_proc() {
      var eventDate = Date.parse(settings.date) / 1000;
      var currentDate = Math.floor($.now() / 1000);

      if (eventDate <= currentDate) {
        callback.call(this);
        clearInterval(interval);
      }

      var seconds = eventDate - currentDate;

      var days = Math.floor(seconds / (60 * 60 * 24));
      //calculate the number of days

      seconds -= days * 60 * 60 * 24;
      //update the seconds variable with number of days removed

      var hours = Math.floor(seconds / (60 * 60));
      seconds -= hours * 60 * 60;
      //update the seconds variable with number of hours removed

      var minutes = Math.floor(seconds / 60);
      seconds -= minutes * 60;
      //update the seconds variable with number of minutes removed

      //conditional statements
      if (days == 1) {
        thisEl.find(".timeRefDays").text("day");
      } else {
        thisEl.find(".timeRefDays").text("jours");
      }
      if (hours == 1) {
        thisEl.find(".timeRefHours").text("hour");
      } else {
        thisEl.find(".timeRefHours").text("heures");
      }
      if (minutes == 1) {
        thisEl.find(".timeRefMinutes").text("minute");
      } else {
        thisEl.find(".timeRefMinutes").text("minutes");
      }
      if (seconds == 1) {
        thisEl.find(".timeRefSeconds").text("second");
      } else {
        thisEl.find(".timeRefSeconds").text("secondes");
      }

      //logic for the two_digits ON setting
      if (settings.format == "on") {
        days = String(days).length >= 2 ? days : "0" + days;
        hours = String(hours).length >= 2 ? hours : "0" + hours;
        minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
        seconds = String(seconds).length >= 2 ? seconds : "0" + seconds;
      }

      //update the countdown's html values.
      thisEl.find(".days").text(days);
      thisEl.find(".hours").text(hours);
      thisEl.find(".minutes").text(minutes);
      thisEl.find(".seconds").text(seconds);
    }

    //run the function
    countdown_proc();

    //loop the function
    interval = setInterval(countdown_proc, 1000);
  };
})(jQuery);

//Provide the plugin settings
$("#countdown").countdown(
  {
    //The countdown end date
    date: "06 August 2022 00:00:00",

    // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
    format: "on",
  },

  function () {
    // This will run when the countdown ends
    // alert("Evènement termine, Merci à tous! IT was great!");
  }
);

//   Section Programme

$(function () {
  window.sr = ScrollReveal();

  if ($(window).width() < 768) {
    if ($(".timeline-content").hasClass("js--fadeInLeft")) {
      $(".timeline-content")
        .removeClass("js--fadeInLeft")
        .addClass("js--fadeInRight");
    }

    sr.reveal(".js--fadeInRight", {
      origin: "right",
      distance: "300px",
      easing: "ease-in-out",
      duration: 900,
    });
  } else {
    sr.reveal(".js--fadeInLeft", {
      origin: "left",
      distance: "300px",
      easing: "ease-in-out",
      duration: 900,
    });

    sr.reveal(".js--fadeInRight", {
      origin: "right",
      distance: "300px",
      easing: "ease-in-out",
      duration: 900,
    });
  }

  sr.reveal(".js--fadeInLeft", {
    origin: "left",
    distance: "300px",
    easing: "ease-in-out",
    duration: 900,
  });

  sr.reveal(".js--fadeInRight", {
    origin: "right",
    distance: "300px",
    easing: "ease-in-out",
    duration: 900,
  });

  // ACCORDION

  function toggleIcon(e) {
    $(e.target)
      .prev(".panel-heading")
      .find(".more-less")
      .toggleClass("icon-plus icon-minus");
  }
  $(".panel-group").on("hidden.bs.collapse", toggleIcon);
  $(".panel-group").on("shown.bs.collapse", toggleIcon);
});

// TypeWriter Effects
// ES6 Class
class TypeWriter {
  constructor(txtElement, words, wait = 3000) {
    this.txtElement = txtElement;
    this.words = words;
    this.txt = "";
    this.wordIndex = 0;
    this.wait = parseInt(wait, 10);
    this.type();
    this.isDeleting = false;
  }

  type() {
    // Current index of word
    const current = this.wordIndex % this.words.length;
    // Get full text of current word
    const fullTxt = this.words[current];

    // Check if deleting
    if (this.isDeleting) {
      // Remove char
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      // Add char
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    // Insert txt into element
    this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

    // Initial Type Speed
    let typeSpeed = 300;

    if (this.isDeleting) {
      typeSpeed /= 2;
    }

    // If word is complete
    if (!this.isDeleting && this.txt === fullTxt) {
      // Make pause at end
      typeSpeed = this.wait;
      // Set delete to true
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === "") {
      this.isDeleting = false;
      // Move to next word
      this.wordIndex++;
      // Pause before start typing
      typeSpeed = 500;
    }

    setTimeout(() => this.type(), typeSpeed);
  }
}

// Init On DOM Load
document.addEventListener("DOMContentLoaded", init);

// Init App
function init() {
  const txtElement = document.querySelector(".txt-type");
  const words = JSON.parse(txtElement.getAttribute("data-words"));
  const wait = txtElement.getAttribute("data-wait");
  // Init TypeWriter
  new TypeWriter(txtElement, words, wait);
}
// Load facebook share button
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));