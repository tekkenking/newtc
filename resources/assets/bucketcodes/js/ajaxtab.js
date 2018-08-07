//UPDATED TO WORK AT NON EXISTING DOM
// March 21, 2016

(function($){
    "use strict";
    $.fn.extend({
        ajaxtab : function (options){
            var opt, url, href, $this, content = {};

            opt = $.extend({
                loader:'<h3 class="text-muted text-center">Please wait. Now loading.....</h3>',
                targetChild:'.tab-pane > .panel-body'
            }, options);

            return this.each(function(){
                $('body').on('click', '[data-toggle="tab"]', function (e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    $this = $(this);

                    href = $this.attr('href'); // We get the hash of the href link

                    //Lets update the tab-pane id
                    $this.closest('.nav-tabs')
                        .next('.tab-content')
                        .find('.tab-pane')
                        .prop('id', href.substr(1));

                    /*$('.tab-pane').prop('id', href.substr(1));*/

                    //console.log(href);

                    //Ajax load on
                    $(href + opt.targetChild).html(opt.loader);

                    url = $(this).attr('data-url'); // Get the ajax url on the link

                    if( url === '#' || url === undefined){
                        $(href + opt.targetChild).html('<h1 class="text-center"> DEMO CONTENT IS HERE '+href.substr(1)+'... </h1>');
                        $this.tab('show');
                    }else{
                        var jqxhr = $.get(url, content, function(data, statusText, xhr){

                            //console.log(xhr);
                            //console.log(statusText);

                            $(href + opt.targetChild).html(data);
                            $this.tab('show');
                        });

                        jqxhr.fail(function(response){
                            //reloadExpiredSession(response);
                        })
                    }

                    return $this;
                });
            });

        }
    });
})(jQuery);