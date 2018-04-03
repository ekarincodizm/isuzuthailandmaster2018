$(document).ready(function(){

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

    $(".row-number input[type='radio']").change(function() {
                var label = $(this).closest("label"),
                    text  = label.find("input[type='text']"),
                    link  = label.find("[data-popup]"),
                    span  = label.find(".span-vin");
        $(".row-number input[type='text']").val("").hide();
        $("[data-popup]").hide();
        $(".span-vin").hide();
        text.css("display", "inline-block");
        span.css("display", "inline-block");
        link.css("display", "inline-block");

        link.click(function(){
            var src = $(this).data("popup");
            console.log("click");
            $(".popup").addClass("active");
            $(".wrap-img").html("<img src='"+src+"'>")
        });
        $(".mesk-popup, .btn-close").click(function(){
            $(".popup").removeClass("active");
            $(".wrap-img").html("")
        });
    });
   	

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
			window.location.href = "/thailandmaster/register-vip";
		}else{
			alert('โปรดกดปุ่มยอมรับ');
		}
		return false;
		
	});

	



	// index
	$( ".page-loginvip form" ).submit(function( event ) {

			var user = $('input:text[name=user]').val();
			var pass = md5($('input:password[name=pass]').val());

			$.get( "/thailandmaster/register/save-session?user="+user+"&pass="+pass, function( data ) {
				if(data == 'false'){
			       	alert("Password incorrect");
			    }else{
			    	window.location.href = "/thailandmaster/rule";
			    }
			    
			    console.log(data);
			});
            return false;

	});

	//  Page register


	$( "#register_me" ).click(function() {
	  	$( "#register_transfer" ).prop('checked', false);
	  	$('input[name="CustomerRegister[car_number]"]').val('');
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

	$('input').removeClass('error');
	$('.datamember_type').removeClass('error');
	$('.playfield').removeClass('error');
	validate = true;
	massage = [];
	console.log('Vip');
	notNull($( "input[name='MemberVip[vip_fullname]']" ),'ชื่อ-นามสกุล');
	if(!$("input[name='MemberVip[datamember_type]']").is(':checked')){
		validate = false;
		massage.push('กรุณาเลือกหมายเลขสมาชิก หรือ Vip number');
		$('.datamember_type').addClass('error');
		//$("input[name='MemberVip[datamember_type]']").addClass('error');
	}else{

		if($("input[name='MemberVip[datamember_type]']:checked").val()== 'vip'){
			var vip_number = $( "input[name='MemberVip[vip_number]']" ).val();
			if ( vip_number.length != 9 ){
				validate = false;
				massage.push('กรุณากรอก หมายเลขสมาชิก Isuzu MU-X VIP Club 9 หลัก');
				$( "input[name='MemberVip[vip_number]']" ).addClass('error');
			}else if(vip_number = ''){
				notNull($( "input[name='MemberVip[vip_number]']" ),' หมายเลขสมาชิก Isuzu MU-X VIP Club');
				//$( "input[name='MemberVip[vip_number]']" ).addClass('error');
			}
		}else{
			var vin_number = $( "input[name='MemberVip[vin_number]']" ).val();
			if ( vin_number.length != 17 ){
				validate = false;
				massage.push('กรุณากรอก หมายเลข VIN NUMBER 17 หลัก');
				$( "input[name='MemberVip[vin_number]']" ).addClass('error');
			}else if(vip_number = ''){
				notNull($( "input[name='MemberVip[vin_number]']" ),'หมายเลข  VIN NUMBER');
				//$( "input[name='MemberVip[vin_number]']" ).addClass('error');
			}
		}
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
		$('.year').addClass('error');
	}

	
	
	var vip_id_card = $( "input[name='MemberVip[vip_id_card]']" ).val();
	if ( vip_id_card.length != 13 ){
		validate = false;
		massage.push('กรุณากรอก หมายเลข บัตรประชาชน 13 หลัก');
		$( "input[name='MemberVip[vip_id_card]']" ).addClass('error');
	}else if(vip_id_card = ''){
		notNull($( "input[name='MemberVip[vip_id_card]']" ),'บัตรประชาชน');
		//$( "input[name='MemberVip[vip_id_card]']" ).addClass('error');
	}


	//notNull($( "input[name='MemberVip[vip_id_card]']" ).val(),'บัตรประชาชน');



	notNull($( "input[name='MemberVip[vip_birthdate][day]']" ),'วัน');
	notNull($( "input[name='MemberVip[vip_birthdate][month]']"),'เดือน');
	notNull($( "input[name='MemberVip[vip_birthdate][year]']"),'ปี');
	var vip_phone = $( "input[name='MemberVip[vip_phone]']" ).val();
	if ( vip_phone.length != 10 ){
		validate = false;
		massage.push('กรุณากรอก เบอร์ติดต่อ 10 หลัก');
		$( "input[name='MemberVip[vip_phone]']" ).addClass('error');
	}else if(vip_phone == ''){
		notNull($( "input[name='MemberVip[vip_phone]']" ),'เบอร์ติดต่อ');
		$( "input[name='MemberVip[vip_phone]']" ).addClass('error');
	}
	//notNull($( "input[name='MemberVip[vip_phone]']" ).val(),'เบอร์ติดต่อ');

	

	if(!$("input[name='MemberVip[playfield]']").is(':checked')){
		validate = false;
		massage.push('กรุณาเลือกสถานที่แข่งขัน');

		$('.playfield').addClass('error');
		//$("input[name='MemberVip[playfield]']").addClass('error');
	}

	if(validate == false){
		alert(massage);
		return false;
	}else{
		return true;
	}
}

function validateRegis(){
	notNull($( "input[name='MemberVip[register_fullname]']" ),'ชื่อ-นามสกุล ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_id_card]']" ),'บัตรประชาชน ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_birthdate][day]']" ),'วัน-เดือน-ปีเกิด ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_birthdate][month]']" ),'วัน-เดือน-ปีเกิด ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_birthdate][year]']" ),'วัน-เดือน-ปีเกิด ผู้สมัคร');
	notNull($( "input[name='MemberVip[register_phone]']" ),'เบอร์ติดต่อ ผู้สมัคร');
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
			console.log($value);
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
