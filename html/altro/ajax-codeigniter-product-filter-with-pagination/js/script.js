
    	$(document).on('click', '.has-drop', function () {
             var drop = $(this).find('svg').attr('class');
            if (drop == 'drop-active'){
                $(this).find('svg').attr('class','drop-inactive');
            }else{
                 $(this).find('svg').attr('class', 'drop-active');
            }
             //toggleClass('drop-active');
    		 $(this).parent().find('.section').slideToggle("slow");
        });
        
$(document).on('click','svg.like-svg',function(){
    $(this).toggleClass('liked');
    $(this).find('path').toggleClass('liked');
})
 $('#price_range').slider({
     range: true,
     min: 1000,
     max: 7000,
     values: [1000, 7000],
     step: 100,
     stop: function (event, ui) {
         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
         $('#hidden_minimum_price').val(ui.values[0]);
         $('#hidden_maximum_price').val(ui.values[1]);
     }
 });