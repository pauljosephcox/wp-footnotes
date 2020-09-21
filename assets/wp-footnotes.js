jQuery(document).ready(function($) {


    // Number The Footer Notes
    $('[data-footnote]').each(function(index){

        var $trigger = $(this).find('[data-footnote-trigger]');
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
        var $note = $trigger.parent();

        if($body.hasClass('open')){
            $body.removeClass('open');
            $note.removeClass('open');
            $trigger.html('['+$trigger.attr('data-footnote-number')+']');
        } else {
            $body.addClass('open');
            $note.addClass('open');
            $trigger.html('[x]');
        }
        
      })

});
