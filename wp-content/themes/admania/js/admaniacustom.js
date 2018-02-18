"use strict";
var $j = jQuery.noConflict();
$j(document).ready(function() {
    $j("#admania_top").hide();
    $j(function() {
        $j(window).scroll(function() {
            if ($j(this).scrollTop() > 600) {
                $j('#admania_top').fadeIn();
            } else {
                $j('#admania_top').fadeOut();
            }
        });
        $j('#admania_top a').on('click', function() {
            $j('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
});
$j(document).ready(function() {
    var sttotal_height = $j('.admania_sitemaincontent,.admania_contentarea').outerHeight();
    var sttotal_heightrd = (sttotal_height - 1000);
    $j(window).scroll(function() {
        if ($j(this).scrollTop() > sttotal_heightrd) {
            $j('#admania_sdfcsad').addClass('admaniashwad_visible');
        } else {
            $j('#admania_sdfcsad').removeClass('admaniashwad_visible');
        }
    });
});
$j(document).ready(function() {
    $j("#admania_owldemo1").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            950: {
                items: 1
            },
            1199: {
                items: 1
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });
    $j("#admania_owldemo2").owlCarousel({
        items: 4,
        autoplay: true,
        loop: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 1
            },
            600: {
                items: 2
            },
            950: {
                items: 4
            },
            1199: {
                items: 4
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });
    $j("#admania_owldemo3").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 1
            },
            600: {
                items: 1
            },
            950: {
                items: 1
            },
            1199: {
                items: 1
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });
    $j(document).ready(function() {
        $j('.admania-la5searchicon').on("click", function() {
            $j(".admania-la5searchicon .fa-search").toggleClass("fa-times");
            $j('.admania_lay5headersearchouter').toggle();
            $j('.admania_lay5headersearchouter input[type=search]').focus();
        });
    });
    $j("#admania_owldemo5").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        margin:20,
        nav: true,
        responsive: {
            0: {
                items: 1,
				margin:0,
            },
            400: {
                items: 1,
				margin:0,
            },
            600: {
                items: 1,
				 margin:0,
            },
            950: {
                items: 2
            },
            1199: {
                items: 2
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });
	$j("#admania_owldemo6").owlCarousel({
        items: 4,
        autoplay: true,
        loop: true,
		margin:20,
        nav: true,
        responsive: {
            0: {
                items: 1,
				margin:0,
            },
            400: {
                items: 1,
				margin:0,
            },
            600: {
                items: 2
            },
            950: {
                items: 4
            },
            1199: {
                items: 4
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });
    $j('.admania_ftrbtmwdgt').on('click', function(evnt) {
        evnt.preventDefault();
        $j('body').toggleClass('admania_rmvstckyad');
        return false;
    });
});
$j(document).ready(function() {
    $j('.admania_adeditablead1 ,.admania_frtlvedtclsbtn').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_shwoptionsad1');
        return false;
    });
	
	
	$j('#admania_owldemo1 .owl-next').on('mouseover', function(){
  $j(this).parent().addClass('magazee_nxtishover');
}).on('mouseout', function(){
  $j(this).parent().removeClass('magazee_nxtishover');
});
});
! function(e, t) {
    t("nav").before('<button type="button" class="admania_menutoggle" role="button" aria-pressed="false"></button>'), t("nav .sub-menu").before('<button class="admania_submenutoggle" role="button" aria-pressed="false"></button>'), t(".admania_menutoggle, .admania_submenutoggle").on("click", function() {
        var e = t(this);
        e.attr("aria-pressed", function(e, t) {
            return "false" === t ? "true" : "false"
        }), e.toggleClass("admania_mnuactivated"), e.next("nav, .sub-menu").slideToggle("fast")
    })
}(this, jQuery);
$j(document).ready(function() {
    $j(".admania_lvedttblst a").on("click", function(event) {
        event.preventDefault();
        $j(this).addClass("admanialvedt_current");
        $j(this).siblings().removeClass("admanialvedt_current");
        var admania_lvedttab = $j(this).attr("href");
        $j(".admanialvedttb_tabmain").not(admania_lvedttab).css("display", "none");
        $j(admania_lvedttab).fadeIn();
    });
});
$j(document).ready(function() {
    var admania_imglnk = $j('.admania_lvedtimglnk1').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk1').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk2').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk2').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk3').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk3').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk4').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk4').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk5').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk5').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk6').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk6').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk7').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk7').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk8').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk8').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk9').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk9').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk10').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk10').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk11').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk11').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk12').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk12').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk13').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk13').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk14').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk14').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk15').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk15').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk16').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk16').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk17').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk17').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk18').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk18').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk19').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk19').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk20').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk20').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk21').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk21').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk22').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk22').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk23').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk23').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk24').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk24').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk25').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk25').hide();
    }
    var admania_imglnk = $j('.admania_lvedtimglnk26').val();
    if (admania_imglnk == false) {
        $j('.admania_lvedtimglnk26').hide();
    }
    $j('.admania_adimg_lvetmdupld1').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw1').attr('src', attachment.url);
            $j('.admania_lvedtimg_url1').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld2').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw2').attr('src', attachment.url);
            $j('.admania_lvedtimg_url2').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld3').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw3').attr('src', attachment.url);
            $j('.admania_lvedtimg_url3').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld4').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw4').attr('src', attachment.url);
            $j('.admania_lvedtimg_url4').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld5').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw5').attr('src', attachment.url);
            $j('.admania_lvedtimg_url5').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld6').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw6').attr('src', attachment.url);
            $j('.admania_lvedtimg_url6').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld7').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw7').attr('src', attachment.url);
            $j('.admania_lvedtimg_url7').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld8').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw8').attr('src', attachment.url);
            $j('.admania_lvedtimg_url8').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld9').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw9').attr('src', attachment.url);
            $j('.admania_lvedtimg_url9').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld10').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw10').attr('src', attachment.url);
            $j('.admania_lvedtimg_url10').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld11').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw11').attr('src', attachment.url);
            $j('.admania_lvedtimg_url11').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld12').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw12').attr('src', attachment.url);
            $j('.admania_lvedtimg_url12').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld13').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw13').attr('src', attachment.url);
            $j('.admania_lvedtimg_url13').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld14').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw14').attr('src', attachment.url);
            $j('.admania_lvedtimg_url14').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld15').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw15').attr('src', attachment.url);
            $j('.admania_lvedtimg_url15').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld16').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw16').attr('src', attachment.url);
            $j('.admania_lvedtimg_url16').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld17').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw17').attr('src', attachment.url);
            $j('.admania_lvedtimg_url17').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld18').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw18').attr('src', attachment.url);
            $j('.admania_lvedtimg_url18').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld19').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw19').attr('src', attachment.url);
            $j('.admania_lvedtimg_url19').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld20').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw20').attr('src', attachment.url);
            $j('.admania_lvedtimg_url20').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld21').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw21').attr('src', attachment.url);
            $j('.admania_lvedtimg_url21').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld22').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw22').attr('src', attachment.url);
            $j('.admania_lvedtimg_url22').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld23').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw23').attr('src', attachment.url);
            $j('.admania_lvedtimg_url23').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld24').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw24').attr('src', attachment.url);
            $j('.admania_lvedtimg_url24').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld25').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw25').attr('src', attachment.url);
            $j('.admania_lvedtimg_url25').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld26').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw26').attr('src', attachment.url);
            $j('.admania_lvedtimg_url26').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld27').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw27').attr('src', attachment.url);
            $j('.admania_lvedtimg_url27').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupld28').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw28').attr('src', attachment.url);
            $j('.admania_lvedtimg_url28').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupldbtn29').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw29').attr('src', attachment.url);
            $j('.admania_lvedtimg_url29').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupldbtn30').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw30').attr('src', attachment.url);
            $j('.admania_lvedtimg_url30').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupldbtn31').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw31').attr('src', attachment.url);
            $j('.admania_lvedtimg_url31').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupldbtn32').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw32').attr('src', attachment.url);
            $j('.admania_lvedtimg_url32').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupldbtn33').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw33').attr('src', attachment.url);
            $j('.admania_lvedtimg_url33').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupldbtn34').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw34').attr('src', attachment.url);
            $j('.admania_lvedtimg_url34').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    $j('.admania_adimg_lvetmdupldbtn35').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw35').attr('src', attachment.url);
            $j('.admania_lvedtimg_url35').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
	
	 $j('.admania_adimg_lvetmdupldbtn36').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw36').attr('src', attachment.url);
            $j('.admania_lvedtimg_url36').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
	$j('.admania_adimg_lvetmdupldbtn37').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw37').attr('src', attachment.url);
            $j('.admania_lvedtimg_url37').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
		 $j('.admania_adimg_lvetmdupldbtn38').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw38').attr('src', attachment.url);
            $j('.admania_lvedtimg_url38').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
	
		 $j('.admania_adimg_lvetmdupldbtn39').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw39').attr('src', attachment.url);
            $j('.admania_lvedtimg_url39').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
	
		 $j('.admania_adimg_lvetmdupldbtn40').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw40').attr('src', attachment.url);
            $j('.admania_lvedtimg_url40').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
		 $j('.admania_adimg_lvetmdupldbtn41').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw41').attr('src', attachment.url);
            $j('.admania_lvedtimg_url41').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
	
		 $j('.admania_adimg_lvetmdupldbtn42').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw42').attr('src', attachment.url);
            $j('.admania_lvedtimg_url42').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
	$j('.admania_adimg_lvetmdupldbtn43').on("click", function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            var $jadmania_logoimg = $j('.admania_lvedtimgshw43').attr('src', attachment.url);
            $j('.admania_lvedtimg_url43').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
	
});
$j(document).ready(function() {
    $j('.admania_lvetresitem1').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem');
        return false;
    });
    $j('.admania_lvetresitem2').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem1');
        return false;
    });
    $j('.admania_lvetresitem3').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem2');
        return false;
    });
    $j('.admania_lvetresitem4').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem3');
        return false;
    });
    $j('.admania_lvetresitem5').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem4');
        return false;
    });
    $j('.admania_lvetresitem6').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem5');
        return false;
    });
    $j('.admania_lvetresitem7').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem6');
        return false;
    });
    $j('.admania_lvetresitem8').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem7');
        return false;
    });
    $j('.admania_lvetresitem9').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem8');
        return false;
    });
    $j('.admania_lvetresitem10').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem9');
        return false;
    });
    $j('.admania_lvetresitem11').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem10');
        return false;
    });
    $j('.admania_lvetresitem12').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem11');
        return false;
    });
    $j('.admania_lvetresitem13').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem12');
        return false;
    });
    $j('.admania_lvetresitem14').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem13');
        return false;
    });
    $j('.admania_lvetresitem15').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem14');
        return false;
    });
    $j('.admania_lvetresitem16').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem15');
        return false;
    });
    $j('.admania_lvetresitem17').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem16');
        return false;
    });
    $j('.admania_lvetresitem18').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem17');
        return false;
    });
    $j('.admania_lvetresitem19').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem18');
        return false;
    });
    $j('.admania_lvetresitem20').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem19');
        return false;
    });
    $j('.admania_lvetresitem21').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem20');
        return false;
    });
    $j('.admania_lvetresitem22').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem21');
        return false;
    });
    $j('.admania_lvetresitem23').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem22');
        return false;
    });
    $j('.admania_lvetresitem24').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem23');
        return false;
    });
    $j('.admania_lvetresitem25').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem24');
        return false;
    });
    $j('.admania_lvetresitem26').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem25');
        return false;
    });
    $j('.admania_lvetresitem27').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem26');
        return false;
    });
    $j('.admania_lvetresitem28').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem27');
        return false;
    });
    $j('.admania_lvetresitem29').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem28');
        return false;
    });
    $j('.admania_lvetresitem30').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem29');
        return false;
    });
    $j('.admania_lvetresitem31').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem30');
        return false;
    });
    $j('.admania_lvetresitem32').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem31');
        return false;
    });
    $j('.admania_lvetresitem33').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem32');
        return false;
    });
    $j('.admania_lvetresitem34').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem33');
        return false;
    });
    $j('.admania_lvetresitem35').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem34');
        return false;
    });
	
	$j('.admania_lvetresitem36').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem35');
        return false;
    });
	
	$j('.admania_lvetresitem37').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem36');
        return false;
    });
	
	$j('.admania_lvetresitem38').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem37');
        return false;
    });
	
	$j('.admania_lvetresitem39').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem38');
        return false;
    });
	
	$j('.admania_lvetresitem40').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem39');
        return false;
    });
	
	$j('.admania_lvetresitem41').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem40');
        return false;
    });
	
	$j('.admania_lvetresitem42').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem41');
        return false;
    });
	
	$j('.admania_lvetresitem43').on('click', function(event) {
        event.preventDefault();
        $j('body').toggleClass('admania_lvedtrespectitem42');
        return false;
    });
	
});
$j(document).ready(function() {
    $j('.admania_frtlvedtclsbtn').on('click', function(event) {
        event.preventDefault();
        location.reload();
        return false;
    });
});
if (admaniastchk.admania_chkdisplay) {
    if (admaniastchk.admania_chksptoptions == 'amblyt3') {
        ! function(t) {
            "use strict";
            t(function() {
                if (t(".admania_lay3entryleftad").length > 0) {
                    t(".admania_entrycontent").css(t(".admania_entrycontent").outerHeight() < t(".admania_entrycontent").outerHeight() && t(window).width() > 767 ? {
                        height: t(".admania_entrycontent").outerHeight()
                    } : {
                        height: "auto"
                    });
                    var s = {
                        $el: t(".admania_lay3entryleftad"),
                        content_h: t(".admania_entrycontent").outerHeight() > t(".admania_entrycontent").outerHeight(),
                        content_l: t(".admania_entrycontent").offset().left + t(".admania_entrycontent").width(),
                        sticky_threshold: 0,
                        sticky_t: 100,
                        fade_threshold: t(".admania_lay3entryleftad").hasClass("admania_sidebarsticky") ? t(".admania_lay3entryleftad").parent().outerHeight() + t(".admania_lay3entryleftad").parent().offset().top - .5 * t(".admania_lay3entryleftad").height() : t(".admania_lay3entryleftad").offset().top - .5 * t(".admania_lay3entryleftad").height(),
                        sticky_start: t(".admania_lay3entryleftad").offset().top + 36,
                        sticky_stop: t(".admania_entryfooter ").offset().top - t(".admania_lay3entryleftad").height() - 108,
                        sticky_width: t(".admania_lay3entryleftad").parent().width(),
                        recalc: function() {
                            this.content_h = t(".admania_entrycontent").outerHeight(), this.content_l = t(".admania_entrycontent").offset().left - 14, this.fade_threshold = t(".admania_lay3entryleftad").hasClass("admania_sidebarsticky") ? t(".admania_lay3entryleftad").parent().outerHeight() + t(".admania_lay3entryleftad").parent().offset().top - .5 * t(".admania_lay3entryleftad").height() : t(".admania_lay3entryleftad").offset().top - .5 * t(".admania_lay3entryleftad").height(), this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_width = t(".admania_lay3entryleftad").parent().width(), this.sticky_start = t(".admania_lay3entryleftad").hasClass("admania_sidebarsticky") ? t(".admania_lay3entryleftad").parent().outerHeight() + t(".admania_lay3entryleftad").parent().offset().top - 36 : t(".admania_lay3entryleftad").offset().top - 36, this.sticky_stop = t(".admania_entryfooter ").offset().top - t(".admania_lay3entryleftad").height() - 108
                        },
                        sticky: function() {
                            if (t(document).scrollTop() > this.sticky_start && t(window).width() > 768)
                                if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                    var s = this.sticky_stop - t(document).scrollTop() + 36;
                                    this.$el.css({
                                        top: s + "px",
                                        width: this.sticky_width + "px"
                                    })
                                } else this.$el.css({
                                    top: "36px",
                                    width: this.sticky_width + "px"
                                });
                            else this.$el.css({
                                top: "0px",
                                width: "auto"
                            }), this.$el.removeClass("admania_sidebarsticky")
                        },
                        fade: function() {
                            t(window).width() > 768 ? t(document).scrollTop() > this.fade_threshold ? (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout")) : (this.$el.addClass("stickyfadeout"), this.$el.removeClass("stickyfadein")) : (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout"))
                        },
                        init: function() {
                            var s = this;
                            s.recalc(), t(window).on("scroll", function() {
                                s.recalc(), s.sticky(), s.fade()
                            }), t(window).on("resize", function() {
                                t(".admania_entrycontent").css({
                                    height: "auto"
                                }), t(".admania_entrycontent").css(t(".admania_entrycontent").outerHeight() < t(".admania_entrycontent").outerHeight() && t(window).width() > 767 ? {
                                    height: t(".admania_entrycontent").outerHeight()
                                } : {
                                    height: "auto"
                                }), s.recalc(), s.sticky(), s.fade()
                            })
                        }
                    };
                    s.init()
                }
                if (t(".admania_entrycontent").length > 0) {
                    var e = {
                        $el: t(".social-share-top-live"),
                        content_h: t(".admania_entrycontent").outerHeight(),
                        content_l: t(".admania_entrycontent").offset().left - 14,
                        sticky_threshold: 0,
                        sticky_t: 100,
                        sticky_start: t(".admania_entrycontent").offset().top,
                        sticky_stop: t(".admania_entryfooter ").offset().top - t(".admania_entrycontent").outerHeight() - 150,
                        recalc: function() {
                            this.content_h = t(".admania_entrycontent").outerHeight(), this.content_l = t(".admania_entrycontent").offset().left - 14, this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_start = t(".admania_entrycontent").offset().top, this.sticky_stop = t(".admania_entryfooter ").offset().top - t(".admania_entrycontent").outerHeight() - 150
                        },
                        sticky: function() {
                            if (t(document).scrollTop() > this.sticky_start)
                                if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                    var s = this.sticky_stop - t(document).scrollTop() + 100;
                                    this.$el.css({
                                        top: s + "px",
                                        left: this.content_l + "px"
                                    })
                                } else this.$el.css({
                                    top: "100px",
                                    left: this.content_l + "px"
                                });
                            else this.$el.css({
                                top: "100px",
                                left: "-14px"
                            }), this.$el.removeClass("admania_sidebarsticky")
                        },
                        resize: function() {},
                        init: function() {
                            var s = this;
                            t(window).on("scroll", function() {
                                s.sticky()
                            }), t(window).on("resize", function() {
                                s.recalc(), s.sticky()
                            })
                        }
                    };
                    e.init()
                }
            })
        }(jQuery);
    }
}
if ((admaniastchk.admania_chksptoptions == 'amblyt2') || (admaniastchk.admania_chksptoptions == 'amblyt5') || (admaniastchk.admania_chksptoptions == 'amblyt1') || (admaniastchk.admania_chksptoptions == 'amblyt4') || (admaniastchk.admania_chksptoptions == 'amblyt3')) {
    ! function(t) {
        "use strict";
        t(function() {
            if (t(".admania_primarycontentarea .widget_admania_sticky_widgets").length > 0) {
                t(".admania_sitemaincontent").css(t(".admania_sitemaincontent").outerHeight() < t(".admania_sitemaincontent").outerHeight() && t(window).width() > 767 ? {
                    height: t(".admania_sitemaincontent").outerHeight()
                } : {
                    height: "auto"
                });
                var s = {
                    $el: t(".admania_primarycontentarea .widget_admania_sticky_widgets"),
                    content_h: t(".admania_sitemaincontent").outerHeight() > t(".admania_sitemaincontent").outerHeight(),
                    content_l: t(".admania_sitemaincontent").offset().left + t(".admania_sitemaincontent").width(),
                    sticky_threshold: 0,
                    sticky_t: 100,
                    fade_threshold: t(".admania_primarycontentarea .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_primarycontentarea .widget_admania_sticky_widgets").height() : t(".admania_primarycontentarea .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_primarycontentarea .widget_admania_sticky_widgets").height(),
                    sticky_start: t(".admania_primarycontentarea .widget_admania_sticky_widgets").offset().top + 36,
                    sticky_stop: t(".admania_sitefooter").offset().top - t(".admania_primarycontentarea .widget_admania_sticky_widgets").height() - 108,
                    sticky_width: t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().width(),
                    recalc: function() {
                        this.content_h = t(".admania_sitemaincontent").outerHeight(), this.content_l = t(".admania_sitemaincontent").offset().left - 14, this.fade_threshold = t(".admania_primarycontentarea .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_primarycontentarea .widget_admania_sticky_widgets").height() : t(".admania_primarycontentarea .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_primarycontentarea .widget_admania_sticky_widgets").height(), this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_width = t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().width(), this.sticky_start = t(".admania_primarycontentarea .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_primarycontentarea .widget_admania_sticky_widgets").parent().offset().top - 36 : t(".admania_primarycontentarea .widget_admania_sticky_widgets").offset().top - 36, this.sticky_stop = t(".admania_sitefooter").offset().top - t(".admania_primarycontentarea .widget_admania_sticky_widgets").height() - 108
                    },
                    sticky: function() {
                        if (t(document).scrollTop() > this.sticky_start && t(window).width() > 768)
                            if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                var s = this.sticky_stop - t(document).scrollTop() + 36;
                                this.$el.css({
                                    top: s + "px",
                                    width: this.sticky_width + "px"
                                })
                            } else this.$el.css({
                                top: "36px",
                                width: this.sticky_width + "px"
                            });
                        else this.$el.css({
                            top: "0px",
                            width: "auto"
                        }), this.$el.removeClass("admania_sidebarsticky")
                    },
                    fade: function() {
                        t(window).width() > 768 ? t(document).scrollTop() > this.fade_threshold ? (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout")) : (this.$el.addClass("stickyfadeout"), this.$el.removeClass("stickyfadein")) : (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout"))
                    },
                    init: function() {
                        var s = this;
                        s.recalc(), t(window).on("scroll", function() {
                            s.recalc(), s.sticky(), s.fade()
                        }), t(window).on("resize", function() {
                            t(".admania_sitemaincontent").css({
                                height: "auto"
                            }), t(".admania_sitemaincontent").css(t(".admania_sitemaincontent").outerHeight() < t(".admania_sitemaincontent").outerHeight() && t(window).width() > 767 ? {
                                height: t(".admania_sitemaincontent").outerHeight()
                            } : {
                                height: "auto"
                            }), s.recalc(), s.sticky(), s.fade()
                        })
                    }
                };
                s.init()
            }
            if (t(".admania_sitemaincontent").length > 0) {
                var e = {
                    $el: t(".social-share-top-live"),
                    content_h: t(".admania_sitemaincontent").outerHeight(),
                    content_l: t(".admania_sitemaincontent").offset().left - 14,
                    sticky_threshold: 0,
                    sticky_t: 100,
                    sticky_start: t(".admania_sitemaincontent").offset().top,
                    sticky_stop: t(".admania_sitefooter").offset().top - t(".admania_sitemaincontent").outerHeight() - 150,
                    recalc: function() {
                        this.content_h = t(".admania_sitemaincontent").outerHeight(), this.content_l = t(".admania_sitemaincontent").offset().left - 14, this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_start = t(".admania_sitemaincontent").offset().top, this.sticky_stop = t(".admania_sitefooter").offset().top - t(".admania_sitemaincontent").outerHeight() - 150
                    },
                    sticky: function() {
                        if (t(document).scrollTop() > this.sticky_start)
                            if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                var s = this.sticky_stop - t(document).scrollTop() + 100;
                                this.$el.css({
                                    top: s + "px",
                                    left: this.content_l + "px"
                                })
                            } else this.$el.css({
                                top: "100px",
                                left: this.content_l + "px"
                            });
                        else this.$el.css({
                            top: "100px",
                            left: "-14px"
                        }), this.$el.removeClass("admania_sidebarsticky")
                    },
                    resize: function() {},
                    init: function() {
                        var s = this;
                        t(window).on("scroll", function() {
                            s.sticky()
                        }), t(window).on("resize", function() {
                            s.recalc(), s.sticky()
                        })
                    }
                };
                e.init()
            }
        })
    }(jQuery);
}
if ((admaniastchk.admania_chksptoptions == 'amblyt1') || (admaniastchk.admania_chksptoptions == 'amblyt4')) {
    ! function(t) {
        "use strict";
        t(function() {
            if (t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").length > 0) {
                t(".admania_contentarea").css(t(".admania_contentarea").outerHeight() < t(".admania_contentarea").outerHeight() && t(window).width() > 767 ? {
                    height: t(".admania_contentarea").outerHeight()
                } : {
                    height: "auto"
                });
                var s = {
                    $el: t(".admania_secondarycontentarea  .widget_admania_sticky_widgets"),
                    content_h: t(".admania_contentarea").outerHeight() > t(".admania_contentarea").outerHeight(),
                    content_l: t(".admania_contentarea").offset().left + t(".admania_contentarea").width(),
                    sticky_threshold: 0,
                    sticky_t: 100,
                    fade_threshold: t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").height() : t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").height(),
                    sticky_start: t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").offset().top + 36,
                    sticky_stop: t(".admania_contentareafooter").offset().top - t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").height() - 108,
                    sticky_width: t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().width(),
                    recalc: function() {
                        this.content_h = t(".admania_contentarea").outerHeight(), this.content_l = t(".admania_contentarea").offset().left - 14, this.fade_threshold = t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").height() : t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").height(), this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_width = t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().width(), this.sticky_start = t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").parent().offset().top - 36 : t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").offset().top - 36, this.sticky_stop = t(".admania_contentareafooter").offset().top - t(".admania_secondarycontentarea  .widget_admania_sticky_widgets").height() - 108
                    },
                    sticky: function() {
                        if (t(document).scrollTop() > this.sticky_start && t(window).width() > 768)
                            if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                var s = this.sticky_stop - t(document).scrollTop() + 36;
                                this.$el.css({
                                    top: s + "px",
                                    width: this.sticky_width + "px"
                                })
                            } else this.$el.css({
                                top: "36px",
                                width: this.sticky_width + "px"
                            });
                        else this.$el.css({
                            top: "0px",
                            width: "auto"
                        }), this.$el.removeClass("admania_sidebarsticky")
                    },
                    fade: function() {
                        t(window).width() > 768 ? t(document).scrollTop() > this.fade_threshold ? (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout")) : (this.$el.addClass("stickyfadeout"), this.$el.removeClass("stickyfadein")) : (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout"))
                    },
                    init: function() {
                        var s = this;
                        s.recalc(), t(window).on("scroll", function() {
                            s.recalc(), s.sticky(), s.fade()
                        }), t(window).on("resize", function() {
                            t(".admania_contentarea").css({
                                height: "auto"
                            }), t(".admania_contentarea").css(t(".admania_contentarea").outerHeight() < t(".admania_contentarea").outerHeight() && t(window).width() > 767 ? {
                                height: t(".admania_contentarea").outerHeight()
                            } : {
                                height: "auto"
                            }), s.recalc(), s.sticky(), s.fade()
                        })
                    }
                };
                s.init()
            }
            if (t(".admania_contentarea").length > 0) {
                var e = {
                    $el: t(".social-share-top-live"),
                    content_h: t(".admania_contentarea").outerHeight(),
                    content_l: t(".admania_contentarea").offset().left - 14,
                    sticky_threshold: 0,
                    sticky_t: 100,
                    sticky_start: t(".admania_contentarea").offset().top,
                    sticky_stop: t(".admania_contentareafooter ").offset().top - t(".admania_contentarea").outerHeight() - 150,
                    recalc: function() {
                        this.content_h = t(".admania_contentarea").outerHeight(), this.content_l = t(".admania_contentarea").offset().left - 14, this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_start = t(".admania_contentarea").offset().top, this.sticky_stop = t(".admania_contentareafooter ").offset().top - t(".admania_contentarea").outerHeight() - 150
                    },
                    sticky: function() {
                        if (t(document).scrollTop() > this.sticky_start)
                            if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                var s = this.sticky_stop - t(document).scrollTop() + 100;
                                this.$el.css({
                                    top: s + "px",
                                    left: this.content_l + "px"
                                })
                            } else this.$el.css({
                                top: "100px",
                                left: this.content_l + "px"
                            });
                        else this.$el.css({
                            top: "100px",
                            left: "-14px"
                        }), this.$el.removeClass("admania_sidebarsticky")
                    },
                    resize: function() {},
                    init: function() {
                        var s = this;
                        t(window).on("scroll", function() {
                            s.sticky()
                        }), t(window).on("resize", function() {
                            s.recalc(), s.sticky()
                        })
                    }
                };
                e.init()
            }
        })
    }(jQuery);
}
if ((admaniastchk.admania_chksptoptions == 'amblyt4')) {
    ! function(t) {
        "use strict";
        t(function() {
            if (t(".admania_layout4postleft .widget_admania_sticky_widgets").length > 0) {
                t(".admania_contentarea").css(t(".admania_contentarea").outerHeight() < t(".admania_contentarea").outerHeight() && t(window).width() > 767 ? {
                    height: t(".admania_contentarea").outerHeight()
                } : {
                    height: "auto"
                });
                var s = {
                    $el: t(".admania_layout4postleft  .widget_admania_sticky_widgets"),
                    content_h: t(".admania_contentarea").outerHeight() > t(".admania_contentarea").outerHeight(),
                    content_l: t(".admania_contentarea").offset().left + t(".admania_contentarea").width(),
                    sticky_threshold: 0,
                    sticky_t: 100,
                    fade_threshold: t(".admania_layout4postleft  .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_layout4postleft  .widget_admania_sticky_widgets").height() : t(".admania_layout4postleft  .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_layout4postleft  .widget_admania_sticky_widgets").height(),
                    sticky_start: t(".admania_layout4postleft  .widget_admania_sticky_widgets").offset().top + 36,
                    sticky_stop: t(".admania_contentareafooter").offset().top - t(".admania_layout4postleft  .widget_admania_sticky_widgets").height() - 108,
                    sticky_width: t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().width(),
                    recalc: function() {
                        this.content_h = t(".admania_contentarea").outerHeight(), this.content_l = t(".admania_contentarea").offset().left - 14, this.fade_threshold = t(".admania_layout4postleft  .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_layout4postleft  .widget_admania_sticky_widgets").height() : t(".admania_layout4postleft  .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_layout4postleft  .widget_admania_sticky_widgets").height(), this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_width = t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().width(), this.sticky_start = t(".admania_layout4postleft  .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_layout4postleft  .widget_admania_sticky_widgets").parent().offset().top - 36 : t(".admania_layout4postleft  .widget_admania_sticky_widgets").offset().top - 36, this.sticky_stop = t(".admania_contentareafooter").offset().top - t(".admania_layout4postleft  .widget_admania_sticky_widgets").height() - 108
                    },
                    sticky: function() {
                        if (t(document).scrollTop() > this.sticky_start && t(window).width() > 768)
                            if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                var s = this.sticky_stop - t(document).scrollTop() + 36;
                                this.$el.css({
                                    top: s + "px",
                                    width: this.sticky_width + "px"
                                })
                            } else this.$el.css({
                                top: "36px",
                                width: this.sticky_width + "px"
                            });
                        else this.$el.css({
                            top: "0px",
                            width: "auto"
                        }), this.$el.removeClass("admania_sidebarsticky")
                    },
                    fade: function() {
                        t(window).width() > 768 ? t(document).scrollTop() > this.fade_threshold ? (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout")) : (this.$el.addClass("stickyfadeout"), this.$el.removeClass("stickyfadein")) : (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout"))
                    },
                    init: function() {
                        var s = this;
                        s.recalc(), t(window).on("scroll", function() {
                            s.recalc(), s.sticky(), s.fade()
                        }), t(window).on("resize", function() {
                            t(".admania_contentarea").css({
                                height: "auto"
                            }), t(".admania_contentarea").css(t(".admania_contentarea").outerHeight() < t(".admania_contentarea").outerHeight() && t(window).width() > 767 ? {
                                height: t(".admania_contentarea").outerHeight()
                            } : {
                                height: "auto"
                            }), s.recalc(), s.sticky(), s.fade()
                        })
                    }
                };
                s.init()
            }
            if (t(".admania_contentarea").length > 0) {
                var e = {
                    $el: t(".social-share-top-live"),
                    content_h: t(".admania_contentarea").outerHeight(),
                    content_l: t(".admania_contentarea").offset().left - 14,
                    sticky_threshold: 0,
                    sticky_t: 100,
                    sticky_start: t(".admania_contentarea").offset().top,
                    sticky_stop: t(".admania_contentareafooter ").offset().top - t(".admania_contentarea").outerHeight() - 150,
                    recalc: function() {
                        this.content_h = t(".admania_contentarea").outerHeight(), this.content_l = t(".admania_contentarea").offset().left - 14, this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_start = t(".admania_contentarea").offset().top, this.sticky_stop = t(".admania_contentareafooter ").offset().top - t(".admania_contentarea").outerHeight() - 150
                    },
                    sticky: function() {
                        if (t(document).scrollTop() > this.sticky_start)
                            if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                                var s = this.sticky_stop - t(document).scrollTop() + 100;
                                this.$el.css({
                                    top: s + "px",
                                    left: this.content_l + "px"
                                })
                            } else this.$el.css({
                                top: "100px",
                                left: this.content_l + "px"
                            });
                        else this.$el.css({
                            top: "100px",
                            left: "-14px"
                        }), this.$el.removeClass("admania_sidebarsticky")
                    },
                    resize: function() {},
                    init: function() {
                        var s = this;
                        t(window).on("scroll", function() {
                            s.sticky()
                        }), t(window).on("resize", function() {
                            s.recalc(), s.sticky()
                        })
                    }
                };
                e.init()
            }
        })
    }(jQuery);
}! function(t) {
    "use strict";
    t(function() {
        if (t(".admania_altsecondarysidebar  .widget_admania_sticky_widgets").length > 0) {
            t(".admania_layout4postright").css(t(".admania_layout4postright").outerHeight() < t(".admania_layout4postright").outerHeight() && t(window).width() > 767 ? {
                height: t(".admania_layout4postright").outerHeight()
            } : {
                height: "auto"
            });
            var s = {
                $el: t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets"),
                content_h: t(".admania_layout4postright").outerHeight() > t(".admania_layout4postright").outerHeight(),
                content_l: t(".admania_layout4postright").offset().left + t(".admania_layout4postright").width(),
                sticky_threshold: 0,
                sticky_t: 100,
                fade_threshold: t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").height() : t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").height(),
                sticky_start: t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").offset().top + 36,
                sticky_stop: t(".admania_layt4contentareafooter").offset().top - t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").height() - 108,
                sticky_width: t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().width(),
                recalc: function() {
                    this.content_h = t(".admania_layout4postright").outerHeight(), this.content_l = t(".admania_layout4postright").offset().left - 14, this.fade_threshold = t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().offset().top - .5 * t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").height() : t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").offset().top - .5 * t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").height(), this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_width = t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().width(), this.sticky_start = t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").hasClass("admania_sidebarsticky") ? t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().outerHeight() + t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").parent().offset().top - 36 : t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").offset().top - 36, this.sticky_stop = t(".admania_layt4contentareafooter").offset().top - t(".admania_altsecondarysidebar   .widget_admania_sticky_widgets").height() - 108
                },
                sticky: function() {
                    if (t(document).scrollTop() > this.sticky_start && t(window).width() > 768)
                        if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                            var s = this.sticky_stop - t(document).scrollTop() + 36;
                            this.$el.css({
                                top: s + "px",
                                width: this.sticky_width + "px"
                            })
                        } else this.$el.css({
                            top: "36px",
                            width: this.sticky_width + "px"
                        });
                    else this.$el.css({
                        top: "0px",
                        width: "auto"
                    }), this.$el.removeClass("admania_sidebarsticky")
                },
                fade: function() {
                    t(window).width() > 768 ? t(document).scrollTop() > this.fade_threshold ? (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout")) : (this.$el.addClass("stickyfadeout"), this.$el.removeClass("stickyfadein")) : (this.$el.addClass("stickyfadein"), this.$el.removeClass("stickyfadeout"))
                },
                init: function() {
                    var s = this;
                    s.recalc(), t(window).on("scroll", function() {
                        s.recalc(), s.sticky(), s.fade()
                    }), t(window).on("resize", function() {
                        t(".admania_layout4postright").css({
                            height: "auto"
                        }), t(".admania_layout4postright").css(t(".admania_layout4postright").outerHeight() < t(".admania_layout4postright").outerHeight() && t(window).width() > 767 ? {
                            height: t(".admania_layout4postright").outerHeight()
                        } : {
                            height: "auto"
                        }), s.recalc(), s.sticky(), s.fade()
                    })
                }
            };
            s.init()
        }
        if (t(".admania_layout4postright").length > 0) {
            var e = {
                $el: t(".social-share-top-live"),
                content_h: t(".admania_layout4postright").outerHeight(),
                content_l: t(".admania_layout4postright").offset().left - 14,
                sticky_threshold: 0,
                sticky_t: 100,
                sticky_start: t(".admania_layout4postright").offset().top,
                sticky_stop: t(".admania_layt4contentareafooter").offset().top - t(".admania_layout4postright").outerHeight() - 150,
                recalc: function() {
                    this.content_h = t(".admania_layout4postright").outerHeight(), this.content_l = t(".admania_layout4postright").offset().left - 14, this.sticky_threshold = 0, this.sticky_t = 100, this.sticky_start = t(".admania_layout4postright").offset().top, this.sticky_stop = t(".admania_layt4contentareafooter").offset().top - t(".admania_layout4postright").outerHeight() - 150
                },
                sticky: function() {
                    if (t(document).scrollTop() > this.sticky_start)
                        if (this.$el.addClass("admania_sidebarsticky"), t(document).scrollTop() > this.sticky_stop) {
                            var s = this.sticky_stop - t(document).scrollTop() + 100;
                            this.$el.css({
                                top: s + "px",
                                left: this.content_l + "px"
                            })
                        } else this.$el.css({
                            top: "100px",
                            left: this.content_l + "px"
                        });
                    else this.$el.css({
                        top: "100px",
                        left: "-14px"
                    }), this.$el.removeClass("admania_sidebarsticky")
                },
                resize: function() {},
                init: function() {
                    var s = this;
                    t(window).on("scroll", function() {
                        s.sticky()
                    }), t(window).on("resize", function() {
                        s.recalc(), s.sticky()
                    })
                }
            };
            e.init()
        }
    })
}(jQuery);
(function($, window, document, undefined) {
    function Owl(element, options) {
        this.settings = null;
        this.options = $.extend({}, Owl.Defaults, options);
        this.$element = $(element);
        this._handlers = {};
        this._plugins = {};
        this._supress = {};
        this._current = null;
        this._speed = null;
        this._coordinates = [];
        this._breakpoint = null;
        this._width = null;
        this._items = [];
        this._clones = [];
        this._mergers = [];
        this._widths = [];
        this._invalidated = {};
        this._pipe = [];
        this._drag = {
            time: null,
            target: null,
            pointer: null,
            stage: {
                start: null,
                current: null
            },
            direction: null
        };
        this._states = {
            current: {},
            tags: {
                'initializing': ['busy'],
                'animating': ['busy'],
                'dragging': ['interacting']
            }
        };
        $.each(['onResize', 'onThrottledResize'], $.proxy(function(i, handler) {
            this._handlers[handler] = $.proxy(this[handler], this);
        }, this));
        $.each(Owl.Plugins, $.proxy(function(key, plugin) {
            this._plugins[key.charAt(0).toLowerCase() + key.slice(1)] = new plugin(this);
        }, this));
        $.each(Owl.Workers, $.proxy(function(priority, worker) {
            this._pipe.push({
                'filter': worker.filter,
                'run': $.proxy(worker.run, this)
            });
        }, this));
        this.setup();
        this.initialize();
    }
    Owl.Defaults = {
        items: 3,
        loop: false,
        center: false,
        rewind: false,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        freeDrag: false,
        margin: 0,
        stagePadding: 0,
        merge: false,
        mergeFit: true,
        autoWidth: false,
        startPosition: 0,
        rtl: false,
        smartSpeed: 250,
        fluidSpeed: false,
        dragEndSpeed: false,
        responsive: {},
        responsiveRefreshRate: 200,
        responsiveBaseElement: window,
        fallbackEasing: 'swing',
        info: false,
        nestedItemSelector: false,
        itemElement: 'div',
        stageElement: 'div',
        refreshClass: 'owl-refresh',
        loadedClass: 'owl-loaded',
        loadingClass: 'owl-loading',
        rtlClass: 'owl-rtl',
        responsiveClass: 'owl-responsive',
        dragClass: 'owl-drag',
        itemClass: 'owl-item',
        stageClass: 'owl-stage',
        stageOuterClass: 'owl-stage-outer',
        grabClass: 'owl-grab'
    };
    Owl.Width = {
        Default: 'default',
        Inner: 'inner',
        Outer: 'outer'
    };
    Owl.Type = {
        Event: 'event',
        State: 'state'
    };
    Owl.Plugins = {};
    Owl.Workers = [{
        filter: ['width', 'settings'],
        run: function() {
            this._width = this.$element.width();
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            cache.current = this._items && this._items[this.relative(this._current)];
        }
    }, {
        filter: ['items', 'settings'],
        run: function() {
            this.$stage.children('.cloned').remove();
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            var margin = this.settings.margin || '',
                grid = !this.settings.autoWidth,
                rtl = this.settings.rtl,
                css = {
                    'width': 'auto',
                    'margin-left': rtl ? margin : '',
                    'margin-right': rtl ? '' : margin
                };
            !grid && this.$stage.children().css(css);
            cache.css = css;
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            var width = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
                merge = null,
                iterator = this._items.length,
                grid = !this.settings.autoWidth,
                widths = [];
            cache.items = {
                merge: false,
                width: width
            };
            while (iterator--) {
                merge = this._mergers[iterator];
                merge = this.settings.mergeFit && Math.min(merge, this.settings.items) || merge;
                cache.items.merge = merge > 1 || cache.items.merge;
                widths[iterator] = !grid ? this._items[iterator].width() : width * merge;
            }
            this._widths = widths;
        }
    }, {
        filter: ['items', 'settings'],
        run: function() {
            var clones = [],
                items = this._items,
                settings = this.settings,
                view = Math.max(settings.items * 2, 4),
                size = Math.ceil(items.length / 2) * 2,
                repeat = settings.loop && items.length ? settings.rewind ? view : Math.max(view, size) : 0,
                append = '',
                prepend = '';
            repeat /= 2;
            while (repeat--) {
                clones.push(this.normalize(clones.length / 2, true));
                append = append + items[clones[clones.length - 1]][0].outerHTML;
                clones.push(this.normalize(items.length - 1 - (clones.length - 1) / 2, true));
                prepend = items[clones[clones.length - 1]][0].outerHTML + prepend;
            }
            this._clones = clones;
            $(append).addClass('cloned').appendTo(this.$stage);
            $(prepend).addClass('cloned').prependTo(this.$stage);
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function() {
            var rtl = this.settings.rtl ? 1 : -1,
                size = this._clones.length + this._items.length,
                iterator = -1,
                previous = 0,
                current = 0,
                coordinates = [];
            while (++iterator < size) {
                previous = coordinates[iterator - 1] || 0;
                current = this._widths[this.relative(iterator)] + this.settings.margin;
                coordinates.push(previous + current * rtl);
            }
            this._coordinates = coordinates;
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function() {
            var padding = this.settings.stagePadding,
                coordinates = this._coordinates,
                css = {
                    'width': Math.ceil(Math.abs(coordinates[coordinates.length - 1])) + padding * 2,
                    'padding-left': padding || '',
                    'padding-right': padding || ''
                };
            this.$stage.css(css);
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            var iterator = this._coordinates.length,
                grid = !this.settings.autoWidth,
                items = this.$stage.children();
            if (grid && cache.items.merge) {
                while (iterator--) {
                    cache.css.width = this._widths[this.relative(iterator)];
                    items.eq(iterator).css(cache.css);
                }
            } else if (grid) {
                cache.css.width = cache.items.width;
                items.css(cache.css);
            }
        }
    }, {
        filter: ['items'],
        run: function() {
            this._coordinates.length < 1 && this.$stage.removeAttr('style');
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            cache.current = cache.current ? this.$stage.children().index(cache.current) : 0;
            cache.current = Math.max(this.minimum(), Math.min(this.maximum(), cache.current));
            this.reset(cache.current);
        }
    }, {
        filter: ['position'],
        run: function() {
            this.animate(this.coordinates(this._current));
        }
    }, {
        filter: ['width', 'position', 'items', 'settings'],
        run: function() {
            var rtl = this.settings.rtl ? 1 : -1,
                padding = this.settings.stagePadding * 2,
                begin = this.coordinates(this.current()) + padding,
                end = begin + this.width() * rtl,
                inner, outer, matches = [],
                i, n;
            for (i = 0, n = this._coordinates.length; i < n; i++) {
                inner = this._coordinates[i - 1] || 0;
                outer = Math.abs(this._coordinates[i]) + padding * rtl;
                if ((this.op(inner, '<=', begin) && (this.op(inner, '>', end))) || (this.op(outer, '<', begin) && this.op(outer, '>', end))) {
                    matches.push(i);
                }
            }
            this.$stage.children('.active').removeClass('active');
            this.$stage.children(':eq(' + matches.join('), :eq(') + ')').addClass('active');
            if (this.settings.center) {
                this.$stage.children('.center').removeClass('center');
                this.$stage.children().eq(this.current()).addClass('center');
            }
        }
    }];
    Owl.prototype.initialize = function() {
        this.enter('initializing');
        this.trigger('initialize');
        this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl);
        if (this.settings.autoWidth && !this.is('pre-loading')) {
            var imgs, nestedSelector, width;
            imgs = this.$element.find('img');
            nestedSelector = this.settings.nestedItemSelector ? '.' + this.settings.nestedItemSelector : undefined;
            width = this.$element.children(nestedSelector).width();
            if (imgs.length && width <= 0) {
                this.preloadAutoWidthImages(imgs);
            }
        }
        this.$element.addClass(this.options.loadingClass);
        this.$stage = $('<' + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>').wrap('<div class="' + this.settings.stageOuterClass + '"/>');
        this.$element.append(this.$stage.parent());
        this.replace(this.$element.children().not(this.$stage.parent()));
        if (this.$element.is(':visible')) {
            this.refresh();
        } else {
            this.invalidate('width');
        }
        this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass);
        this.registerEventHandlers();
        this.leave('initializing');
        this.trigger('initialized');
    };
    Owl.prototype.setup = function() {
        var viewport = this.viewport(),
            overwrites = this.options.responsive,
            match = -1,
            settings = null;
        if (!overwrites) {
            settings = $.extend({}, this.options);
        } else {
            $.each(overwrites, function(breakpoint) {
                if (breakpoint <= viewport && breakpoint > match) {
                    match = Number(breakpoint);
                }
            });
            settings = $.extend({}, this.options, overwrites[match]);
            delete settings.responsive;
            if (settings.responsiveClass) {
                this.$element.attr('class', this.$element.attr('class').replace(new RegExp('(' + this.options.responsiveClass + '-)\\S+\\s', 'g'), '$1' + match));
            }
        }
        if (this.settings === null || this._breakpoint !== match) {
            this.trigger('change', {
                property: {
                    name: 'settings',
                    value: settings
                }
            });
            this._breakpoint = match;
            this.settings = settings;
            this.invalidate('settings');
            this.trigger('changed', {
                property: {
                    name: 'settings',
                    value: this.settings
                }
            });
        }
    };
    Owl.prototype.optionsLogic = function() {
        if (this.settings.autoWidth) {
            this.settings.stagePadding = false;
            this.settings.merge = false;
        }
    };
    Owl.prototype.prepare = function(item) {
        var event = this.trigger('prepare', {
            content: item
        });
        if (!event.data) {
            event.data = $('<' + this.settings.itemElement + '/>').addClass(this.options.itemClass).append(item)
        }
        this.trigger('prepared', {
            content: event.data
        });
        return event.data;
    };
    Owl.prototype.update = function() {
        var i = 0,
            n = this._pipe.length,
            filter = $.proxy(function(p) {
                return this[p]
            }, this._invalidated),
            cache = {};
        while (i < n) {
            if (this._invalidated.all || $.grep(this._pipe[i].filter, filter).length > 0) {
                this._pipe[i].run(cache);
            }
            i++;
        }
        this._invalidated = {};
        !this.is('valid') && this.enter('valid');
    };
    Owl.prototype.width = function(dimension) {
        dimension = dimension || Owl.Width.Default;
        switch (dimension) {
            case Owl.Width.Inner:
            case Owl.Width.Outer:
                return this._width;
            default:
                return this._width - this.settings.stagePadding * 2 + this.settings.margin;
        }
    };
    Owl.prototype.refresh = function() {
        this.enter('refreshing');
        this.trigger('refresh');
        this.setup();
        this.optionsLogic();
        this.$element.addClass(this.options.refreshClass);
        this.update();
        this.$element.removeClass(this.options.refreshClass);
        this.leave('refreshing');
        this.trigger('refreshed');
    };
    Owl.prototype.onThrottledResize = function() {
        window.clearTimeout(this.resizeTimer);
        this.resizeTimer = window.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate);
    };
    Owl.prototype.onResize = function() {
        if (!this._items.length) {
            return false;
        }
        if (this._width === this.$element.width()) {
            return false;
        }
        if (!this.$element.is(':visible')) {
            return false;
        }
        this.enter('resizing');
        if (this.trigger('resize').isDefaultPrevented()) {
            this.leave('resizing');
            return false;
        }
        this.invalidate('width');
        this.refresh();
        this.leave('resizing');
        this.trigger('resized');
    };
    Owl.prototype.registerEventHandlers = function() {
        if ($.support.transition) {
            this.$stage.on($.support.transition.end + '.owl.core', $.proxy(this.onTransitionEnd, this));
        }
        if (this.settings.responsive !== false) {
            this.on(window, 'resize', this._handlers.onThrottledResize);
        }
        if (this.settings.mouseDrag) {
            this.$element.addClass(this.options.dragClass);
            this.$stage.on('mousedown.owl.core', $.proxy(this.onDragStart, this));
            this.$stage.on('dragstart.owl.core selectstart.owl.core', function() {
                return false
            });
        }
        if (this.settings.touchDrag) {
            this.$stage.on('touchstart.owl.core', $.proxy(this.onDragStart, this));
            this.$stage.on('touchcancel.owl.core', $.proxy(this.onDragEnd, this));
        }
    };
    Owl.prototype.onDragStart = function(event) {
        var stage = null;
        if (event.which === 3) {
            return;
        }
        if ($.support.transform) {
            stage = this.$stage.css('transform').replace(/.*\(|\)| /g, '').split(',');
            stage = {
                x: stage[stage.length === 16 ? 12 : 4],
                y: stage[stage.length === 16 ? 13 : 5]
            };
        } else {
            stage = this.$stage.position();
            stage = {
                x: this.settings.rtl ? stage.left + this.$stage.width() - this.width() + this.settings.margin : stage.left,
                y: stage.top
            };
        }
        if (this.is('animating')) {
            $.support.transform ? this.animate(stage.x) : this.$stage.stop()
            this.invalidate('position');
        }
        this.$element.toggleClass(this.options.grabClass, event.type === 'mousedown');
        this.speed(0);
        this._drag.time = new Date().getTime();
        this._drag.target = $(event.target);
        this._drag.stage.start = stage;
        this._drag.stage.current = stage;
        this._drag.pointer = this.pointer(event);
        $(document).on('mouseup.owl.core touchend.owl.core', $.proxy(this.onDragEnd, this));
        $(document).one('mousemove.owl.core touchmove.owl.core', $.proxy(function(event) {
            var delta = this.difference(this._drag.pointer, this.pointer(event));
            $(document).on('mousemove.owl.core touchmove.owl.core', $.proxy(this.onDragMove, this));
            if (Math.abs(delta.x) < Math.abs(delta.y) && this.is('valid')) {
                return;
            }
            event.preventDefault();
            this.enter('dragging');
            this.trigger('drag');
        }, this));
    };
    Owl.prototype.onDragMove = function(event) {
        var minimum = null,
            maximum = null,
            pull = null,
            delta = this.difference(this._drag.pointer, this.pointer(event)),
            stage = this.difference(this._drag.stage.start, delta);
        if (!this.is('dragging')) {
            return;
        }
        event.preventDefault();
        if (this.settings.loop) {
            minimum = this.coordinates(this.minimum());
            maximum = this.coordinates(this.maximum() + 1) - minimum;
            stage.x = (((stage.x - minimum) % maximum + maximum) % maximum) + minimum;
        } else {
            minimum = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum());
            maximum = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum());
            pull = this.settings.pullDrag ? -1 * delta.x / 5 : 0;
            stage.x = Math.max(Math.min(stage.x, minimum + pull), maximum + pull);
        }
        this._drag.stage.current = stage;
        this.animate(stage.x);
    };
    Owl.prototype.onDragEnd = function(event) {
        var delta = this.difference(this._drag.pointer, this.pointer(event)),
            stage = this._drag.stage.current,
            direction = delta.x > 0 ^ this.settings.rtl ? 'left' : 'right';
        $(document).off('.owl.core');
        this.$element.removeClass(this.options.grabClass);
        if (delta.x !== 0 && this.is('dragging') || !this.is('valid')) {
            this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed);
            this.current(this.closest(stage.x, delta.x !== 0 ? direction : this._drag.direction));
            this.invalidate('position');
            this.update();
            this._drag.direction = direction;
            if (Math.abs(delta.x) > 3 || new Date().getTime() - this._drag.time > 300) {
                this._drag.target.one('click.owl.core', function() {
                    return false;
                });
            }
        }
        if (!this.is('dragging')) {
            return;
        }
        this.leave('dragging');
        this.trigger('dragged');
    };
    Owl.prototype.closest = function(coordinate, direction) {
        var position = -1,
            pull = 30,
            width = this.width(),
            coordinates = this.coordinates();
        if (!this.settings.freeDrag) {
            $.each(coordinates, $.proxy(function(index, value) {
                if (direction === 'left' && coordinate > value - pull && coordinate < value + pull) {
                    position = index;
                } else if (direction === 'right' && coordinate > value - width - pull && coordinate < value - width + pull) {
                    position = index + 1;
                } else if (this.op(coordinate, '<', value) && this.op(coordinate, '>', coordinates[index + 1] || value - width)) {
                    position = direction === 'left' ? index + 1 : index;
                }
                return position === -1;
            }, this));
        }
        if (!this.settings.loop) {
            if (this.op(coordinate, '>', coordinates[this.minimum()])) {
                position = coordinate = this.minimum();
            } else if (this.op(coordinate, '<', coordinates[this.maximum()])) {
                position = coordinate = this.maximum();
            }
        }
        return position;
    };
    Owl.prototype.animate = function(coordinate) {
        var animate = this.speed() > 0;
        this.is('animating') && this.onTransitionEnd();
        if (animate) {
            this.enter('animating');
            this.trigger('translate');
        }
        if ($.support.transform3d && $.support.transition) {
            this.$stage.css({
                transform: 'translate3d(' + coordinate + 'px,0px,0px)',
                transition: (this.speed() / 1000) + 's'
            });
        } else if (animate) {
            this.$stage.animate({
                left: coordinate + 'px'
            }, this.speed(), this.settings.fallbackEasing, $.proxy(this.onTransitionEnd, this));
        } else {
            this.$stage.css({
                left: coordinate + 'px'
            });
        }
    };
    Owl.prototype.is = function(state) {
        return this._states.current[state] && this._states.current[state] > 0;
    };
    Owl.prototype.current = function(position) {
        if (position === undefined) {
            return this._current;
        }
        if (this._items.length === 0) {
            return undefined;
        }
        position = this.normalize(position);
        if (this._current !== position) {
            var event = this.trigger('change', {
                property: {
                    name: 'position',
                    value: position
                }
            });
            if (event.data !== undefined) {
                position = this.normalize(event.data);
            }
            this._current = position;
            this.invalidate('position');
            this.trigger('changed', {
                property: {
                    name: 'position',
                    value: this._current
                }
            });
        }
        return this._current;
    };
    Owl.prototype.invalidate = function(part) {
        if ($.type(part) === 'string') {
            this._invalidated[part] = true;
            this.is('valid') && this.leave('valid');
        }
        return $.map(this._invalidated, function(v, i) {
            return i
        });
    };
    Owl.prototype.reset = function(position) {
        position = this.normalize(position);
        if (position === undefined) {
            return;
        }
        this._speed = 0;
        this._current = position;
        this.suppress(['translate', 'translated']);
        this.animate(this.coordinates(position));
        this.release(['translate', 'translated']);
    };
    Owl.prototype.normalize = function(position, relative) {
        var n = this._items.length,
            m = relative ? 0 : this._clones.length;
        if (!this.isNumeric(position) || n < 1) {
            position = undefined;
        } else if (position < 0 || position >= n + m) {
            position = ((position - m / 2) % n + n) % n + m / 2;
        }
        return position;
    };
    Owl.prototype.relative = function(position) {
        position -= this._clones.length / 2;
        return this.normalize(position, true);
    };
    Owl.prototype.maximum = function(relative) {
        var settings = this.settings,
            maximum = this._coordinates.length,
            boundary = Math.abs(this._coordinates[maximum - 1]) - this._width,
            i = -1,
            j;
        if (settings.loop) {
            maximum = this._clones.length / 2 + this._items.length - 1;
        } else if (settings.autoWidth || settings.merge) {
            while (maximum - i > 1) {
                Math.abs(this._coordinates[j = maximum + i >> 1]) < boundary ? i = j : maximum = j;
            }
        } else if (settings.center) {
            maximum = this._items.length - 1;
        } else {
            maximum = this._items.length - settings.items;
        }
        if (relative) {
            maximum -= this._clones.length / 2;
        }
        return Math.max(maximum, 0);
    };
    Owl.prototype.minimum = function(relative) {
        return relative ? 0 : this._clones.length / 2;
    };
    Owl.prototype.items = function(position) {
        if (position === undefined) {
            return this._items.slice();
        }
        position = this.normalize(position, true);
        return this._items[position];
    };
    Owl.prototype.mergers = function(position) {
        if (position === undefined) {
            return this._mergers.slice();
        }
        position = this.normalize(position, true);
        return this._mergers[position];
    };
    Owl.prototype.clones = function(position) {
        var odd = this._clones.length / 2,
            even = odd + this._items.length,
            map = function(index) {
                return index % 2 === 0 ? even + index / 2 : odd - (index + 1) / 2
            };
        if (position === undefined) {
            return $.map(this._clones, function(v, i) {
                return map(i)
            });
        }
        return $.map(this._clones, function(v, i) {
            return v === position ? map(i) : null
        });
    };
    Owl.prototype.speed = function(speed) {
        if (speed !== undefined) {
            this._speed = speed;
        }
        return this._speed;
    };
    Owl.prototype.coordinates = function(position) {
        var multiplier = 1,
            newPosition = position - 1,
            coordinate;
        if (position === undefined) {
            return $.map(this._coordinates, $.proxy(function(coordinate, index) {
                return this.coordinates(index);
            }, this));
        }
        if (this.settings.center) {
            if (this.settings.rtl) {
                multiplier = -1;
                newPosition = position + 1;
            }
            coordinate = this._coordinates[position];
            coordinate += (this.width() - coordinate + (this._coordinates[newPosition] || 0)) / 2 * multiplier;
        } else {
            coordinate = this._coordinates[newPosition] || 0;
        }
        coordinate = Math.ceil(coordinate);
        return coordinate;
    };
    Owl.prototype.duration = function(from, to, factor) {
        if (factor === 0) {
            return 0;
        }
        return Math.min(Math.max(Math.abs(to - from), 1), 6) * Math.abs((factor || this.settings.smartSpeed));
    };
    Owl.prototype.to = function(position, speed) {
        var current = this.current(),
            revert = null,
            distance = position - this.relative(current),
            direction = (distance > 0) - (distance < 0),
            items = this._items.length,
            minimum = this.minimum(),
            maximum = this.maximum();
        if (this.settings.loop) {
            if (!this.settings.rewind && Math.abs(distance) > items / 2) {
                distance += direction * -1 * items;
            }
            position = current + distance;
            revert = ((position - minimum) % items + items) % items + minimum;
            if (revert !== position && revert - distance <= maximum && revert - distance > 0) {
                current = revert - distance;
                position = revert;
                this.reset(current);
            }
        } else if (this.settings.rewind) {
            maximum += 1;
            position = (position % maximum + maximum) % maximum;
        } else {
            position = Math.max(minimum, Math.min(maximum, position));
        }
        this.speed(this.duration(current, position, speed));
        this.current(position);
        if (this.$element.is(':visible')) {
            this.update();
        }
    };
    Owl.prototype.next = function(speed) {
        speed = speed || false;
        this.to(this.relative(this.current()) + 1, speed);
    };
    Owl.prototype.prev = function(speed) {
        speed = speed || false;
        this.to(this.relative(this.current()) - 1, speed);
    };
    Owl.prototype.onTransitionEnd = function(event) {
        if (event !== undefined) {
            event.stopPropagation();
            if ((event.target || event.srcElement || event.originalTarget) !== this.$stage.get(0)) {
                return false;
            }
        }
        this.leave('animating');
        this.trigger('translated');
    };
    Owl.prototype.viewport = function() {
        var width;
        if (this.options.responsiveBaseElement !== window) {
            width = $(this.options.responsiveBaseElement).width();
        } else if (window.innerWidth) {
            width = window.innerWidth;
        } else if (document.documentElement && document.documentElement.clientWidth) {
            width = document.documentElement.clientWidth;
        } else {
            throw 'Can not detect viewport width.';
        }
        return width;
    };
    Owl.prototype.replace = function(content) {
        this.$stage.empty();
        this._items = [];
        if (content) {
            content = (content instanceof jQuery) ? content : $(content);
        }
        if (this.settings.nestedItemSelector) {
            content = content.find('.' + this.settings.nestedItemSelector);
        }
        content.filter(function() {
            return this.nodeType === 1;
        }).each($.proxy(function(index, item) {
            item = this.prepare(item);
            this.$stage.append(item);
            this._items.push(item);
            this._mergers.push(item.find('[data-merge]').andSelf('[data-merge]').attr('data-merge') * 1 || 1);
        }, this));
        this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0);
        this.invalidate('items');
    };
    Owl.prototype.add = function(content, position) {
        var current = this.relative(this._current);
        position = position === undefined ? this._items.length : this.normalize(position, true);
        content = content instanceof jQuery ? content : $(content);
        this.trigger('add', {
            content: content,
            position: position
        });
        content = this.prepare(content);
        if (this._items.length === 0 || position === this._items.length) {
            this._items.length === 0 && this.$stage.append(content);
            this._items.length !== 0 && this._items[position - 1].after(content);
            this._items.push(content);
            this._mergers.push(content.find('[data-merge]').andSelf('[data-merge]').attr('data-merge') * 1 || 1);
        } else {
            this._items[position].before(content);
            this._items.splice(position, 0, content);
            this._mergers.splice(position, 0, content.find('[data-merge]').andSelf('[data-merge]').attr('data-merge') * 1 || 1);
        }
        this._items[current] && this.reset(this._items[current].index());
        this.invalidate('items');
        this.trigger('added', {
            content: content,
            position: position
        });
    };
    Owl.prototype.remove = function(position) {
        position = this.normalize(position, true);
        if (position === undefined) {
            return;
        }
        this.trigger('remove', {
            content: this._items[position],
            position: position
        });
        this._items[position].remove();
        this._items.splice(position, 1);
        this._mergers.splice(position, 1);
        this.invalidate('items');
        this.trigger('removed', {
            content: null,
            position: position
        });
    };
    Owl.prototype.preloadAutoWidthImages = function(images) {
        images.each($.proxy(function(i, element) {
            this.enter('pre-loading');
            element = $(element);
            $(new Image()).one('load', $.proxy(function(e) {
                element.attr('src', e.target.src);
                element.css('opacity', 1);
                this.leave('pre-loading');
                !this.is('pre-loading') && !this.is('initializing') && this.refresh();
            }, this)).attr('src', element.attr('src') || element.attr('data-src') || element.attr('data-src-retina'));
        }, this));
    };
    Owl.prototype.destroy = function() {
        this.$element.off('.owl.core');
        this.$stage.off('.owl.core');
        $(document).off('.owl.core');
        if (this.settings.responsive !== false) {
            window.clearTimeout(this.resizeTimer);
            this.off(window, 'resize', this._handlers.onThrottledResize);
        }
        for (var i in this._plugins) {
            this._plugins[i].destroy();
        }
        this.$stage.children('.cloned').remove();
        this.$stage.unwrap();
        this.$stage.children().contents().unwrap();
        this.$stage.children().unwrap();
        this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr('class', this.$element.attr('class').replace(new RegExp(this.options.responsiveClass + '-\\S+\\s', 'g'), '')).removeData('owl.carousel');
    };
    Owl.prototype.op = function(a, o, b) {
        var rtl = this.settings.rtl;
        switch (o) {
            case '<':
                return rtl ? a > b : a < b;
            case '>':
                return rtl ? a < b : a > b;
            case '>=':
                return rtl ? a <= b : a >= b;
            case '<=':
                return rtl ? a >= b : a <= b;
            default:
                break;
        }
    };
    Owl.prototype.on = function(element, event, listener, capture) {
        if (element.addEventListener) {
            element.addEventListener(event, listener, capture);
        } else if (element.attachEvent) {
            element.attachEvent('on' + event, listener);
        }
    };
    Owl.prototype.off = function(element, event, listener, capture) {
        if (element.removeEventListener) {
            element.removeEventListener(event, listener, capture);
        } else if (element.detachEvent) {
            element.detachEvent('on' + event, listener);
        }
    };
    Owl.prototype.trigger = function(name, data, namespace, state, enter) {
        var status = {
                item: {
                    count: this._items.length,
                    index: this.current()
                }
            },
            handler = $.camelCase($.grep(['on', name, namespace], function(v) {
                return v
            }).join('-').toLowerCase()),
            event = $.Event([name, 'owl', namespace || 'carousel'].join('.').toLowerCase(), $.extend({
                relatedTarget: this
            }, status, data));
        if (!this._supress[name]) {
            $.each(this._plugins, function(name, plugin) {
                if (plugin.onTrigger) {
                    plugin.onTrigger(event);
                }
            });
            this.register({
                type: Owl.Type.Event,
                name: name
            });
            this.$element.trigger(event);
            if (this.settings && typeof this.settings[handler] === 'function') {
                this.settings[handler].call(this, event);
            }
        }
        return event;
    };
    Owl.prototype.enter = function(name) {
        $.each([name].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
            if (this._states.current[name] === undefined) {
                this._states.current[name] = 0;
            }
            this._states.current[name]++;
        }, this));
    };
    Owl.prototype.leave = function(name) {
        $.each([name].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
            this._states.current[name]--;
        }, this));
    };
    Owl.prototype.register = function(object) {
        if (object.type === Owl.Type.Event) {
            if (!$.event.special[object.name]) {
                $.event.special[object.name] = {};
            }
            if (!$.event.special[object.name].owl) {
                var _default = $.event.special[object.name]._default;
                $.event.special[object.name]._default = function(e) {
                    if (_default && _default.apply && (!e.namespace || e.namespace.indexOf('owl') === -1)) {
                        return _default.apply(this, arguments);
                    }
                    return e.namespace && e.namespace.indexOf('owl') > -1;
                };
                $.event.special[object.name].owl = true;
            }
        } else if (object.type === Owl.Type.State) {
            if (!this._states.tags[object.name]) {
                this._states.tags[object.name] = object.tags;
            } else {
                this._states.tags[object.name] = this._states.tags[object.name].concat(object.tags);
            }
            this._states.tags[object.name] = $.grep(this._states.tags[object.name], $.proxy(function(tag, i) {
                return $.inArray(tag, this._states.tags[object.name]) === i;
            }, this));
        }
    };
    Owl.prototype.suppress = function(events) {
        $.each(events, $.proxy(function(index, event) {
            this._supress[event] = true;
        }, this));
    };
    Owl.prototype.release = function(events) {
        $.each(events, $.proxy(function(index, event) {
            delete this._supress[event];
        }, this));
    };
    Owl.prototype.pointer = function(event) {
        var result = {
            x: null,
            y: null
        };
        event = event.originalEvent || event || window.event;
        event = event.touches && event.touches.length ? event.touches[0] : event.changedTouches && event.changedTouches.length ? event.changedTouches[0] : event;
        if (event.pageX) {
            result.x = event.pageX;
            result.y = event.pageY;
        } else {
            result.x = event.clientX;
            result.y = event.clientY;
        }
        return result;
    };
    Owl.prototype.isNumeric = function(number) {
        return !isNaN(parseFloat(number));
    };
    Owl.prototype.difference = function(first, second) {
        return {
            x: first.x - second.x,
            y: first.y - second.y
        };
    };
    $.fn.owlCarousel = function(option) {
        var args = Array.prototype.slice.call(arguments, 1);
        return this.each(function() {
            var $this = $(this),
                data = $this.data('owl.carousel');
            if (!data) {
                data = new Owl(this, typeof option == 'object' && option);
                $this.data('owl.carousel', data);
                $.each(['next', 'prev', 'to', 'destroy', 'refresh', 'replace', 'add', 'remove'], function(i, event) {
                    data.register({
                        type: Owl.Type.Event,
                        name: event
                    });
                    data.$element.on(event + '.owl.carousel.core', $.proxy(function(e) {
                        if (e.namespace && e.relatedTarget !== this) {
                            this.suppress([event]);
                            data[event].apply(this, [].slice.call(arguments, 1));
                            this.release([event]);
                        }
                    }, data));
                });
            }
            if (typeof option == 'string' && option.charAt(0) !== '_') {
                data[option].apply(data, args);
            }
        });
    };
    $.fn.owlCarousel.Constructor = Owl;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    var AutoRefresh = function(carousel) {
        this._core = carousel;
        this._interval = null;
        this._visible = null;
        this._handlers = {
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoRefresh) {
                    this.watch();
                }
            }, this)
        };
        this._core.options = $.extend({}, AutoRefresh.Defaults, this._core.options);
        this._core.$element.on(this._handlers);
    };
    AutoRefresh.Defaults = {
        autoRefresh: true,
        autoRefreshInterval: 500
    };
    AutoRefresh.prototype.watch = function() {
        if (this._interval) {
            return;
        }
        this._visible = this._core.$element.is(':visible');
        this._interval = window.setInterval($.proxy(this.refresh, this), this._core.settings.autoRefreshInterval);
    };
    AutoRefresh.prototype.refresh = function() {
        if (this._core.$element.is(':visible') === this._visible) {
            return;
        }
        this._visible = !this._visible;
        this._core.$element.toggleClass('owl-hidden', !this._visible);
        this._visible && (this._core.invalidate('width') && this._core.refresh());
    };
    AutoRefresh.prototype.destroy = function() {
        var handler, property;
        window.clearInterval(this._interval);
        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.AutoRefresh = AutoRefresh;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    var Lazy = function(carousel) {
        this._core = carousel;
        this._loaded = [];
        this._handlers = {
            'initialized.owl.carousel change.owl.carousel resized.owl.carousel': $.proxy(function(e) {
                if (!e.namespace) {
                    return;
                }
                if (!this._core.settings || !this._core.settings.lazyLoad) {
                    return;
                }
                if ((e.property && e.property.name == 'position') || e.type == 'initialized') {
                    var settings = this._core.settings,
                        n = (settings.center && Math.ceil(settings.items / 2) || settings.items),
                        i = ((settings.center && n * -1) || 0),
                        position = (e.property && e.property.value !== undefined ? e.property.value : this._core.current()) + i,
                        clones = this._core.clones().length,
                        load = $.proxy(function(i, v) {
                            this.load(v)
                        }, this);
                    while (i++ < n) {
                        this.load(clones / 2 + this._core.relative(position));
                        clones && $.each(this._core.clones(this._core.relative(position)), load);
                        position++;
                    }
                }
            }, this)
        };
        this._core.options = $.extend({}, Lazy.Defaults, this._core.options);
        this._core.$element.on(this._handlers);
    };
    Lazy.Defaults = {
        lazyLoad: false
    };
    Lazy.prototype.load = function(position) {
        var $item = this._core.$stage.children().eq(position),
            $elements = $item && $item.find('.owl-lazy');
        if (!$elements || $.inArray($item.get(0), this._loaded) > -1) {
            return;
        }
        $elements.each($.proxy(function(index, element) {
            var $element = $(element),
                image, url = (window.devicePixelRatio > 1 && $element.attr('data-src-retina')) || $element.attr('data-src');
            this._core.trigger('load', {
                element: $element,
                url: url
            }, 'lazy');
            if ($element.is('img')) {
                $element.one('load.owl.lazy', $.proxy(function() {
                    $element.css('opacity', 1);
                    this._core.trigger('loaded', {
                        element: $element,
                        url: url
                    }, 'lazy');
                }, this)).attr('src', url);
            } else {
                image = new Image();
                image.onload = $.proxy(function() {
                    $element.css({
                        'background-image': 'url(' + url + ')',
                        'opacity': '1'
                    });
                    this._core.trigger('loaded', {
                        element: $element,
                        url: url
                    }, 'lazy');
                }, this);
                image.src = url;
            }
        }, this));
        this._loaded.push($item.get(0));
    };
    Lazy.prototype.destroy = function() {
        var handler, property;
        for (handler in this.handlers) {
            this._core.$element.off(handler, this.handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.Lazy = Lazy;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    var AutoHeight = function(carousel) {
        this._core = carousel;
        this._handlers = {
            'initialized.owl.carousel refreshed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoHeight) {
                    this.update();
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoHeight && e.property.name == 'position') {
                    this.update();
                }
            }, this),
            'loaded.owl.lazy': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoHeight && e.element.closest('.' + this._core.settings.itemClass).index() === this._core.current()) {
                    this.update();
                }
            }, this)
        };
        this._core.options = $.extend({}, AutoHeight.Defaults, this._core.options);
        this._core.$element.on(this._handlers);
    };
    AutoHeight.Defaults = {
        autoHeight: false,
        autoHeightClass: 'owl-height'
    };
    AutoHeight.prototype.update = function() {
        var start = this._core._current,
            end = start + this._core.settings.items,
            visible = this._core.$stage.children().toArray().slice(start, end),
            heights = [],
            maxheight = 0;
        $.each(visible, function(index, item) {
            heights.push($(item).height());
        });
        maxheight = Math.max.apply(null, heights);
        this._core.$stage.parent().height(maxheight).addClass(this._core.settings.autoHeightClass);
    };
    AutoHeight.prototype.destroy = function() {
        var handler, property;
        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.AutoHeight = AutoHeight;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    var Video = function(carousel) {
        this._core = carousel;
        this._videos = {};
        this._playing = null;
        this._handlers = {
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace) {
                    this._core.register({
                        type: 'state',
                        name: 'playing',
                        tags: ['interacting']
                    });
                }
            }, this),
            'resize.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.video && this.isInFullScreen()) {
                    e.preventDefault();
                }
            }, this),
            'refreshed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.is('resizing')) {
                    this._core.$stage.find('.cloned .owl-video-frame').remove();
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name === 'position' && this._playing) {
                    this.stop();
                }
            }, this),
            'prepared.owl.carousel': $.proxy(function(e) {
                if (!e.namespace) {
                    return;
                }
                var $element = $(e.content).find('.owl-video');
                if ($element.length) {
                    $element.css('display', 'none');
                    this.fetch($element, $(e.content));
                }
            }, this)
        };
        this._core.options = $.extend({}, Video.Defaults, this._core.options);
        this._core.$element.on(this._handlers);
        this._core.$element.on('click.owl.video', '.owl-video-play-icon', $.proxy(function(e) {
            this.play(e);
        }, this));
    };
    Video.Defaults = {
        video: false,
        videoHeight: false,
        videoWidth: false
    };
    Video.prototype.fetch = function(target, item) {
        var type = (function() {
                if (target.attr('data-vimeo-id')) {
                    return 'vimeo';
                } else if (target.attr('data-vzaar-id')) {
                    return 'vzaar'
                } else {
                    return 'youtube';
                }
            })(),
            id = target.attr('data-vimeo-id') || target.attr('data-youtube-id') || target.attr('data-vzaar-id'),
            width = target.attr('data-width') || this._core.settings.videoWidth,
            height = target.attr('data-height') || this._core.settings.videoHeight,
            url = target.attr('href');
        if (url) {
            id = url.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);
            if (id[3].indexOf('youtu') > -1) {
                type = 'youtube';
            } else if (id[3].indexOf('vimeo') > -1) {
                type = 'vimeo';
            } else if (id[3].indexOf('vzaar') > -1) {
                type = 'vzaar';
            } else {
                throw new Error('Video URL not supported.');
            }
            id = id[6];
        } else {
            throw new Error('Missing video URL.');
        }
        this._videos[url] = {
            type: type,
            id: id,
            width: width,
            height: height
        };
        item.attr('data-video', url);
        this.thumbnail(target, this._videos[url]);
    };
    Video.prototype.thumbnail = function(target, video) {
        var tnLink, icon, path, dimensions = video.width && video.height ? 'style="width:' + video.width + 'px;height:' + video.height + 'px;"' : '',
            customTn = target.find('img'),
            srcType = 'src',
            lazyClass = '',
            settings = this._core.settings,
            create = function(path) {
                icon = '<div class="owl-video-play-icon"></div>';
                if (settings.lazyLoad) {
                    tnLink = '<div class="owl-video-tn ' + lazyClass + '" ' + srcType + '="' + path + '"></div>';
                } else {
                    tnLink = '<div class="owl-video-tn" style="opacity:1;background-image:url(' + path + ')"></div>';
                }
                target.after(tnLink);
                target.after(icon);
            };
        target.wrap('<div class="owl-video-wrapper"' + dimensions + '></div>');
        if (this._core.settings.lazyLoad) {
            srcType = 'data-src';
            lazyClass = 'owl-lazy';
        }
        if (customTn.length) {
            create(customTn.attr(srcType));
            customTn.remove();
            return false;
        }
        if (video.type === 'youtube') {
            path = "//img.youtube.com/vi/" + video.id + "/hqdefault.jpg";
            create(path);
        } else if (video.type === 'vimeo') {
            $.ajax({
                type: 'GET',
                url: '//vimeo.com/api/v2/video/' + video.id + '.json',
                jsonp: 'callback',
                dataType: 'jsonp',
                success: function(data) {
                    path = data[0].thumbnail_large;
                    create(path);
                }
            });
        } else if (video.type === 'vzaar') {
            $.ajax({
                type: 'GET',
                url: '//vzaar.com/api/videos/' + video.id + '.json',
                jsonp: 'callback',
                dataType: 'jsonp',
                success: function(data) {
                    path = data.framegrab_url;
                    create(path);
                }
            });
        }
    };
    Video.prototype.stop = function() {
        this._core.trigger('stop', null, 'video');
        this._playing.find('.owl-video-frame').remove();
        this._playing.removeClass('owl-video-playing');
        this._playing = null;
        this._core.leave('playing');
        this._core.trigger('stopped', null, 'video');
    };
    Video.prototype.play = function(event) {
        var target = $(event.target),
            item = target.closest('.' + this._core.settings.itemClass),
            video = this._videos[item.attr('data-video')],
            width = video.width || '100%',
            height = video.height || this._core.$stage.height(),
            html;
        if (this._playing) {
            return;
        }
        this._core.enter('playing');
        this._core.trigger('play', null, 'video');
        item = this._core.items(this._core.relative(item.index()));
        this._core.reset(item.index());
        if (video.type === 'youtube') {
            html = '<iframe width="' + width + '" height="' + height + '" src="//www.youtube.com/embed/' + video.id + '?autoplay=1&v=' + video.id + '" frameborder="0" allowfullscreen></iframe>';
        } else if (video.type === 'vimeo') {
            html = '<iframe src="//player.vimeo.com/video/' + video.id + '?autoplay=1" width="' + width + '" height="' + height + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        } else if (video.type === 'vzaar') {
            html = '<iframe frameborder="0"' + 'height="' + height + '"' + 'width="' + width + '" allowfullscreen mozallowfullscreen webkitAllowFullScreen ' + 'src="//view.vzaar.com/' + video.id + '/player?autoplay=true"></iframe>';
        }
        $('<div class="owl-video-frame">' + html + '</div>').insertAfter(item.find('.owl-video'));
        this._playing = item.addClass('owl-video-playing');
    };
    Video.prototype.isInFullScreen = function() {
        var element = document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement;
        return element && $(element).parent().hasClass('owl-video-frame');
    };
    Video.prototype.destroy = function() {
        var handler, property;
        this._core.$element.off('click.owl.video');
        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.Video = Video;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    var Animate = function(scope) {
        this.core = scope;
        this.core.options = $.extend({}, Animate.Defaults, this.core.options);
        this.swapping = true;
        this.previous = undefined;
        this.next = undefined;
        this.handlers = {
            'change.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name == 'position') {
                    this.previous = this.core.current();
                    this.next = e.property.value;
                }
            }, this),
            'drag.owl.carousel dragged.owl.carousel translated.owl.carousel': $.proxy(function(e) {
                if (e.namespace) {
                    this.swapping = e.type == 'translated';
                }
            }, this),
            'translate.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn)) {
                    this.swap();
                }
            }, this)
        };
        this.core.$element.on(this.handlers);
    };
    Animate.Defaults = {
        animateOut: false,
        animateIn: false
    };
    Animate.prototype.swap = function() {
        if (this.core.settings.items !== 1) {
            return;
        }
        if (!$.support.animation || !$.support.transition) {
            return;
        }
        this.core.speed(0);
        var left, clear = $.proxy(this.clear, this),
            previous = this.core.$stage.children().eq(this.previous),
            next = this.core.$stage.children().eq(this.next),
            incoming = this.core.settings.animateIn,
            outgoing = this.core.settings.animateOut;
        if (this.core.current() === this.previous) {
            return;
        }
        if (outgoing) {
            left = this.core.coordinates(this.previous) - this.core.coordinates(this.next);
            previous.one($.support.animation.end, clear).css({
                'left': left + 'px'
            }).addClass('animated owl-animated-out').addClass(outgoing);
        }
        if (incoming) {
            next.one($.support.animation.end, clear).addClass('animated owl-animated-in').addClass(incoming);
        }
    };
    Animate.prototype.clear = function(e) {
        $(e.target).css({
            'left': ''
        }).removeClass('animated owl-animated-out owl-animated-in').removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut);
        this.core.onTransitionEnd();
    };
    Animate.prototype.destroy = function() {
        var handler, property;
        for (handler in this.handlers) {
            this.core.$element.off(handler, this.handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.Animate = Animate;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    var Autoplay = function(carousel) {
        this._core = carousel;
        this._timeout = null;
        this._paused = false;
        this._handlers = {
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name === 'settings') {
                    if (this._core.settings.autoplay) {
                        this.play();
                    } else {
                        this.stop();
                    }
                } else if (e.namespace && e.property.name === 'position') {
                    if (this._core.settings.autoplay) {
                        this._setAutoPlayInterval();
                    }
                }
            }, this),
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoplay) {
                    this.play();
                }
            }, this),
            'play.owl.autoplay': $.proxy(function(e, t, s) {
                if (e.namespace) {
                    this.play(t, s);
                }
            }, this),
            'stop.owl.autoplay': $.proxy(function(e) {
                if (e.namespace) {
                    this.stop();
                }
            }, this),
            'mouseover.owl.autoplay': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
                    this.pause();
                }
            }, this),
            'mouseleave.owl.autoplay': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
                    this.play();
                }
            }, this),
            'touchstart.owl.core': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
                    this.pause();
                }
            }, this),
            'touchend.owl.core': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause) {
                    this.play();
                }
            }, this)
        };
        this._core.$element.on(this._handlers);
        this._core.options = $.extend({}, Autoplay.Defaults, this._core.options);
    };
    Autoplay.Defaults = {
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        autoplaySpeed: false
    };
    Autoplay.prototype.play = function(timeout, speed) {
        this._paused = false;
        if (this._core.is('rotating')) {
            return;
        }
        this._core.enter('rotating');
        this._setAutoPlayInterval();
    };
    Autoplay.prototype._getNextTimeout = function(timeout, speed) {
        if (this._timeout) {
            window.clearTimeout(this._timeout);
        }
        return window.setTimeout($.proxy(function() {
            if (this._paused || this._core.is('busy') || this._core.is('interacting') || document.hidden) {
                return;
            }
            this._core.next(speed || this._core.settings.autoplaySpeed);
        }, this), timeout || this._core.settings.autoplayTimeout);
    };
    Autoplay.prototype._setAutoPlayInterval = function() {
        this._timeout = this._getNextTimeout();
    };
    Autoplay.prototype.stop = function() {
        if (!this._core.is('rotating')) {
            return;
        }
        window.clearTimeout(this._timeout);
        this._core.leave('rotating');
    };
    Autoplay.prototype.pause = function() {
        if (!this._core.is('rotating')) {
            return;
        }
        this._paused = true;
    };
    Autoplay.prototype.destroy = function() {
        var handler, property;
        this.stop();
        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.autoplay = Autoplay;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    'use strict';
    var Navigation = function(carousel) {
        this._core = carousel;
        this._initialized = false;
        this._pages = [];
        this._controls = {};
        this._templates = [];
        this.$element = this._core.$element;
        this._overrides = {
            next: this._core.next,
            prev: this._core.prev,
            to: this._core.to
        };
        this._handlers = {
            'prepared.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.dotsData) {
                    this._templates.push('<div class="' + this._core.settings.dotClass + '">' + $(e.content).find('[data-dot]').addBack('[data-dot]').attr('data-dot') + '</div>');
                }
            }, this),
            'added.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.dotsData) {
                    this._templates.splice(e.position, 0, this._templates.pop());
                }
            }, this),
            'remove.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.dotsData) {
                    this._templates.splice(e.position, 1);
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name == 'position') {
                    this.draw();
                }
            }, this),
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && !this._initialized) {
                    this._core.trigger('initialize', null, 'navigation');
                    this.initialize();
                    this.update();
                    this.draw();
                    this._initialized = true;
                    this._core.trigger('initialized', null, 'navigation');
                }
            }, this),
            'refreshed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._initialized) {
                    this._core.trigger('refresh', null, 'navigation');
                    this.update();
                    this.draw();
                    this._core.trigger('refreshed', null, 'navigation');
                }
            }, this)
        };
        this._core.options = $.extend({}, Navigation.Defaults, this._core.options);
        this.$element.on(this._handlers);
    };
    Navigation.Defaults = {
        nav: false,
        navText: ['prev', 'next'],
        navSpeed: false,
        navElement: 'div',
        navContainer: false,
        navContainerClass: 'owl-nav',
        navClass: ['owl-prev', 'owl-next'],
        slideBy: 1,
        dotClass: 'owl-dot',
        dotsClass: 'owl-dots',
        dots: true,
        dotsEach: false,
        dotsData: false,
        dotsSpeed: false,
        dotsContainer: false
    };
    Navigation.prototype.initialize = function() {
        var override, settings = this._core.settings;
        this._controls.$relative = (settings.navContainer ? $(settings.navContainer) : $('<div>').addClass(settings.navContainerClass).appendTo(this.$element)).addClass('disabled');
        this._controls.$previous = $('<' + settings.navElement + '>').addClass(settings.navClass[0]).html(settings.navText[0]).prependTo(this._controls.$relative).on('click', $.proxy(function(e) {
            this.prev(settings.navSpeed);
        }, this));
        this._controls.$next = $('<' + settings.navElement + '>').addClass(settings.navClass[1]).html(settings.navText[1]).appendTo(this._controls.$relative).on('click', $.proxy(function(e) {
            this.next(settings.navSpeed);
        }, this));
        if (!settings.dotsData) {
            this._templates = [$('<div>').addClass(settings.dotClass).append($('<span>')).prop('outerHTML')];
        }
        this._controls.$absolute = (settings.dotsContainer ? $(settings.dotsContainer) : $('<div>').addClass(settings.dotsClass).appendTo(this.$element)).addClass('disabled');
        this._controls.$absolute.on('click', 'div', $.proxy(function(e) {
            var index = $(e.target).parent().is(this._controls.$absolute) ? $(e.target).index() : $(e.target).parent().index();
            e.preventDefault();
            this.to(index, settings.dotsSpeed);
        }, this));
        for (override in this._overrides) {
            this._core[override] = $.proxy(this[override], this);
        }
    };
    Navigation.prototype.destroy = function() {
        var handler, control, property, override;
        for (handler in this._handlers) {
            this.$element.off(handler, this._handlers[handler]);
        }
        for (control in this._controls) {
            this._controls[control].remove();
        }
        for (override in this.overides) {
            this._core[override] = this._overrides[override];
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    Navigation.prototype.update = function() {
        var i, j, k, lower = this._core.clones().length / 2,
            upper = lower + this._core.items().length,
            maximum = this._core.maximum(true),
            settings = this._core.settings,
            size = settings.center || settings.autoWidth || settings.dotsData ? 1 : settings.dotsEach || settings.items;
        if (settings.slideBy !== 'page') {
            settings.slideBy = Math.min(settings.slideBy, settings.items);
        }
        if (settings.dots || settings.slideBy == 'page') {
            this._pages = [];
            for (i = lower, j = 0, k = 0; i < upper; i++) {
                if (j >= size || j === 0) {
                    this._pages.push({
                        start: Math.min(maximum, i - lower),
                        end: i - lower + size - 1
                    });
                    if (Math.min(maximum, i - lower) === maximum) {
                        break;
                    }
                    j = 0, ++k;
                }
                j += this._core.mergers(this._core.relative(i));
            }
        }
    };
    Navigation.prototype.draw = function() {
        var difference, settings = this._core.settings,
            disabled = this._core.items().length <= settings.items,
            index = this._core.relative(this._core.current()),
            loop = settings.loop || settings.rewind;
        this._controls.$relative.toggleClass('disabled', !settings.nav || disabled);
        if (settings.nav) {
            this._controls.$previous.toggleClass('disabled', !loop && index <= this._core.minimum(true));
            this._controls.$next.toggleClass('disabled', !loop && index >= this._core.maximum(true));
        }
        this._controls.$absolute.toggleClass('disabled', !settings.dots || disabled);
        if (settings.dots) {
            difference = this._pages.length - this._controls.$absolute.children().length;
            if (settings.dotsData && difference !== 0) {
                this._controls.$absolute.html(this._templates.join(''));
            } else if (difference > 0) {
                this._controls.$absolute.append(new Array(difference + 1).join(this._templates[0]));
            } else if (difference < 0) {
                this._controls.$absolute.children().slice(difference).remove();
            }
            this._controls.$absolute.find('.active').removeClass('active');
            this._controls.$absolute.children().eq($.inArray(this.current(), this._pages)).addClass('active');
        }
    };
    Navigation.prototype.onTrigger = function(event) {
        var settings = this._core.settings;
        event.page = {
            index: $.inArray(this.current(), this._pages),
            count: this._pages.length,
            size: settings && (settings.center || settings.autoWidth || settings.dotsData ? 1 : settings.dotsEach || settings.items)
        };
    };
    Navigation.prototype.current = function() {
        var current = this._core.relative(this._core.current());
        return $.grep(this._pages, $.proxy(function(page, index) {
            return page.start <= current && page.end >= current;
        }, this)).pop();
    };
    Navigation.prototype.getPosition = function(successor) {
        var position, length, settings = this._core.settings;
        if (settings.slideBy == 'page') {
            position = $.inArray(this.current(), this._pages);
            length = this._pages.length;
            successor ? ++position : --position;
            position = this._pages[((position % length) + length) % length].start;
        } else {
            position = this._core.relative(this._core.current());
            length = this._core.items().length;
            successor ? position += settings.slideBy : position -= settings.slideBy;
        }
        return position;
    };
    Navigation.prototype.next = function(speed) {
        $.proxy(this._overrides.to, this._core)(this.getPosition(true), speed);
    };
    Navigation.prototype.prev = function(speed) {
        $.proxy(this._overrides.to, this._core)(this.getPosition(false), speed);
    };
    Navigation.prototype.to = function(position, speed, standard) {
        var length;
        if (!standard && this._pages.length) {
            length = this._pages.length;
            $.proxy(this._overrides.to, this._core)(this._pages[((position % length) + length) % length].start, speed);
        } else {
            $.proxy(this._overrides.to, this._core)(position, speed);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.Navigation = Navigation;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    'use strict';
    var Hash = function(carousel) {
        this._core = carousel;
        this._hashes = {};
        this.$element = this._core.$element;
        this._handlers = {
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.startPosition === 'URLHash') {
                    $(window).trigger('hashchange.owl.navigation');
                }
            }, this),
            'prepared.owl.carousel': $.proxy(function(e) {
                if (e.namespace) {
                    var hash = $(e.content).find('[data-hash]').addBack('[data-hash]').attr('data-hash');
                    if (!hash) {
                        return;
                    }
                    this._hashes[hash] = e.content;
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name === 'position') {
                    var current = this._core.items(this._core.relative(this._core.current())),
                        hash = $.map(this._hashes, function(item, hash) {
                            return item === current ? hash : null;
                        }).join();
                    if (!hash || window.location.hash.slice(1) === hash) {
                        return;
                    }
                    window.location.hash = hash;
                }
            }, this)
        };
        this._core.options = $.extend({}, Hash.Defaults, this._core.options);
        this.$element.on(this._handlers);
        $(window).on('hashchange.owl.navigation', $.proxy(function(e) {
            var hash = window.location.hash.substring(1),
                items = this._core.$stage.children(),
                position = this._hashes[hash] && items.index(this._hashes[hash]);
            if (position === undefined || position === this._core.current()) {
                return;
            }
            this._core.to(this._core.relative(position), false, true);
        }, this));
    };
    Hash.Defaults = {
        URLhashListener: false
    };
    Hash.prototype.destroy = function() {
        var handler, property;
        $(window).off('hashchange.owl.navigation');
        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };
    $.fn.owlCarousel.Constructor.Plugins.Hash = Hash;
})(window.Zepto || window.jQuery, window, document);;
(function($, window, document, undefined) {
    var style = $('<support>').get(0).style,
        prefixes = 'Webkit Moz O ms'.split(' '),
        events = {
            transition: {
                end: {
                    WebkitTransition: 'webkitTransitionEnd',
                    MozTransition: 'transitionend',
                    OTransition: 'oTransitionEnd',
                    transition: 'transitionend'
                }
            },
            animation: {
                end: {
                    WebkitAnimation: 'webkitAnimationEnd',
                    MozAnimation: 'animationend',
                    OAnimation: 'oAnimationEnd',
                    animation: 'animationend'
                }
            }
        },
        tests = {
            csstransforms: function() {
                return !!test('transform');
            },
            csstransforms3d: function() {
                return !!test('perspective');
            },
            csstransitions: function() {
                return !!test('transition');
            },
            cssanimations: function() {
                return !!test('animation');
            }
        };

    function test(property, prefixed) {
        var result = false,
            upper = property.charAt(0).toUpperCase() + property.slice(1);
        $.each((property + ' ' + prefixes.join(upper + ' ') + upper).split(' '), function(i, property) {
            if (style[property] !== undefined) {
                result = prefixed ? property : true;
                return false;
            }
        });
        return result;
    }

    function prefixed(property) {
        return test(property, true);
    }
    if (tests.csstransitions()) {
        $.support.transition = new String(prefixed('transition'))
        $.support.transition.end = events.transition.end[$.support.transition];
    }
    if (tests.cssanimations()) {
        $.support.animation = new String(prefixed('animation'))
        $.support.animation.end = events.animation.end[$.support.animation];
    }
    if (tests.csstransforms()) {
        $.support.transform = new String(prefixed('transform'));
        $.support.transform3d = tests.csstransforms3d();
    }
})(window.Zepto || window.jQuery, window, document);


