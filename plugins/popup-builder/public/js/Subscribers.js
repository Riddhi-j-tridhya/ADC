function SGPBSubscribers(){}SGPBSubscribers.prototype.init=function(){this.deleteSubscribers(),this.toggleCheckedSubscribers(),this.popupsTableRowColorChange(),this.deleteButtonHideShow(),this.exportSubscribers(),this.modal=new SGPBModals,this.modal.modalInit(),this.subscriberFileUploader(),this.importSubscriber(),this.addSubscribers()},SGPBSubscribers.prototype.deleteSubscribers=function(){var e=[],s=this;jQuery(".sg-subs-delete-button").bind("click",function(){var t={};(t.ajaxNonce=jQuery(this).attr("data-ajaxNonce"),jQuery(".subs-delete-checkbox").each(function(){if(jQuery(this).prop("checked")){var s=jQuery(this).attr("data-delete-id");e.push(s)}}),0===e.length)?alert("Please select at least one subscriber."):confirm(SGPB_JS_LOCALIZATION.areYouSure)&&s.deleteSubscribersAjax(e,t)})},SGPBSubscribers.prototype.subscriberFileUploader=function(){var e,s=jQuery("#js-import-subscriber-button"),t=["text/plain","text/x-csv","text/csv"];if(!s.length)return!1;s.bind("click",function(s){if(s.preventDefault(),e)return e.open(),!1;(e=wp.media.frames.file_frame=wp.media({titleFF:SGPB_JS_LOCALIZATION.changeSound,button:{text:SGPB_JS_LOCALIZATION.changeSound},library:{type:t},multiple:!1})).on("select",function(){var s=e.state().get("selection").first().toJSON();if(-1===t.indexOf(s.mime)){alert(SGPB_JS_LOCALIZATION.audioSupportAlertMessage);return}jQuery("#js-import-subscriber-file-url").val(s.url)}),e.open()})},SGPBSubscribers.prototype.importSubscriber=function(){var e=jQuery(".sgpb-import-subscriber-to-list"),s=this;if(!e.length)return!1;e.bind("click",function(){jQuery("#pb_validate_csv_import").remove();var t=jQuery(".js-sg-import-list").val(),r=jQuery("#js-import-subscriber-file-url").val();if(r.length){var i={action:"sgpb_import_subscribers",nonce:SGPB_JS_PARAMS.nonce,popupSubscriptionList:t,importListURL:r,beforeSend:function(){e.prop("disabled",!0)}};jQuery.post(ajaxurl,i,function(t){e.prop("disabled",!1),-1!=t.indexOf("ERROR-")?e.parent().parent().before('<div class="alert alert-danger" id="pb_validate_csv_import"style="padding-bottom:10px;color: red;"><strong>'+t+"</strong></div>"):(s.modal.changeModalContent(jQuery(".sgpb-modal"),jQuery(t),jQuery(".sgpb-modal").data("target")),s.removeAllValuesOnModalDestroy(),s.saveImportValue(),s.disableSelectedValue())})}})},SGPBSubscribers.prototype.removeAllValuesOnModalDestroy=function(){jQuery(".sgpb-add-subscriber-input:selected").prop("selected",!1),jQuery(".sgpb-add-subscriber-input").val(""),jQuery("#js-import-subscriber-file-url").val("")},SGPBSubscribers.prototype.disableSelectedValue=function(){var e=jQuery(".sgpb-our-fields-keys");if(!e.length)return!1;e.bind("change",function(){var e=jQuery(this).val();jQuery('.sgpb-our-fields-keys option[value="'+jQuery(this).attr("data-saved-value")+'"]').removeAttr("disabled"),jQuery(this).attr("data-saved-value",e),jQuery('.sgpb-our-fields-keys option[value="'+e+'"]').not(jQuery(this)).attr("disabled","disabled")})},SGPBSubscribers.prototype.saveImportValue=function(){jQuery(".sgpb-import-subscriber-to-list");var e={},s={action:"sgpb_save_imported_subscribers",nonce:SGPB_JS_PARAMS.nonce,popupSubscriptionList:jQuery(".sgpb-to-import-popup-id").val(),importListURL:jQuery(".sgpb-imported-file-url").val()};jQuery(".sgpb-save-subscriber").bind("click",function(){e={},jQuery(".sgpb-our-fields-keys").each(function(){var s=jQuery("option:selected",this).val();s&&(e[s]=jQuery(this).attr("data-index"))}),s.namesMapping=e,s.popupId=jQuery(".sgpb-to-import-popup-id").val(),s.beforeSend=function(){jQuery(".sgpb-save-subscriber").prop("disabled",!0)},jQuery.post(ajaxurl,s,function(e){window.location.reload(),jQuery(".sgpb-save-subscriber").prop("disabled",!1)})})},SGPBSubscribers.prototype.addSubscribers=function(){var e=this;jQuery(".sgpb-add-to-list-js").bind("click",function(){jQuery(".sgpb-subscription-error").addClass("sg-hide-element"),jQuery(".sgpb-email-error").addClass("sg-hide-element");var s=jQuery(".sgpb-add-subscribers-email").val(),t=jQuery(".sgpb-add-subscribers-first-name").val(),r=jQuery(".sgpb-add-subscribers-last-name").val(),i=[];jQuery(".js-sg-newsletter-forms > option").each(function(){jQuery(this).prop("selected")&&i.push(jQuery(this).val())});var o=s.search(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);if(!1===jQuery(".js-sg-newsletter-forms > option").is(":checked")&&-1===o){jQuery(".sgpb-subscription-error").removeClass("sg-hide-element"),jQuery(".sgpb-email-error").removeClass("sg-hide-element");return}if(!1===jQuery(".js-sg-newsletter-forms > option").is(":checked")){jQuery(".sgpb-subscription-error").removeClass("sg-hide-element");return}if(-1===o){jQuery(".sgpb-email-error").removeClass("sg-hide-element");return}jQuery(".sgpb-email-error").addClass("sg-hide-element");var a={action:"sgpb_add_subscribers",nonce:SGPB_JS_PARAMS.nonce,firstName:t,lastName:r,email:s,popups:i,beforeSend:function(){jQuery(".js-sgpb-add-spinner").removeClass("sg-hide-element")}};e.addToSubscribersAjax(a)})},SGPBSubscribers.prototype.exportSubscribers=function(){var e=this;jQuery("#sgpb-subscription-popup").on("change",function(){jQuery(".sgpb-subscription-popup-id").val(jQuery(this).val())}),jQuery("#sgpb-subscribers-dates").on("change",function(){jQuery(".sgpb-subscribers-date").val(jQuery(this).val())}),jQuery(".sgpb-export-subscriber").bind("click",function(){var s="",t={};for(var r in t["sgpb-subscription-popup-id"]=e.getUrlParameter("sgpb-subscription-popup-id"),t.s=e.getUrlParameter("s"),t["sgpb-subscribers-date"]=e.getUrlParameter("sgpb-subscribers-date"),t.orderby=e.getUrlParameter("orderby"),t.order=e.getUrlParameter("order"),t)void 0!==t[r]&&""!==t[r]&&(s+="&"+r+"="+t[r]);window.location.href=SGPB_JS_ADMIN_URL.url+"?action=csv_file"+s})},SGPBSubscribers.prototype.getUrlParameter=function(e){for(var s=window.location.search.substring(1).split("&"),t=0;t<s.length;t++){var r=s[t].split("=");if(r[0]==e){if(void 0!==r[1])return r[1];return""}}},SGPBSubscribers.prototype.addToSubscribersAjax=function(e){jQuery.post(ajaxurl,e,function(e){"1"!==e?(jQuery(".sgpb-subscriber-adding-error").removeClass("sg-hide-element"),jQuery(".sgpb-subscribers-add-spinner").addClass("sg-hide-element")):location.reload()})},SGPBSubscribers.prototype.toggleCheckedSubscribers=function(){var e=this;jQuery(".subs-bulk").each(function(){jQuery(this).bind("click",function(){var s=jQuery(this).prop("checked");e.changeCheckedSubscribers(s)})})},SGPBSubscribers.prototype.changeCheckedSubscribers=function(e){jQuery(".subs-delete-checkbox").each(function(){jQuery(this).prop("checked",e),jQuery(".subs-bulk").prop("checked",e),jQuery(".sg-subs-delete-button").removeClass("sgpb-btn-disabled"),e||jQuery(".sg-subs-delete-button").addClass("sgpb-btn-disabled")})},SGPBSubscribers.prototype.dataImport=function(){var e;jQuery("#js-upload-export-file").click(function(s){s.preventDefault();var t=jQuery(this).attr("data-ajaxNonce");if(e){e.open();return}(e=wp.media.frames.file_frame=wp.media({titleFF:"Select Export File",button:{text:"Select Export File"},multiple:!1,library:{type:"text/plain"}})).on("select",function(){var s={action:"import_popups",ajaxNonce:t,attachmentUrl:(attachment=e.state().get("selection").first().toJSON()).url};jQuery(".js-sg-import-gif").removeClass("sg-hide-element"),jQuery.post(ajaxurl,s,function(e,s){location.reload(),jQuery(".js-sg-import-gif").addClass("sg-hide-element")})}),e.open()})},SGPBSubscribers.prototype.deleteSubscribersAjax=function(e){var s={action:"sgpb_subscribers_delete",nonce:SGPB_JS_PARAMS.nonce,subscribersId:e,beforeSend:function(){jQuery(".sgpb-subscribers-remove-spinner").removeClass("sg-hide-element")}};jQuery.post(ajaxurl,s,function(e){jQuery(".sgpb-subscribers-remove-spinner").addClass("sg-hide-element"),jQuery(".subs-delete-checkbox").prop("checked",""),window.location.reload()})},SGPBSubscribers.prototype.deleteButtonHideShow=function(){if(!jQuery(".subs-delete-checkbox").length)return!1;jQuery(".subs-delete-checkbox").on("click",function(){jQuery(".sg-subs-delete-button").removeClass("sgpb-btn-disabled"),jQuery(".subs-delete-checkbox").is(":checked")||jQuery(".sg-subs-delete-button").addClass("sgpb-btn-disabled")})},SGPBSubscribers.prototype.popupsTableRowColorChange=function(){jQuery("table tr th input").on("change",function(){this.checked?jQuery(this).parent("th").parent("tr").addClass("sgpb-popups-table-selected-row"):jQuery(this).parent("th").parent("tr").removeClass("sgpb-popups-table-selected-row")}),jQuery("table thead tr td input").on("change",function(){this.checked?jQuery(this).closest("table").find("tbody tr").addClass("sgpb-popups-table-selected-row"):jQuery(this).closest("table").find("tbody tr").removeClass("sgpb-popups-table-selected-row")})},jQuery(document).ready(function(){new SGPBSubscribers().init()});