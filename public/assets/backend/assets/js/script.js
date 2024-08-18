$(function(){"use strict";var e=$("body");function t(){$(window).width()>1023?(e.is(".sidebar-open")&&e.removeClass("sidebar-open"),$(".sidebar .sidebar-body").on("mouseenter",function(){e.addClass("open-sidebar-folded")}),$(".sidebar .sidebar-body").on("mouseleave",function(){e.removeClass("open-sidebar-folded"),e.hasClass("sidebar-folded")&&$(".sidebar").find(".sidebar-body .has-sub-item a").siblings("ul").removeClass("open").slideUp(0)}),$(".sidebar .sidebar-toogle-pin").on("click",function(){e.toggleClass("sidebar-folded"),e.find(".sidebar-body .has-sub-item a").siblings("ul").removeClass("open").slideUp("fast")})):e.is(".sidebar-folded, .open-sidebar-folded")&&e.removeClass("sidebar-folded open-sidebar-folded")}$(".sidebar .sidebar-body").find("ul li").parents(".sidebar-body ul li").addClass("has-sub-item"),$(".sidebar .sidebar-body").find(".has-sub-item > a").on("click",function(t){t.preventDefault(),e.hasClass("sidebar-folded")&&!e.hasClass("open-sidebar-folded")||($(this).parent(".has-sub-item").toggleClass("sub-menu-opened"),$(this).siblings("ul").hasClass("open")?$(this).siblings("ul").removeClass("open").slideUp("200"):$(this).siblings("ul").addClass("open").slideDown("200"))}),window.onpaint=void($(".sidebar .sidebar-body").find(".has-sub-item").hasClass("sub-menu-opened")&&$(".sidebar .sidebar-body").find(".sub-menu-opened a").siblings("ul").addClass("open").show()),$(".header .header-toogle-menu, .offcanvas-overlay").on("click",function(){e.toggleClass("sidebar-open"),$(".offcanvas-overlay").toggleClass("active")}),$(window).resize(function(){t()}),t(),$("[data-bg-img]").css("background-image",function(){return'url("'+$(this).data("bg-img")+'")'}).removeAttr("data-bg-img").addClass("bg-img"),$(document.body).on("click",'[data-toggle="collapse"]',function(e){var t="#"+$(this).data("target");$(this).toggleClass("collapsed"),$(t).slideToggle(),e.preventDefault()}),$(document).on("click",".theme-input-group.header-search",function(e){e.preventDefault(),e.stopPropagation(),$(this).addClass("active")}),$(document).on("click","body",function(e){$(".theme-input-group.header-search.active").removeClass("active")}),jQuery("img.svg").each(function(){var e=jQuery(this),t=e.attr("id"),o=e.attr("class"),s=e.attr("src");jQuery.get(s,function(s){var i=jQuery(s).find("svg");void 0!==t&&(i=i.attr("id",t)),void 0!==o&&(i=i.attr("class",o+" replaced-svg")),!(i=i.removeAttr("xmlns:a")).attr("viewBox")&&i.attr("height")&&i.attr("width")&&i.attr("viewBox","0 0 "+i.attr("height")+" "+i.attr("width")),e.replaceWith(i)},"xml")});let o=$(".mail-list").find(".mail-list-item input[type=checkbox]");o.length&&o.on("click",function(){1==$(this).prop("checked")?$(this).parents().eq(3).addClass("selected"):$(this).parents().eq(3).removeClass("selected")}),$(".mail-header, .project-header, .file-header").find(".custom-checkbox input[type=checkbox]").length&&$(".mail-header, .project-header, .file-header").find(".custom-checkbox input[type=checkbox]").on("click",function(){1==$(this).prop("checked")?($(".mail-list").find(".mail-list-item").addClass("selected"),$(".project-box, .file").find(".custom-checkbox input[type=checkbox]").prop("checked",!0),o.prop("checked",!0)):($(".mail-list").find(".mail-list-item").removeClass("selected"),$(".project-box, .file").find(".custom-checkbox input[type=checkbox]").prop("checked",!1),o.prop("checked",!1))}),$('.custom-checkbox input[type="checkbox"]').length&&($(".custom-checkbox").parents(".checkbox-wrap").siblings(".valid-feedback, .invalid-feedback").show(),$('.custom-checkbox input[type="checkbox"]').on("click",function(e){e.stopPropagation(),1==$(this).prop("checked")?($(this).parent(".custom-checkbox").siblings(".todo-text").addClass("line-through"),$(this).parents().filter("tbody tr").addClass("selected"),$(this).parents(".checkbox-wrap").siblings(".valid-feedback").show(),$(this).parents(".checkbox-wrap").siblings(".invalid-feedback").hide()):0==$(this).prop("checked")&&($(this).parent(".custom-checkbox").siblings(".todo-text").removeClass("line-through"),$(this).parents().filter("tbody tr").removeClass("selected"),$(this).parents(".checkbox-wrap").siblings(".valid-feedback").hide(),$(this).parents(".checkbox-wrap").siblings(".invalid-feedback").show())}));let s=$(".invoice-list-table thead, .invoice-list thead, .contact-list-table thead").find(".custom-checkbox input[type=checkbox]");s.length&&s.on("click",function(){1==$(this).prop("checked")?($(this).parents().filter("thead").siblings("tbody").find('.custom-checkbox input[type="checkbox"]').prop("checked",!0),$(this).parents().filter("thead").siblings("tbody").find("tr").addClass("selected")):($(this).parents().filter("thead").siblings("tbody").find('.custom-checkbox input[type="checkbox"]').prop("checked",!1),$(this).parents().filter("thead").siblings("tbody").find("tr").removeClass("selected"))});let i=$(".project-header, .project-box, .file-header, .file").find(".custom-checkbox");i.length&&(i.hide(),i.find('input[type="checkbox"]').change(function(){0==i.find('input[type="checkbox"]:checked').length&&i.hide()}),$(".project-box, .file").find(".dropdown-button .select").on("click",function(e){e.preventDefault(),$(".project-header, .project-box, .file-header, .file").find(".custom-checkbox").show(),$(this).parents().filter(".project-box, .file").find('.custom-checkbox input[type="checkbox"]').prop("checked",!0)}),$(".project-box, .file").find(".dropdown-button .delete").on("click",function(e){e.preventDefault(),$(this).parents().filter('[class*="col-"]').remove()})),$(".checklist-item .item").on("click",function(e){0==$(this).siblings(".custom-checkbox").children("input[type=checkbox]").prop("checked")?$(this).siblings(".custom-checkbox").children("input[type=checkbox]").prop("checked",!0):$(this).siblings(".custom-checkbox").children("input[type=checkbox]").prop("checked",!1)}),$(".dropdown-menu.checkbox > div").on("click",function(e){$(this).siblings(".item-list").children(".custom-checkbox").children("input[type=checkbox]").prop("checked",!1)});let n=$(".single-row");n.length&&(n.on("mouseenter",function(){$(this).prev(".single-row").addClass("change-border-color")}),n.on("mouseleave",function(){$(this).prev(".single-row").removeClass("change-border-color")}));var r=$('[data-trigger="scrollbar"]');r.length&&(r.each(function(){var e,t;e=new PerfectScrollbar(this),null!==(t=localStorage.getItem("ps."+this.classList[0]))&&(e.element.scrollTop=t)}),r.on("ps-scroll-y",function(){localStorage.setItem("ps."+this.classList[0],this.scrollTop)})),$.fn.bekeyProgressbar=function(e){e=$.extend({animate:!0,animateText:!0},e);var t=$(this),o=t.find(".ProgressBar-percentage--count"),s=t.find(".ProgressBar-circle"),i=100-t.attr("data-progress"),n=o.parent().attr("data-progress"),r=2*s.attr("r"),a=Math.round(Math.PI*r),c=a*i/100;s.css({"stroke-dasharray":a,"stroke-dashoffset":c}),!0===e.animate&&s.css({"stroke-dashoffset":a}).animate({"stroke-dashoffset":c},2e3),1==e.animateText?$({Counter:0}).animate({Counter:n},{duration:2e3,step:function(){o.html(Math.ceil(this.Counter)+"<span>%</span>")}}):o.html(n+"<span>k</span>")},$(".ProgressBar_1").bekeyProgressbar(),$(".ProgressBar_2").bekeyProgressbar(),$(".ProgressBar_3").bekeyProgressbar(),$(".ProgressBar_4").bekeyProgressbar(),$(".ProgressBar_5").bekeyProgressbar({animateText:!1}),$(".ProgressBar_6").bekeyProgressbar(),$(".ProgressBar_7").bekeyProgressbar(),$(".ProgressBar_8").bekeyProgressbar(),$(".ProgressBar_9").bekeyProgressbar(),$(".ProgressBar_10").bekeyProgressbar(),$(".ProgressBar_11").bekeyProgressbar(),$(".ProgressBar_12").bekeyProgressbar(),$(".ProgressBar_13").bekeyProgressbar(),$(".ProgressBar_14").bekeyProgressbar(),$(".ProgressBar_15").bekeyProgressbar(),$(".ProgressBar_16").bekeyProgressbar(),$(".ProgressBar_17").bekeyProgressbar(),$(".ProgressBar_18").bekeyProgressbar(),$(".ProgressBar_19").bekeyProgressbar(),$(".ProgressBar_20").bekeyProgressbar(),$(".ProgressBar_21").bekeyProgressbar(),$(".ProgressBar_22").bekeyProgressbar(),$(".ProgressBar_23").bekeyProgressbar();var a=$(".process-bar-wrapper");if(a.length){function c(){a.each(function(){var e=$(this).offset().top-$(window).height(),t=$(this).children("[data-process-width]").data("process-width");$(window).scrollTop()>e&&(t>100?$(this).children(".process-bar").css({width:"100%",transition:"2.25s"}):$(this).children(".process-bar").css({width:t+"%",transition:"2.25s"}))})}c(),$(window).on("scroll",function(){c()})}$(document).ready(function(){var e=["January","February","March","April","May","June","July","August","September","October","November","December"],t=new Date;t.setDate(t.getDate()),$("#date").html(["Sun,","Mon,","Tue,","Wed,","Thu,","Fri,","Sat,"][t.getDay()]+" "+t.getDate()+" "+e[t.getMonth()]+" "+t.getFullYear()),$(".add-card").find(".date-text").html(t.getDate()+" "+e[t.getMonth()]),setInterval(function(){var e=(new Date).getMinutes();$("#min").html((e<10?"0":"")+e)},1e3),setInterval(function(){var e=(new Date).getHours();$("#hours").html((e<10?"0":"")+e)},1e3)}),$(".cc-bcc .form-group").length&&($(".cc-bcc .form-group").hide(),$(".cc.cc-btn").on("click",function(){$(".cc-bcc .cc-form-group").slideDown(200)}),$(".bcc.cc-btn").on("click",function(){$(".cc-bcc .bcc-form-group").slideDown(200)}),$(".form-group .close-btn").on("click",function(){$(this).parent(".form-group").slideUp(200)})),$("#search-box").length&&($("#search-box").hide(),$("#search-tab").on("click",function(){$("#search-box").slideDown(150)}),$(".search-box-close").on("click",function(e){e.stopPropagation(),$("#search-box").slideUp(150)})),$(".contact-list-table .actions").find(".contact-close").on("click",function(){$(this).parents().filter("tr").remove()}),$(".contact-box").find(".contact-close").on("click",function(e){e.preventDefault(),$(this).parents().filter('[class*="col-"]').remove()}),$("#fileUpload, #fileUpload2").on("change",function(){if(this.files&&this.files[0]){let e=new FileReader;e.onload=function(e){$(".profile-avatar").attr("src",e.target.result)},e.readAsDataURL(this.files[0])}}),$(".board-members-list").find(".member-item").on("click",function(e){$(this).toggleClass("active")});var l=$(".color-balls span");if(l.length&&l.on("click",function(){var e=$(this).css("backgroundColor");$(this).parents().filter(".project-box").css("backgroundColor",e)}),$("#copy-link-btn").on("click",function(e){e.preventDefault(),$("#get-link").select(),document.execCommand("copy")}),$("#projectShareModal, #shareModal").find(".share-actions .link-btn").on("click",function(e){e.preventDefault(),$(this).toggleClass("soft-pink"),"Add"==$(this).children("span").text()?$(this).children("span").text("Remove"):$(this).children("span").text("Add"),$(this).parent().siblings(".comment").slideToggle()}),$("#share-dropdown").on("click",function(e){e.stopPropagation(),$(this).siblings(".dropdown-menu").toggleClass("show").css("top","60px")}),$(".file").find(".dropdown-button .share").on("click",function(){$("#shareModal").modal("toggle")}),$(".file").find(".dropdown-button .details").on("click",function(){$("#fileDetails").modal("toggle")}),$(".file").find(".dropdown-button .detete").on("click",function(){$(this).parents(".file").parent('[class^="col-"]').remove()}),$("#word_count").on("keydown",function(e){var t=$.trim(this.value).length?this.value.match(/\S+/g).length:0;t<=200?($("#display_count").text(t),$("#word_left").text(200-t)):8!==e.which&&e.preventDefault()}),$('.custom-radio input[type="radio"]').length&&($(".custom-radio").parents(".radio-wrap").siblings(".valid-feedback, .invalid-feedback").show(),$('.custom-radio input[type="radio"]').on("click",function(e){e.stopPropagation(),1==$(this).prop("checked")?($(this).parents(".radio-wrap").siblings(".valid-feedback").show(),$(this).parents(".radio-wrap").siblings(".invalid-feedback").hide()):0==$(this).prop("checked")&&($(this).parents(".radio-wrap").siblings(".valid-feedback").hide(),$(this).parents(".radio-wrap").siblings(".invalid-feedback").show())})),$(".file-input").on("change",function(){var e=$(this).val().split("\\").pop();$(this).parents(".attach-file").siblings(".file_upload, .file_upload2, .file_upload3").text(e)}),$(".table-contextual").find("tr").css("background-color",function(){return $(this).data("bg-color")}),$("#modalSessionTimeout").length&&(window.onload=function(){setTimeout(function(){const e=283,t={info:{color:"c2"},warning:{color:"warn",threshold:10},alert:{color:"danger",threshold:5}},o=20;let s=0,i=o,n=null,r=t.info.color;document.getElementById("circular").innerHTML=`\n                <div class="base-timer">\n                    <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">\n                        <g class="base-timer__circle">\n                        <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>\n                        <path\n                            id="base-timer-path-remaining"\n                            stroke-dasharray="283"\n                            class="base-timer__path-remaining ${r}"\n                            d="\n                            M 50, 50\n                            m -45, 0\n                            a 45,45 0 1,0 90,0\n                            a 45,45 0 1,0 -90,0\n                            "\n                        ></path>\n                        </g>\n                    </svg>\n                    <span id="base-timer-label" class="base-timer__label">${i}</span>\n                    <span class="base-timer__text">Seconds</span>\n                </div>\n                `,n=setInterval(()=>{s=s+=1,i=o-s,document.getElementById("base-timer-label").innerHTML=i,document.querySelector(".redirecting_in").innerHTML=i,function(){const t=`${(function(){const e=i/o;return e-1/o*(1-e)}()*e).toFixed(0)} 283`;document.getElementById("base-timer-path-remaining").setAttribute("stroke-dasharray",t)}(),function(e){const{alert:o,warning:s,info:i}=t;e<=o.threshold?(document.getElementById("base-timer-path-remaining").classList.remove(s.color),document.getElementById("base-timer-path-remaining").classList.add(o.color)):e<=s.threshold&&(document.getElementById("base-timer-path-remaining").classList.remove(i.color),document.getElementById("base-timer-path-remaining").classList.add(s.color))}(i),0===i&&clearInterval(n)},1e3),$("#modalSessionTimeout").modal("show")},2e3)}),$("#sortable-row").length){$(document).find("#sortable-row").sortable({connectWith:"#sortable-row"}).disableSelection()}if($("#dragable-product-list").length){$(document).find("#dragable-product-list").sortable({connectWith:"#dragable-product-list"}).disableSelection()}if($(".dragable-team").length){$(document).find(".dragable-team").sortable({connectWith:".dragable-team"}).disableSelection()}if($(".dragable-list").length&&$(".dragable-btn").each(function(){var e,t,o;$(this).sortable({connectWith:$(".dragable-btn").not(this),helper:"clone",start:function(s,i){$(i.item).show(),e=$(i.item).clone(),t=$(i.item).prev(),o=$(i.item).parent()},stop:function(s,i){t.length?t.after(e):o.prepend(e)}}).disableSelection()}),$(".dragable-list").length){$(document).find(".dragable-list").sortable({connectWith:".dragable-list",handle:"svg"}).disableSelection()}$(".add-work-form").hide(),$(".add-workplace").on("click",function(){$(".add-work-form").show(),$(this).hide()}),$(".add-work-form .work-form-close").on("click",function(){$(".add-work-form").hide(),$(".add-workplace").show()}),$(".work-update-form").hide(),$(".p_work-list, .p_education-list").find(".edit").on("click",function(e){var t,o,s,i,n,r,a,c;e.preventDefault(),t=$(this),o=t.parents(".work-content").find(".company-name").text(),s=t.parents(".work-content").find(".position").text(),i=t.parents(".work-content").find(".city").text(),n=t.parents(".work-content").find(".day").text(),r=t.parents(".work-content").find(".month").text(),a=t.parents(".work-content").find(".year").text(),c=t.parents(".work-content").find(".desc").text(),o&&t.parents(".work-content").siblings(".work-update-form").find('[name="company"]').val(o),s&&t.parents(".work-content").siblings(".work-update-form").find('[name="position"]').val(s),i&&t.parents(".work-content").siblings(".work-update-form").find('[name="city"]').val(i),n&&t.parents(".work-content").siblings(".work-update-form").find('[name="day"]').val(n),r&&t.parents(".work-content").siblings(".work-update-form").find('[name="month"]').val(r),a&&t.parents(".work-content").siblings(".work-update-form").find('[name="year"]').val(a),c&&t.parents(".work-content").siblings(".work-update-form").find('[name="description"]').val(c),$(this).parents(".work-content").hide().siblings(".work-update-form").show()}),$(".p_work-list").find(".delete").on("click",function(e){$("#deleteConfirmModal").modal("toggle")}),$(".p_education-list").find(".delete").on("click",function(e){$("#deleteConfirmEducationModal").modal("toggle")}),$(".work-update-form").find(".work-form-close").on("click",function(){$(this).parents(".work-update-form").hide().siblings(".work-content").show()}),$(".edit-skill").find(".form-control").on("keyup",function(){""===$(this).val().replace("%","")?$(this).siblings(".process-bar-wrapper").find(".process-bar").width("0%"):$(this).siblings(".process-bar-wrapper").find(".process-bar").width($(this).val())})}(jQuery));