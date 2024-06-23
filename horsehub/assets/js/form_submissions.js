
/* -- AJAX FUNCTIONS -- */
var submission_res = '';
var form_processed = '';
var form_processed_callback = '';
var modal_processed = '';
var details_processed = '';
var modal_processed_alerter = '';
var btnOrg = '';
var alerts_C = 12;

function mk_alert( alertTxt, alertType, alertDistenation ){
	console.log("alerted");
	alerts_C++;
	if( alertDistenation != '' ){
		var txtFA = '';
		var txtClass = '';
		if( alertType == 'suc' ){
			txtFA = '<i class="fas fa-check"></i>';
			txtClass = 'success';
		} else if( alertType == 'err' ){
			txtFA = '<i class="fas fa-times"></i>';
			txtClass = 'error';
		} else if( alertType == 'warn' ){
			txtFA = '<i class="fas fa-exclamation-circle"></i>';
			txtClass = 'warning';
		}
		var alertData = '<span id="alerter-' + alerts_C + '" onclick="rem_alert(' + alerts_C + ');" class="' + txtClass + '">' + txtFA + ' <p>' + alertTxt + '</p></span>';
		$(alertDistenation).append(alertData);
	}
	
}

function rem_alert( alertID ){
	$('#alerter-' + alertID).remove();
}

function submit_form(frm_id, res, contoller){
	//save editor data
	//tinyMCE.triggerSave();
	var wrongsCount = 0;
	submission_res = res;
	var formdata = new FormData();
	form_processed = '#' + frm_id;
	var URLer = $(form_processed).attr( 'contoller' );
	//alert(form_processed);
	form_processed_callback = $(form_processed).attr( 'id-callback' );
	modal_processed = $(form_processed).attr('id-modal');
	details_processed = $(form_processed).attr('id-details');
	modal_processed_alerter = '#' + modal_processed + ' .form-alerts';
	console.log(modal_processed_alerter);
	$(modal_processed_alerter).html('');
	btnOrg = $('#' + modal_processed + '  .modalAction .actionBtn').html();
	$('#' + modal_processed + '  .modalAction .actionBtn').html('LOADING...');
	$('#' + modal_processed + '  .modalAction .actionBtn').prop('disabled', true);
	//tinyMCE.triggerSave();
	console.log('submission started == ' + frm_id);
	var gate = true;
	$(form_processed + ' .data-input').each(function(){
		$(this).removeClass('inputHasError');
		//collect entry data
		var ths_id = $(this).attr('id');
		var viewid = ths_id;
		if( $(this).attr('viewid') ){
			viewid = $(this).attr('viewid');
		}
		if( viewid == '' || viewid == null || viewid == 'undefined' ){
			viewid = ths_id;
		}
		 console.log(viewid);
		 // alert(viewid);
		$('#'+viewid).removeClass('inputHasError');
		
		var ths_name = $(this).attr('name');
		
		var ths_den = $(this).attr('denier');
		var ths_alert = $(this).attr('alerter');
		var ths_req = parseInt($(this).attr('req'));
		
		var ths_default = "";
		if( $(this).attr('defaulter') ){
			ths_default = $(this).attr('defaulter');
		}
		
		
		var ths_tag = $(this).prop("tagName").toLowerCase();
		
		var ths_val = "";
		if( $(this).val() ){
			ths_val = $(this).val().trim();
		}
		// alert(ths_val);
		
		var ths_namer = capitalizer(ths_name.replace('_', ' '));
		if( ths_alert == '' || ths_alert == null || ths_alert == 'undefined' ){
			
			if( lang_db == '_ar' ){
				ths_alert = "الرجاء التأكد من المدخلات";
			} else {
				ths_alert = "Please_Check_Inputs" + '( '+ ths_namer +' )';
			}
		}
		
		
		var ths_type = '';
		// alert(ths_tag);
		//define element type
		if(ths_tag == 'input'){
			ths_type = $(this).attr('type');
		} else {
			ths_type = ths_tag;
		}
		
		if(ths_type == 'file'){
			//its file
			if (($("#" + ths_id))[0].files.length> 0) {
				var filer = ($("#" + ths_id))[0].files[0];
				formdata.append(ths_id, filer);
			} else {
				if(ths_req == 1){
					gate = false;
					mk_alert(ths_alert, 'err', modal_processed_alerter);
					wrongsCount++;
				}
			}
		} else {
			//its input, select, textarea
			if(ths_val != ths_den){
				if( ths_val != "" ){
					formdata.append(ths_name, ths_val);
				} else {
					if(ths_req == 1){
						if( wrongsCount <= 3 ){
							mk_alert(ths_alert, 'err', modal_processed_alerter);
						}
						
						$('#'+viewid).addClass('inputHasError');
						wrongsCount++;
					} else {
						formdata.append(ths_name, ths_default);
					}
				}
				
			} else {
				if(ths_req == 1){
					if( wrongsCount <= 3 ){
						mk_alert(ths_alert, 'err', modal_processed_alerter);
					}
					
					$('#'+viewid).addClass('inputHasError');
					wrongsCount++;
				} else {
					formdata.append(ths_name, ths_default);
				}
			}
		}
		
	});
	
	// gate = false;
	if( wrongsCount == 0 ){
		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener("progress", progressHandlerA, false);
		ajax.addEventListener("load", completeHandlerA, false);
		ajax.addEventListener("error", errorHandlerA, false);
		ajax.addEventListener("abort", abortHandlerA, false);
		ajax.open("POST", URLer);
		if(gate == true){
			//send data to ajax
			//closeModal();
			start_loader();
			ajax.send(formdata);
		}
	} else {
			$('#' + modal_processed + '  .modalAction .actionBtn').html( btnOrg );
			$('#' + modal_processed + '  .modalAction .actionBtn').prop('disabled', false);
	}
}



