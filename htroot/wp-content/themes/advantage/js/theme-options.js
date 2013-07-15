// JavaScript Document
jQuery(document).ready(function($){	
	listsTab = $("#advantage-tabs a");
	if ( listsTab.length > 0 ) {
		currentTab = $('#currenttab').val();	
		$(listsTab[currentTab]).addClass("advantage-current");
	}
	// Tabs
	$('#advantage-wrapper .advantage-pane').eq($('.advantage-current').index()).show();
		
	$('#advantage-tabs a').click(function() {
		$('#advantage-tabs a').removeClass('advantage-current');
		$(this).addClass('advantage-current');
		$('#advantage-wrapper .advantage-pane').hide();
		$('#advantage-wrapper .advantage-pane').eq($(this).index()).show();
		$('#currenttab').val($(this).index());
	});
	
	$('.advantage-color-field').wpColorPicker();
	 
    setTimeout(function () {
        $(".fade").fadeOut("slow", function () {
            $(".fade").remove();
        });

    }, 3000);
	
});
