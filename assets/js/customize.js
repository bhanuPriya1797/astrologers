$(".form")
    .find("input, textarea")
    .on("keyup blur focus", function (e) {
        var $this = $(this),
            label = $this.prev("label");

        if (e.type === "keyup") {
            if ($this.val() === "") {
                label.removeClass("active highlight");
            } else {
                label.addClass("active highlight");
            }
        } else if (e.type === "blur") {
            if ($this.val() === "") {
                label.removeClass("active highlight");
            } else {
                label.removeClass("highlight");
            }
        } else if (e.type === "focus") {
            if ($this.val() === "") {
                label.removeClass("highlight");
            } else if ($this.val() !== "") {
                label.addClass("highlight");
            }
        }
    });

$(".tab a").on("click", function (e) {
    e.preventDefault();

    $(this).parent().addClass("active");
    $(this).parent().siblings().removeClass("active");

    target = $(this).attr("href");

    $(".tab-content > div").not(target).hide();

    $(target).fadeIn(600);
});






// tabs
// $(document).ready(function () {
//     (function ($) {
//         $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
//         $('.tab ul.tabs li a').click(function (g) {
//             var tab = $(this).closest('.tab'),
//                 index = $(this).closest('li').index();
//             tab.find('ul.tabs > li').removeClass('current');
//             $(this).closest('li').addClass('current');
//             tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
//             tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
//             g.preventDefault();
//         });
//     })(jQuery);
// });


// Function that get started when you click the tab

$(".tab-link").on("click", function () {
    // get and save clicked tab ID
    var tabID = $(this).attr("data-tab");
    // remove active menu status from tab bar
    $(".tab-link").removeClass("active-menu");
    // add active menu status to clicked tab
    $(this).addClass("active-menu");
    // fade out slide over .3s
    $(".active-tab").fadeOut(300);
    // wait and then slide in the correct slide
    setTimeout(function () {
        // removes the active (animation) class from all slides
        $(".slide").removeClass("active-tab");
        // add active (animation) class to the right slide
        $("#" + tabID)
            .show()
            .addClass("active-tab");
    }, 300); // timeout is .3s longs, which matches the fade out
});



// aries

// get tab container
var container = document.getElementById("tabContainer");
var tabcon = document.getElementById("tabscontent");
//alert(tabcon.childNodes.item(1));
// set current tab
var navitem = document.getElementById("tabHeader_1");

//store which tab we are on
var ident = navitem.id.split("_")[1];
//alert(ident);
navitem.parentNode.setAttribute("data-current", ident);
//set current tab with class of activetabheader
navitem.setAttribute("class", "tabActiveHeader");

//hide two tab contents we don't need
var pages = tabcon.getElementsByTagName("div");
for (var i = 1; i < pages.length; i++) {
    pages.item(i).style.display = "none";
};

//this adds click event to tabs
var tabs = container.getElementsByTagName("li");
for (var i = 0; i < tabs.length; i++) {
    tabs[i].onclick = displayPage;
}

// on click of one of tabs
function displayPage() {
    var current = this.parentNode.getAttribute("data-current");
    //remove class of activetabheader and hide old contents
    document.getElementById("tabHeader_" + current).removeAttribute("class");
    document.getElementById("tabpage_" + current).style.display = "none";

    var ident = this.id.split("_")[1];
    //add class of activetabheader to new active tab and show contents
    this.setAttribute("class", "tabActiveHeader");
    document.getElementById("tabpage_" + ident).style.display = "block";
    this.parentNode.setAttribute("data-current", ident);
}



