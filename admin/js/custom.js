$('#calendar').datepicker({
		});

!function ($) {
    $(document).on("click","ul.nav li.parent > a ", function(){          
        $(this).find('em').toggleClass("fa-minus");      
    }); 
    $(".sidebar span.icon").find('em:first').addClass("fa-plus");
}

(window.jQuery);
	$(window).on('resize', function () {
  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-up').addClass('fa-toggle-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-down').addClass('fa-toggle-up');
	}
});



//  custom js

$(document).on('click','.edit',function(){
	var pid = $(this).attr('p');
	alert(pid);
	
});

$(document).on('click','.trash',function(){
	var pid = $(this).attr('p');
	$.ajax({
	      type: 'POST',
	      url: "delete-property.php",
	      data: {Pid:pid},
	      dataType: "text",
	      success: function(data) { 
	      	alert(data);
	      	location.reload();
	      }
	});
});

$(document).on('click','.up-main-thmb',function(){
	var upid = $(this).attr('p');
	alert(upid);
})
