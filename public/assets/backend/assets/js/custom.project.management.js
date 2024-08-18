var boardComposer=$(".board-composer"),d=document;function addBoardCard(e){e.preventDefault();var t=$(this).parents("form").children("textarea").val(),a=$(this).parents(".actions").siblings(".date").children(".date-text").text();if(""!=t){var o=d.createElement("div");o.className="board-card";var l=d.createElement("p");l.className="black mb-2",l.textContent=t,o.append(l);var i=d.createElement("div");i.className="d-flex justify-content-between align-items-center";var c=d.createElement("div");c.className="left d-flex align-items-center",c.innerHTML='<img src="../../../assets/img/svg/watch.svg" alt="" class="svg mr-1">';var s=d.createElement("a");s.setAttribute("href","#"),s.className="text_color font-12",s.textContent=a,c.append(s),i.append(c),o.append(i),$(this).parents(".board-composer").siblings(".board-cards").append(o)}$(this).parents("form").children("textarea").val(null)}boardComposer.length&&(boardComposer.find(".add-card").hide(),boardComposer.find(".add-another-card").on("click",function(e){e.preventDefault(),e.stopPropagation(),boardComposer.find(".add-card").hide(),boardComposer.find(".add-another-card").show(),$(this).hide(),$(this).siblings(".add-card").slideDown()}),boardComposer.find(".add-card .cancel").on("click",function(e){e.preventDefault(),$(this).parents(".add-card").hide(),$(this).parents(".add-card").siblings(".add-another-card").show()}),boardComposer.find(".add-card .save").on("click",addBoardCard),$(".add-card").on("click",function(e){e.stopPropagation()}),$("body").on("click",function(e){boardComposer.find(".add-card").hide(),boardComposer.find(".add-another-card").show()}));var addAnotherList=$(".add-card.add-another-list");function setAttributes(e,t){for(var a in t)e.setAttribute(a,t[a])}function addList(e){if(13===e.keyCode&&(e.preventDefault(),$(this).val())){var t=d.createElement("div");setAttributes(t,{class:"board"});var a=d.createElement("div");setAttributes(a,{class:"board-header d-flex justify-content-between align-items-center mb-10"});var o=d.createElement("h4");setAttributes(o,{class:"c2"}),o.textContent=$(this).val(),a.append(o);var l=d.createElement("div");setAttributes(l,{class:"dropdown-button"});var i=d.createElement("a");setAttributes(i,{src:"#","data-toggle":"dropdown",class:"d-flex align-items-center",style:"cursor: pointer"});var c=d.createElement("div");setAttributes(c,{class:"menu-icon justify-content-center style--two mr-0"});for(var s=0;s<3;s++){var n=d.createElement("span");c.append(n)}i.append(c),l.append(i);var r=d.createElement("div");setAttributes(r,{class:"dropdown-menu dropdown-menu-right"});var p=["Daily","Sort By","monthly"];for(s=0;s<p.length;s++){var h=d.createElement("a");h.textContent=p[s],setAttributes(h,{src:"#"}),r.append(h)}l.append(r),a.append(l);var m=d.createElement("div");m.className="board-cards";var b=d.createElement("div");setAttributes(b,{class:"board-composer flex-column d-flex align-items-center justify-content-center"});var w=d.createElement("a");setAttributes(w,{href:"#",class:"add-another-card"}),w.innerHTML='<img src="../../../assets/img/svg/plus.svg" alt="" class="svg mr-1">';var f=d.createElement("span");f.textContent="Add another card",setAttributes(f,{class:"font-14 bold c4"}),w.append(f),b.append(w);var v=d.createElement("div");setAttributes(v,{class:"add-card w-100"});var k=d.createElement("form");setAttributes(k,{action:"#"});var u=d.createElement("textarea");setAttributes(u,{placeholder:"List Title",class:"theme-input-style style--five",value:"title"}),k.append(u);var g=d.createElement("div");setAttributes(g,{class:"d-flex align-items-center justify-content-between mt-2"});var M=d.createElement("div");setAttributes(M,{class:"date d-flex align-items-center"}),M.innerHTML='<img src="../../../assets/img/svg/watch.svg" alt="" class="svg mr-1">';var j=d.createElement("span"),C=(new Date).toLocaleDateString("en-US",{day:"numeric"}),E=(new Date).toLocaleDateString("en-US",{month:"long"});j.textContent=C+" "+E,setAttributes(j,{class:"date-text"}),M.append(j),g.append(M);var x=d.createElement("div");setAttributes(x,{class:"actions"});var y=d.createElement("a");y.textContent="Cancel",setAttributes(y,{href:"#",class:"cancel font-14 bold mr-3"}),x.append(y);var L=d.createElement("a");L.textContent="Save",setAttributes(L,{href:"#",class:"btn save"}),L.addEventListener("click",addBoardCard),L.addEventListener("click",dragDrop),x.append(L),g.append(x),k.append(g),v.append(k),b.append(v),t.append(a,m,b),$(".board-wrapper .board:last").before(t),$(this).val(null),$(b).find(".add-card").hide(),$(document).find(".add-another-card").on("click",function(e){e.preventDefault(),e.stopPropagation(),$(document).find(".add-card").hide(),$(document).find(".add-another-card").show(),$(this).hide(),$(this).siblings(".add-card").slideDown()}),b.querySelector(".add-card .cancel").addEventListener("click",function(e){e.preventDefault(),$(this).parents(".add-card").hide(),$(this).parents(".add-card").siblings(".add-another-card").show()}),$(".add-card").on("click",function(e){e.stopPropagation()}),$("body").on("click",function(e){$(this).find(".add-card").hide(),$(this).find(".add-another-card").show()})}}function dragDrop(){$(document).find(".board-cards").sortable({connectWith:".board-cards"}).disableSelection()}[Element.prototype,Document.prototype,DocumentFragment.prototype].forEach(function(e){e.hasOwnProperty("append")||Object.defineProperty(e,"append",{configurable:!0,enumerable:!0,writable:!0,value:function(){var e=Array.prototype.slice.call(arguments),t=document.createDocumentFragment();e.forEach(function(e){var a=e instanceof Node;t.appendChild(a?e:document.createTextNode(String(e)))}),this.appendChild(t)}})}),addAnotherList.find("form input").on("keypress",addList),dragDrop();var startX,scrollLeft,slider=document.querySelector(".board-wrapper"),isDown=!1;slider.addEventListener("mousedown",function(e){e.target===this&&(isDown=!0,slider.classList.add("active"),startX=e.pageX-slider.offsetLeft,scrollLeft=slider.scrollLeft)}),slider.addEventListener("mouseleave",function(){isDown=!1,slider.classList.remove("active")}),slider.addEventListener("mouseup",function(){isDown=!1,slider.classList.remove("active")}),slider.addEventListener("mousemove",function(e){if(isDown){var t=1*(e.pageX-slider.offsetLeft-startX);slider.scrollLeft=scrollLeft-t}}),$(".board-members-list").find(".member-item").on("click",function(e){e.preventDefault(),$(this).toggleClass("active")}),$(".board-members-list").find(".member-item").on("mouseenter",function(e){$(".board-members-list").find(".member-item").removeClass("selected"),$(this).addClass("selected")}),$(".board-card").on("click",function(){$("#projectTaskDetails").modal("show")});var titleTextarea=$("#projectTaskDetails").find(".project-main-title textarea");$("#projectTaskDetails").find(".project-main-title h4").on("click",function(e){e.stopPropagation(),$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide();var t=$(this).siblings("textarea"),a=$(this).height()+10+"px";t.val($(this).text()).addClass("isEditing").css("height",a)}),titleTextarea.on("keypress",function(e){13==e.keyCode&&(e.preventDefault(),$(this).removeClass("isEditing").siblings("h4").text($(this).val()))}),$(document).on("click","body",function(e){titleTextarea.hasClass("isEditing")&&(titleTextarea.siblings("h4").text(titleTextarea.val()),titleTextarea.removeClass("isEditing"))}),titleTextarea.on("click",function(e){e.stopPropagation()});var projectDes=$("#projectTaskDetails").find(".project-description");projectDes.find(".des-edit-actions").hide(),projectDes.find(".description").on("click",function(e){$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing");var t=$(this);$(this).addClass("edit").siblings(".des-edit-actions").show().children("textarea").text(t.text()).css("height",t.height()+8+"px")}),projectDes.find(".des-edit-controls .des-save").on("click",function(e){var t=$(this).parents(".des-edit-controls").siblings("textarea").val();$(this).parents(".des-edit-actions").siblings(".description").text(t)}),projectDes.find(".des-edit-controls .icon-close, .des-edit-controls .des-save").on("click",function(e){$(this).parents(".des-edit-actions").siblings(".description").removeClass("edit"),$(this).parents(".des-edit-actions").hide()});var commentContent=$("#projectTaskDetails").find(".comment-content");function addNewLabel(){var e=$("#projectLabelModal").find(".board-labels-list"),t=d.querySelector("#createLabelName"),a=d.createElement("li");a.className="label-item d-flex align-items-center mb-1";var o=$(".board-labels-select-color, .edit-labels-no-color").find(".label-item.active > .label").attr("id"),l=$(".board-labels-select-color, .edit-labels-no-color").find(".label-item.active > .label").attr("class"),i=d.createElement("span");i.className="mr-1 "+l,i.setAttribute("id",o),i.textContent=t.value;var c=d.createElement("span");c.className="icon-check checked-icon",i.append(c);var s=d.createElement("a");s.className="edit-label d-flex align-items-center p-2",s.setAttribute("href","#"),s.innerHTML='<i class="icofont-ui-edit"></i>',a.append(i,s),e.append(a),t.value=""}commentContent.find(".edit-actions").hide(),commentContent.find(".comment-action-delete").on("click",function(e){$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing"),$(this).parents(".comment").remove()}),commentContent.find(".comment-action-edit").on("click",function(e){$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing");var t=$(this).parents(".comment-action-links").siblings(".comment-edit").children(".comment-text");$(this).parents(".comment-action-links").siblings(".comment-edit").addClass("mb-5").children(".edit-actions").show().children("textarea").text(t.text()).css("height",t.height()+5+"px")}),commentContent.find(".comment-edit .comment-save").on("click",function(e){var t=$(this).parents(".edit-actions").children("textarea").val();$(this).parents(".edit-actions").siblings(".comment-text").text(t)}),commentContent.find(".comment-edit .icon-close, .comment-edit .comment-save").on("click",function(e){$(this).parents(".comment-edit").removeClass("mb-5").children(".edit-actions").hide()}),$(".board-members-list").find(".member-item").on("click",function(e){$(this).toggleClass("active")}),$(".board-members-list").find(".member-item").on("mouseenter",function(e){$(".board-members-list").find(".member-item").removeClass("selected"),$(this).addClass("selected")}),$(".board-labels-list").find(".label-item .label").on("click",function(e){e.preventDefault(),$(this).parent(".label-item").toggleClass("active")}),$(".board-labels-list, .board-labels-select-color").find(".label-item .label").on("mouseenter",function(e){$(".board-labels-list").find(".label-item").removeClass("selected"),$(this).parent(".label-item").addClass("selected")}),$(".board-labels-select-color, .edit-labels-no-color").find(".label-item .label").on("click",function(e){$(".board-labels-select-color, .edit-labels-no-color").find(".label-item").removeClass("active"),$(this).parent(".label-item").addClass("active")}),$(".change-card-btns .change-card-due-date, #default-date2").on("click",function(e){e.preventDefault(),$(".change-card-btns .change-card-due-date").datepicker()}),$("#projectLabelModal").find(".create-new-label").on("click",function(e){e.preventDefault(),$("#projectLabelModal").find(".modal-content.main-labels").hide(),$("#projectLabelModal").find(".modal-content.add-labels").show()}),$("#projectLabelModal").find(".modal-header .back-btn").on("click",function(e){e.preventDefault(),$("#projectLabelModal").find(".modal-content.main-labels").show(),$("#projectLabelModal").find(".modal-content.add-labels").hide()}),$("#projectLabelModal").find(".create-label-btn").on("click",function(e){e.preventDefault(),$("#projectLabelModal").find(".modal-content.main-labels").show(),$("#projectLabelModal").find(".modal-content.add-labels").hide(),addNewLabel()}),$("#projectLabelModal").find(".label-item .edit-label").on("click",function(e){e.preventDefault(),$("#projectLabelModal").find(".modal-content.main-labels").hide(),$("#projectLabelModal").find(".modal-content.add-labels").show(),$(".board-labels-select-color").find(".label-item .label").each((e,t)=>{$(this).siblings(".label").attr("id")==t.id&&($(".board-labels-select-color, .edit-labels-no-color").find(".label-item").removeClass("active"),t.parentNode.classList.add("active"))})});var isIE=!!document.documentMode;function addChecklistEle(e,t){var a=d.createElement("div");a.className="checklist-item-wrap",e.parents(".checklist-new-item").siblings(".checklist-items").append(a);var o=d.createElement("div");o.className="checklist-item-details position-relative d-flex justify-content-between",a.append(o);var l=d.createElement("label");l.className="custom-checkbox style--three";var i=d.createElement("input");i.setAttribute("type","checkbox");var c=d.createElement("span");c.className="checkmark",l.append(i,c);var s=d.createElement("span");s.className="checklist-item",s.textContent=t.val();var n=d.createElement("span");n.className="icon-delete font-12",n.innerHTML='<i class="icofont-trash"></i>',n.addEventListener("click",function(){$(this).parents(".checklist-item-wrap").remove()}),o.append(l,s,n),t.val(null)}function addChecklistItem(e){e.preventDefault();var t=$(this).parents(".checklist-add-controls").siblings("textarea");""!=t.val()&&addChecklistEle($(this),t)}function addChecklist(e){e.preventDefault(),$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, .checklist-add-control-wrap").hide();var t=d.querySelector("#projectTaskDetailsMain .checklists");let a=$(this).siblings("form").children("input");if(""!=a.val()){var o=d.createElement("div");o.className="checklist pb-4",t.append(o);var l=d.createElement("div");l.className="process-bar-wrapper";var i=d.createElement("span");i.className="process-name",i.textContent=a.val();var c=d.createElement("span");c.className="process-width",c.textContent="0%";var s=d.createElement("div");s.className="action-btns";var n=d.createElement("span");n.className="hide-completed-item light-btn d-none",n.textContent="Hide Completed Items";var r=d.createElement("span");r.className="delete-btn light-btn",r.textContent="Delete",r.addEventListener("click",function(){$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, .checklist-add-control-wrap").hide(),$(this).parents(".checklist").remove()}),s.append(n,r);var p=d.createElement("span");p.className="process-bar",p.setAttribute("data-process-width","33"),l.append(i,c,s,p);var h=d.createElement("div");h.className="checklist-items";var m=d.createElement("div");m.className="checklist-new-item ml-35",m.addEventListener("click",function(e){e.stopPropagation()});var b=d.createElement("a");b.className="light-btn add-item-btn",b.textContent="Add An Item",b.setAttribute("href","#"),b.addEventListener("click",function(e){$(this).hide().siblings(".checklist-add-control-wrap").show()});var w=d.createElement("div");w.className="checklist-add-control-wrap";var f=d.createElement("textarea");f.className="theme-input-style",f.setAttribute("placeholder","Add an Item"),f.addEventListener("keypress",function(e){if(13===e.keyCode){e.preventDefault();var t=$(this);""!=t.val()&&addChecklistEle(t,t)}});var v=d.createElement("div");v.className="checklist-add-controls d-flex align-items-center";var k=d.createElement("a");k.className="light-btn add-checklist-item c2-bg",k.setAttribute("href","#"),k.textContent="Add",k.addEventListener("click",addChecklistItem);var u=d.createElement("a");u.className="icon-close ml-2",u.innerHTML='<i class="icofont-close-line"></i>',u.addEventListener("click",function(e){e.preventDefault(),$(this).parents(".checklist-add-control-wrap").hide(),$(this).parents(".checklist-add-control-wrap").siblings(".add-item-btn").show()}),v.append(k,u),w.append(f,v),m.append(b,w),o.append(l,h,m)}a.val("Checklist")}$(".member .btn-circle, .change-card-btns .change-card-member").on("click",function(e){e.stopPropagation(),$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing"),$(".checklist-add-control-wrap").siblings(".add-item-btn").show();var t=this.getBoundingClientRect(),a=$("#projectMemberModal");$(window).width()<1024&&$(window).width()>767?a.css({left:t.left+window.scrollX-144,top:t.top+t.height+window.scrollY,display:"block"}):$(window).width()<767?a.css({left:"50%",transform:"translateX(-50%)",top:t.top+t.height+window.scrollY,display:"block"}):a.css({left:t.left+window.scrollX,top:t.top+t.height+window.scrollY,display:"block"}),isIE&&a.css({left:e.pageX-e.target.clientWidth+(window.scrollX?window.scrollX:0),top:e.pageY+e.target.clientHeight+(window.scrollY?window.scrollY:0)})}),$(".member .btn-circle.task-header").on("click",function(e){e.stopPropagation();var t=this.getBoundingClientRect(),a=$("#projectMemberModal");$(window).width()<1024&&$(window).width()>767?a.css({left:t.left+window.scrollX-144,top:t.top+t.height+window.scrollY,display:"block"}):$(window).width()<767?a.css({left:"50%",transform:"translateX(-50%)",top:t.top+t.height+window.scrollY,display:"block"}):a.css({left:t.left+window.scrollX-(a.width()-38),top:t.top+t.height+window.scrollY,display:"block"})}),$(document).on("click","#projectTaskDetails .add-label, #projectTaskDetails .change-card-label",function(e){e.stopPropagation();let t=this.getBoundingClientRect();$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing"),$(".checklist-add-control-wrap").siblings(".add-item-btn").show();var a=$("#projectLabelModal");$(window).width()<1024&&$(window).width()>767?a.css({left:t.left+window.scrollX-144,top:t.top+t.height+window.scrollY,display:"block"}):$(window).width()<767?a.css({left:"50%",transform:"translateX(-50%)",top:t.top+t.height+window.scrollY,display:"block"}):a.css({left:t.left+window.scrollX,top:t.top+t.height+window.scrollY,display:"block"}),isIE&&a.css({left:e.pageX-e.target.clientWidth+(window.scrollX?window.scrollX:0),top:e.pageY+e.target.clientHeight+(window.scrollY?window.scrollY:0)})}),$(document).on("click","#projectTaskDetails .change-card-checklist",function(e){e.stopPropagation();let t=this.getBoundingClientRect();$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing"),$(".checklist-add-control-wrap").siblings(".add-item-btn").show();var a=$("#projectChecklistModal");$(window).width()<1024&&$(window).width()>767?a.css({left:t.left+window.scrollX-144,top:t.top+t.height+window.scrollY,display:"block"}):$(window).width()<767?a.css({left:"50%",transform:"translateX(-50%)",top:t.top+t.height+window.scrollY,display:"block"}):a.css({left:t.left+window.scrollX,top:t.top+t.height+window.scrollY,display:"block"}),isIE&&a.css({left:e.pageX-e.target.clientWidth+(window.scrollX?window.scrollX:0),top:e.pageY+e.target.clientHeight+(window.scrollY?window.scrollY:0)})}),$(document).on("click","#projectTaskDetails .change-card-move",function(e){e.stopPropagation();let t=this.getBoundingClientRect();$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing");var a=$("#projectMoveModal");$(window).width()<1024&&$(window).width()>767?a.css({left:t.left+window.scrollX-144,top:t.top+t.height+window.scrollY,display:"block"}):$(window).width()<767?a.css({left:"50%",transform:"translateX(-50%)",top:t.top+t.height+window.scrollY-(a.height()-200),display:"block"}):a.css({left:t.left+window.scrollX,top:t.top+t.height+window.scrollY,display:"block"}),isIE&&a.css({left:e.pageX-e.target.clientWidth+(window.scrollX?window.scrollX:0),top:e.pageY+e.target.clientHeight+(window.scrollY?window.scrollY:0)})}),$(document).on("click","#projectTaskDetails .change-card-copy",function(e){e.stopPropagation(),$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing");var t=this.getBoundingClientRect(),a=$("#projectCopyModal");$(window).width()<1024&&$(window).width()>767?a.css({left:t.left+window.scrollX-144,top:t.top+t.height+window.scrollY,display:"block"}):$(window).width()<767?a.css({left:"50%",transform:"translateX(-50%)",top:t.top+t.height+window.scrollY-(a.height()-160),display:"block"}):a.css({left:t.left+window.scrollX,top:t.top+t.height+window.scrollY,display:"block"}),isIE&&a.css({left:e.pageX-e.target.clientWidth+(window.scrollX?window.scrollX:0),top:e.pageY+e.target.clientHeight+(window.scrollY?window.scrollY:0)})}),$(document).on("click","#projectTaskDetails .change-card-share",function(e){e.stopPropagation();let t=this.getBoundingClientRect();$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),titleTextarea.removeClass("isEditing"),$(".dropdown-menu.checkbox2").removeClass("show");var a=$("#projectShareModal");$(window).width()<1024&&$(window).width()>767?a.css({left:t.left+window.scrollX-144,top:t.top+t.height+window.scrollY,display:"block"}):$(window).width()<767?a.css({left:"50%",transform:"translateX(-50%)",top:t.top+t.height+window.scrollY-a.height(),display:"block"}):a.css({left:t.left+window.scrollX,top:t.top+t.height+window.scrollY,display:"block"}),isIE&&a.css({left:e.pageX-e.target.clientWidth+(window.scrollX?window.scrollX:0),top:e.pageY+e.target.clientHeight+(window.scrollY?window.scrollY:0)})}),$(document).on("click","body",function(e){$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, .checklist-add-control-wrap").hide(),$(".dropdown-menu.checkbox2").removeClass("show"),$(".checklist-add-control-wrap").siblings(".add-item-btn").show()}),$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, #projectShareModal, #projectTaskDetails .checklist-new-item").on("click",function(e){$(".dropdown-menu.checkbox2").removeClass("show"),e.stopPropagation()}),$("#projectMemberModal .modal-close, #projectMoveModal .modal-close, #projectCopyModal .modal-close, #projectLabelModal .modal-close, #projectShareModal .modal-close, #projectChecklistModal .modal-close, #projectTaskDetails .add-item-btn").on("click",function(){$("#projectMemberModal, #projectLabelModal, #projectShareModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, .checklist-add-control-wrap").hide(),$(".dropdown-menu.checkbox2").removeClass("show")}),$("#projectTaskDetails").find(".attachment-close").on("click",function(){$(this).parents(".attachment").remove()}),$("#projectChecklistModal").find(".add-checklist-btn").on("click",addChecklist),$("#projectTaskDetails").find(".add-checklist-item").on("click",addChecklistItem),$("#projectTaskDetails").find(".icon-delete").on("click",function(){$(this).parents(".checklist-item-wrap").remove()}),$("#projectTaskDetails").find(".action-btns .delete-btn").on("click",function(){$("#projectMemberModal, #projectLabelModal, #projectChecklistModal, #projectMoveModal, #projectCopyModal, .checklist-add-control-wrap").hide(),$(this).parents(".checklist").remove()}),$("#projectTaskDetails").find(".checklist-new-item textarea").on("keypress",function(e){if(13===e.keyCode){e.preventDefault();var t=$(this);""!=t.val()&&addChecklistEle(t,t)}}),$("#projectTaskDetails").find(".checklist-new-item").on("click",".icon-close",function(e){e.preventDefault(),$(this).parents(".checklist-add-control-wrap").hide(),$(this).parents(".checklist-add-control-wrap").siblings(".add-item-btn").show()}),$("#projectTaskDetails").find(".checklist-new-item").on("click",".add-item-btn",function(e){e.preventDefault(),$(this).hide(),$(this).siblings(".checklist-add-control-wrap").show()});