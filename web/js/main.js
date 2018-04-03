$(document).ready(function(){
	var baseUrl = "isuzuthailandmaster2018";

    $(".not-value").each(function(){
        var 
            label = $(this).find("label"),
            radio = label.find("input[type='radio']"),
            ul    = $(this).closest("ul"),
            list  = ul.find("li");
        radio.change(function() {
            var li = $(this).closest("li");
            if ($(this).is(':checked')) {
                list.addClass("not-value");                        
                $(this).parents("li").removeClass("not-value");

                if (list.hasClass("not-value")) {
                    li.find("ul input").prop('checked', false);
                }                        
            }
        });
    });

    var html_detail = '<thead><tr>'+
    	'<th colspan="2">ข้อมูลผู้สมัคร</th>'+
    	'</tr></thead><tbody><tr><td>ชื่อ-นามสกุล<sup>*</sup></td><td><input type="text" name="MemberVip[register_fullname]"></td></tr>'+
    	'<tr><td>บัตรประชาชน<sup>*</sup></td><td><input type="text" name="MemberVip[register_id_card]"></td></tr>'+
    	'<tr>'+
    		'<td>วัน-เดือน-ปีเกิด (ค.ศ.)<sup>*</sup><span>ตัวอย่าง ( 01-09-1988 )</span></td>'+
    		'<td><input type="text" name="MemberVip[register_birthdate][day]" class="date number" maxlength="2"> <p>-</p>'+
    		'<input type="text" name="MemberVip[register_birthdate][month]" class="month number" maxlength="2"> <p>-</p>'+
    		'<input type="text" name="MemberVip[register_birthdate][year]" class="year number" maxlength="4"></td>'+
    	'</tr><tr><td>เบอร์ติดต่อ<sup>*</sup></td><td><input type="tel" name="MemberVip[register_phone]"></td></tr>'+
    	'<tr><td>อีเมล์</td><td><input type="mail" name="MemberVip[register_email]"></td></tr>'+
    	'</tbody>';
   	

   	$( "#owner" ).click(function() {
	  	$( "#corporate" ).prop('checked', false);
	  	$('.table-owner').html(html_detail);
	  	$('.table-corporate').html('');
	  	dontString();
	});
	$( "#corporate" ).click(function() {
		if($('#corporate').is(':checked')) { 
			if($('.table-corporate').html() == ''){
				$('.table-corporate').html(html_detail);
			}
		}else{
		  	$('.table-corporate').html(html_detail);
		}
		$('.table-owner').html('');
		$( "#owner" ).prop('checked', false);
		dontString();

	});

	$( ".radio-join_me" ).click(function() {
	  $( ".radio-register_transfer" ).prop('checked', false);
	});
	$( ".radio-register_transfer" ).click(function() {
	  $( ".radio-join_me" ).prop('checked', false);
	});

	$(".login-reset").click(function(){
		console.log('login-reset');
		$(".login-user").val('');
		$(".login-pass").val('');
	});
	 $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

	 $( "#submitrule" ).click(function() {
		if($('#checkrule').is(':checked')){
			window.location.href = "/"+baseUrl+"/register-vip";
		}else{
			alert('โปรดกดปุ่มยอมรับ');
		}
		return false;
		
	});

	



	// index
	$( ".page-loginvip form" ).submit(function( event ) {

			var user = $('input:text[name=user]').val();
			var pass = md5($('input:password[name=pass]').val());

			$.get( "/"+baseUrl+"/register/save-session?user="+user+"&pass="+pass, function( data ) {
				if(data == 'false'){
			       	alert("Password incorrect");
			    }else{
			    	window.location.href = "/"+baseUrl+"/rule";
			    }
			    
			    console.log(data);
			});
            return false;

	});

	//  Page register


	$( "#register_me" ).click(function() {
	  	$( "#register_transfer" ).prop('checked', false);
		$('input[name="CustomerRegister[owner_name]"]').val('');
		$('input[name="CustomerRegister[related]"]').prop('checked', false);
	});
	$( "#register_transfer" ).click(function() {
	  	$( "#register_me" ).prop('checked', false);
	});
	$('#customer_type_normal').click(function() {
		$('input[name="CustomerRegister[car_number]"]').val('');
		$('input[name="CustomerRegister[owner_name]"]').val('');
		$('input[name="CustomerRegister[related]"]').prop('checked', false);
	});
	$( "#register_button" ).click(function() {
	  	checkIDStatus();
	});




});
function dontString(){
	$(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
}
var massage = [];
var validate = true;

function validateForm(formObj) { 


	validate = true;
	massage = [];
	
	notNull($( "input[name='MemberVip[vip_fullname]']" ).val(),'ชื่อ-นามสกุล');
	notNull($( "input[name='MemberVip[vip_id_card]']" ).val(),'บัตรประชาชน');
	notNull($( "input[name='MemberVip[vip_birthdate][day]']" ).val(),'วัน-เดือน-ปีเกิด');
	notNull($( "input[name='MemberVip[vip_birthdate][month]']" ).val(),'วัน-เดือน-ปีเกิด');
	notNull($( "input[name='MemberVip[vip_birthdate][year]']" ).val(),'วัน-เดือน-ปีเกิด');
	notNull($( "input[name='MemberVip[vip_phone]']" ).val(),'เบอร์ติดต่อ');

	if($('input[name="MemberVip[owner]"]:checked').val() == undefined && $('input[name="MemberVip[corporate]"]:checked').val() == undefined){
		validate = false;
		massage.push('กรุณาเลือกประเภทของลูกค้า');
	}

	if($('input[name="MemberVip[owner]"]:checked').val() != undefined){
		if($('input[name="MemberVip[join_me]"]:checked').val() == undefined && $('input[name="MemberVip[register_transfer]"]:checked').val() == undefined){
			validate = false;
			massage.push('กรุณาเลือกการผู้สมัคร');
		}
	}
	var d = new Date();
	var year = d.getFullYear();
	if(parseInt($('.date').val()) >31){
		validate = false;
		massage.push('กรุณากรอกวันที่ให้ถูกต้อง');
	}
	if(parseInt($('.month').val()) >12){
		validate = false;
		massage.push('กรุณากรอกเดือนให้ถูกต้อง');
	}
	if(parseInt($('.year').val()) < 1900  || parseInt($('.year').val()) > (year+543)-15){
		validate = false;
		massage.push('กรุณากรอกปีให้ถูกต้อง');
	}
	
	
	
	
	

	if($('input[name="MemberVip[register_transfer]"]:checked').val() != undefined){
		// notNull($( "input[name='MemberVip[owner_name]']" ).val(),'ชื่อ เจ้าของรถ');
		if(!$("input[name='MemberVip[related]']").is(':checked')){
			validate = false;
			massage.push('กรุณาเลือกความสัมพันธ์');
		}
		validateRegis();
	}
	if($('input[name="MemberVip[corporate]"]:checked').val() != undefined){
		validateRegis();
	}

	if(!$("input[name='MemberVip[playfield]']").is(':checked')){
		validate = false;
		massage.push('กรุณาเลือกสถานที่แข่งขัน');
	}

	if(validate == false){
		alert(massage);
		return false;
	}else{
		return true;
	}
}

function validateRegis(){
	notNull($( "input[name='MemberVip[register_fullname]']" ).val(),'ชื่อ-นามสกุล ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_id_card]']" ).val(),'บัตรประชาชน ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_birthdate][day]']" ).val(),'วัน-เดือน-ปีเกิด ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_birthdate][month]']" ).val(),'วัน-เดือน-ปีเกิด ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_birthdate][year]']" ).val(),'วัน-เดือน-ปีเกิด ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_phone]']" ).val(),'เบอร์ติดต่อ ผู้สมัคร');
	// notNull($( "input[name='MemberVip[register_email]']" ).val(),'อีเมล์ ผู้สมัคร');
	// if( !isEmail($( "input[name='MemberVip[register_email]']" ).val())) { 
	// 	validate = false;
	// 	massage.push('กรุณากรอกอีเมล์ให้ถูกต้อง');
	// }
}	
//});

