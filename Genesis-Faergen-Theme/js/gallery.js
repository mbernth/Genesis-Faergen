            jQuery(document).ready(function ($) {

                // Call Gridder
                $(".gridder").gridderExpander({
                    scroll: true,
                    scrollOffset: 60,
                    scrollTo: "panel", // panel or listitem
                    animationSpeed: 400,
                    animationEasing: "easeInOutExpo",
                    showNav: true,
                    nextText: "<span><svg class=\"icon-arrow-right5\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-arrow-right5\"></use></svg></span>",
                    prevText: "<span><svg class=\"icon-arrow-left5\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-arrow-left5\"></use></svg></span>",
					closeText: "<span><svg class=\"icon-cross\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-cross\"></use></svg></span>",
                    onStart: function () {
                        console.log("Gridder Inititialized");
                    },
                    onContent: function () {
                        console.log("Gridder Content Loaded");
                        $(".carousel").carousel();
                    },
                    onClosed: function () {
                        console.log("Gridder Closed");
                    }
                });
            });