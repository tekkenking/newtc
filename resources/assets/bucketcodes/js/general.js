/********************** AJAX REMOTE REQUEST *************************/
(function ($) {
    "use strict";

    $.fn.extend({
        processRequest: function(options) {
            let $this = $(this);

            let opt = $.extend({
                form: '',
                reset: false,
                callBack: false,
                type: 'post',
                params: false
            }, options);

            let resetForm = function($form) {
                if(opt.reset) {
                    $form.trigger('reset');
                }
            };

            let callBackx = function(result){
                if(opt.callBack !== false && typeof opt.callBack === 'function'){
                    let callbacks = $.Callbacks();
                    callbacks.add( opt.callBack );
                    callbacks.fire(result);
                }
            };

            let closeModal = function() {
                if(opt.closeModal) {
                    $('.modal').modal('hide');
                }
            };

            let startLadda = function() {
                $this.ladda().ladda('start');
            };

            let stopLadda = function() {
                $this.ladda().ladda('stop');
            };

            let sendToServer = function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let $this = $(this);
                startLadda();
                $(this).off('click', sendToServer);

                let $form = $(opt.form);

                let formdata = $form.serialize();

                if(opt.params) {
                    formdata += '&'+$.param(opt.params);
                }

                let url = $form.prop('action');
                let $msgPlace = $form.find('.server-msg');
                opt.type = $form.prop('method') || opt.type;
                let req = (opt.type.toLowerCase() === 'post')
                    ? $.post(url, formdata)
                    : $.get(url, opt.params);

                //Clear and hide the server-message
                $msgPlace.hide().removeClass('alert-danger alert-success');

                req.done(function (res) {
                    if (res.status === 'success') {
                        $msgPlace.addClass('alert-success');
                    }

                    $msgPlace.html(res.message).show();


                    resetForm($form);

                    callBackx(res);

                    closeModal();

                    $this.on('click', sendToServer);
                    stopLadda();
                });

                req.fail(function (err) {
                    let data = err.responseJSON.errors;
                    let errmsg = '';
                    $.each(data, function (k, v) {
                        errmsg += v + '<br/>';
                    });

                    $msgPlace.addClass('alert-danger').html(errmsg).show();
                    $this.on('click', sendToServer);
                    stopLadda();
                })

            };

            $(this).on('click', sendToServer);
        }
    })

})(jQuery);