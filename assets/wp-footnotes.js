jQuery(document).ready(function($) {


    // Number The Footer Notes
    $('[data-footnote]').each(function(index){

        var $footnote = $(this);
        var $trigger = $footnote.find('[data-footnote-trigger]');
        var $body = $footnote.find('[data-footnote-body]');
        var number = index + 1;

        // Set The Footnote Number
        $trigger.html('['+number+']');
        $trigger.attr('data-footnote-number',number);

    })

    // Add Click Events
    $('[data-footnote-trigger]').on('click',function(e){
        e.preventDefault(); 
        var $trigger = $(this);
        var $body = $trigger.next();

        if($body.hasClass('open')){
            $body.removeClass('open');
            $trigger.html('['+$trigger.attr('data-footnote-number')+']');
        } else {
            $body.addClass('open');
            $trigger.html('[x]');
        }
        
      })

});