function notNull($value,$text){
	if($value.val() == '' || $value.val() == undefined){
		validate = false;
		if(jQuery.inArray('กรุณากรอก'+$text, massage) === -1){
			massage.push('กรุณากรอก'+$text);
			$value.addClass('error');
		}
	}
}

function checkRadio($value,$text){
	if($value == '' || $value == undefined){
		validate = false;
		if(jQuery.inArray('กรุณาเลือก'+$text, massage) === -1){
			massage.push('กรุณาเลือก'+$text);
		}
	}
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function checkIDStatus(){
	console.log($( "input[name='CustomerRegister[id_card]" ).val());
	console.log($("input[name='CustomerRegister[playfield]']:checked").val());
	$('.race').removeClass('error');
	if(!$("input[name='CustomerRegister[playfield]']").is(':checked')){
		alert('กรุณาเลือกสถานที่แข่งขัน');
		$('.race').addClass('error');
	}
	dataStatus = 'false';
	$.post( "/isuzuthailandmaster2018/register/check-idcard", { id_card: $( "input[name='CustomerRegister[id_card]" ).val(), playfied: $("input[name='CustomerRegister[playfield]']:checked").val() })
	  .done(function( dataStatus ) {
	  	if(dataStatus == 'true'){
	  		validateRegister();
	  	}else{
	  		alert(dataStatus);

	  	}
	  });

}
function validateRegister(){
	$("input").removeClass('error');
	$('.race').removeClass('error');
	$('.customer').removeClass('error');
	$('.register_isuzu_type').removeClass('error');
	validate = true;
	massage = [];
	notNull($( "input[name='CustomerRegister[fullname]']" ),'ชื่อ-นามสกุล');
	notNull($( "input[name='CustomerRegister[id_card]" ),'บัตรประชาชน');

	
	notNull($( "input[name='CustomerRegister[birthdate][day]']" ),'วัน');
	notNull($( "input[name='CustomerRegister[birthdate][month]']" ),'เดือน');
	notNull($( "input[name='CustomerRegister[birthdate][year]']" ),'ปี');
	var phone = $( "input[name='CustomerRegister[phone]']" ).val();
	if ( phone.length != 10 ){
		validate = false;
		massage.push('กรุณากรอก เบอร์ติดต่อ 10 หลัก');
		$( "input[name='CustomerRegister[phone]']" ).addClass('error');
	}else if(phone = ''){
		notNull($( "input[name='CustomerRegister[phone]']" ),'เบอร์ติดต่อ');
	}

	var d = new Date();
	var year = d.getFullYear();
	if(parseInt($('.date').val()) >31){
		validate = false;
		massage.push('กรุณากรอกวันที่ให้ถูกต้อง');
		$( ".date" ).addClass('error');
	}
	if(parseInt($('.month').val()) >12){
		validate = false;
		massage.push('กรุณากรอกเดือนให้ถูกต้อง');
		$( ".month" ).addClass('error');
	}
	if(parseInt($('.year').val()) > year){
		validate = false;
		massage.push('กรุณากรอกปีให้เป็นคริสต์ศักราช');
		$( ".year" ).addClass('error');
	}

	
	
	var id_card = $( "input[name='CustomerRegister[id_card]']" ).val();
	if ( id_card.length != 13 ){
		validate = false;
		massage.push('กรุณากรอก หมายเลข บัตรประชาชน 13 หลัก');
		$( "input[name='CustomerRegister[id_card]']" ).addClass('error');
	}else if(vip_id_card = ''){
		notNull($( "input[name='CustomerRegister[id_card]']" ),'บัตรประชาชน');
	}

	if($('input[name="CustomerRegister[customer_type]"]:checked').val() == undefined){
		validate = false;
		massage.push('กรุณาเลือกประเภทของลูกค้า');
		$('.customer').addClass('error');
	}


	


	if($('input[name="CustomerRegister[customer_type]"]:checked').val() == 'isuzu'){
		
		notNull($( "input[name='CustomerRegister[car_number]']" ),'ทะเบียนรถ');
		if($('input[name="CustomerRegister[owner]"]:checked').val() == undefined && $('input[name="CustomerRegister[corporate]"]:checked').val() == undefined){
			validate = false;
			massage.push('กรุณาเลือกชนิดของลูกค้า');
			$('.register_isuzu_type').addClass('error');
		}
		if($('input[name="CustomerRegister[owner]"]:checked').val() != undefined){

			if($('input[name="CustomerRegister[owner]"]:checked').val() != undefined){
				if($('input[name="CustomerRegister[register_me]"]:checked').val() == undefined && $('input[name="CustomerRegister[register_transfer]"]:checked').val() == undefined){
					validate = false;
					massage.push('กรุณาเลือกการผู้สมัคร');
				}
				if($('input[name="CustomerRegister[register_transfer]"]:checked').val() != undefined){
					if(!$("input[name='CustomerRegister[related]']").is(':checked')){
						validate = false;
						massage.push('กรุณาเลือกความสัมพันธ์กับเจ้าของรถ');
					}
					notNull($( "input[name='CustomerRegister[owner_name]']" ),'ชื่อเจ้าของรถอีซุซุ');
				}
			}
			
		}
		
		
	}

	

	if(validate == false){
		alert(massage);
		return false;
	}else{
		$('#register_submit').click();
		return true;
	}

}