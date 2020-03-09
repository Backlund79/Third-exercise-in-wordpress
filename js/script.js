jQuery('#menu-menu-top .sub-menu').hide(); //Hide children by default

jQuery('#menu-menu-top li a').click(function(event){
if (jQuery(this).next('ul.sub-menu').children().length !== 0) {     
    event.preventDefault();
}
jQuery(this).siblings('.sub-menu').slideToggle('slow');});