function capitalizer(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function clear_form(frm){
	
	$('#' + frm + ' .data-input').each(function(){
		$(this).removeClass('inputHasError');
		//collect entry data
		var ths_id = $(this).attr('id');
		var ths_name = $(this).attr('name');
		var ths_den = $(this).attr('denier');
		var ths_alert = $(this).attr('alerter');
		var ths_default = $(this).attr('defaulter');
		var ths_req = parseInt($(this).attr('req'));
		var ths_val = $(this).val();
		var ths_tag = $(this).prop("tagName").toLowerCase();
		var ths_type = '';
		
		//clear element type based on type
		if(ths_tag == 'input' || ths_tag == 'textarea'){
			$(this).val('');
		} else if(ths_tag == 'select'){
			$(this).val(0);
		} else {
			$(this).val('');
		}

	});
	
}





function progressHandlerA(event){
	var percent = (event.loaded / event.total) * 100;
	set_loader(percent);
}
function completeHandlerA(event){
	var responser = JSON.parse(event.target.responseText);
	console.log(responser);
	
	
	if(responser['success'] == true){
	
		if(submission_res == 'reload_page'){
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			// closeModal();
			 //$("#article").load(location.href + " #article");
			setTimeout(function(){window.location.reload();}, 1000);
		} else if(submission_res == 'nothing'){
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
		} else if(submission_res == 'forward_page'){
			var nwLink = responser['goto'];
			window.location.replace(nwLink);
			// repeat_call();
		}   else if(submission_res == 'close_modal'){
			
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			setTimeout(function(){
									closeModal();
									$(modal_processed_alerter).html('');
									updatePanelPager(true);
								}, 1000);
			
		}   else if(submission_res == 'close_popup_reject'){
			
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			setTimeout(function(){
									$(modal_processed_alerter).html('');
									doAfterReject();
								}, 1000);
			
		}   else if(submission_res == 'close_popup_pay'){
			
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			setTimeout(function(){
									$(modal_processed_alerter).html('');
									doAfterPay();
								}, 1000);
			
		}   else if(submission_res == 'switch_serv_pat_inv'){
			
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			setTimeout(function(){
									closeModal();
									$(modal_processed_alerter).html('');
									goHome();
									setTimeout(function(){
										loadServiceData(91, 'acc_patients_invoices_list', 'Patients Invoices', 0, '');
									}, 200);
								}, 1000);
			
		}   else if(submission_res == 'close_modal_ref_branch'){
			
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			setTimeout(function(){
									closeModal();
									$(modal_processed_alerter).html('');
									loadAccountSubs(mainAccProcessd);
								}, 1000);
			
		}   else if(submission_res == 'close_modal_rem'){
			
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			setTimeout(function(){
									$('#'+ activeObjectRem).remove();
									closeModal();
									$(modal_processed_alerter).html('');
								}, 1000);
			
		}      else if(submission_res == 'close_modal_spec'){
			
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			setTimeout(function(){
									hideModalView(modal_processed);
									$(modal_processed_alerter).html('');
									
								}, 1000);
			
		}   else if(submission_res == 'call_back'){
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			closeModal();
			clear_form(form_processed);
			window[form_processed_callback]();
			// repeat_call();
		}  else if(submission_res == 'execute_action'){
			$('#explorer').append(responser['message']);
		}  else if(submission_res == 'next_step'){
			var ths_step = parseInt($('#' + form_processed).attr('stepper'));
			var nxt_step = ths_step + 1;
			console.log(form_processed + '==========' + nxt_step);
			form_processed = form_processed.substring(0, form_processed.length - 2);
			show_modal(form_processed + '-modal-' + nxt_step);
			$('#' + form_processed + '-' + nxt_step).html(responser['message']);
		} else if(submission_res == 'refresh') {
			  $("#article").load(location.href + " #article");
			//setTimeout(function(){window.location.reload();}, 1000);
		} else if(submission_res == 'append_data') {
			$('#added_items').append(responser['message']);
			closeModal();
		} else if(submission_res == 'clear_form') {
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			clear_form(form_processed);
		} else if(submission_res == 'close_details') {
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			hide_details(details_processed);
		} else if(submission_res == 'close_modal_only') {
			mk_alert(responser['message'], 'suc', modal_processed_alerter);
			
			setTimeout(function(){
									closeModal();
									end_loader();
								}, 1000);
		}
	} else {
		mk_alert(responser['message'], 'err', modal_processed_alerter);
	}
		setTimeout(function(){
			$('#' + modal_processed + '  .modalAction .actionBtn').html( btnOrg );
			$('#' + modal_processed + '  .modalAction .actionBtn').prop('disabled', false);
		}, 1500);
		end_loader();
		
}
function errorHandlerA(event){
	var responser = event.target.responseText;
	mk_alert("Upload Failed, please check your inputs 4656545687", "err", modal_processed_alerter);
	alert(responser);
}
function abortHandlerA(event){
	var responser = event.target.responseText;
	mk_alert("Upload Aborted by user", "err", modal_processed_alerter);
	alert(responser);
}

