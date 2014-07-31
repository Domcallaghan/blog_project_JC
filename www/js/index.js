(function(){

    $('.posLink').click(
        function(){

           var text = $(this).attr('id');
           $('#'+text).text("Tu as voté(e) !");

    });

    $('.negLink').click(
        function(){

            var text = $(this).attr('id');
            $('#'+text).text("Tu as voté(e) bastard  !");

        });

})();