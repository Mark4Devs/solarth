$(document).ready((function(){let exec=!0;$(".service-item-btn").on("click",(function(){$(this).prev().slideToggle(400).siblings(".desc").slideUp()})),$(".work-image").on("click",(function(){$("#popup").modal("show");var attr=$(this).attr("src"),alt=$(this).attr("alt");$("#popup .modal-body img").attr("src",attr),$("#popup .modal-title").attr("src",alt),$("#popup .modal-body p").text($(this).next().text())})),$(".navbar-toggler").on("click",(function(){$(".toggler-line:first-of-type").toggleClass("active-first"),$(".toggler-line:nth-of-type(2)").toggleClass("active-middle"),$(".toggler-line:last-of-type").toggleClass("active-last")})),$(window).on("activate.bs.scrollspy",(function(){var linkTitle=$(".nav-link.active").text();switch("About"==linkTitle&&1==exec&&($(".number-count").each((function(){var $this=$(this);jQuery({count:0}).animate({count:$this.text()},{duration:4e3,step:function(){$this.text("+"+Math.ceil(this.count))}})})),exec=!1),linkTitle){case"Home":$(".home-info-data").addClass("animate"),$(".fa-circle-check").addClass("animate"),$(".fa-circle-check").each((function(i){$(this).css("animation-delay",i+"s")})),$(".li-text").addClass("animate"),$(".li-text").each((function(i){$(this).css("animation-delay",i-.6+"s")}));break;case"About":$(".about-content-container").addClass("animate");break;case"Services":$(".services-block").addClass("animate"),$(".services-item:first-of-type").addClass("animate"),$(".services-item:last-of-type").addClass("animate");break;case"Pricing":$(".pricing-text").addClass("animate"),$(".card:first-of-type").addClass("animate"),$(".card:nth-of-type(2)").addClass("animate"),$(".card:last-of-type").addClass("animate");break;case"Testimonials":$(".gallery-container").addClass("animate"),$(".testimonials-container").addClass("animate");break;case"Contacts":$(".contact-block:first-of-type").addClass("animate"),$(".contact-block:last-of-type").addClass("animate")}}))}));