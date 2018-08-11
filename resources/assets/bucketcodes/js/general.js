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
                msgPlace: '.server-msg',
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

            let prepareMsgPlace = function($form) {
                let $msgPlace = $form.find(opt.msgPlace);

                //Does msg place already have alert class else add it
                if( ! $msgPlace.hasClass('alert') ) {
                    $msgPlace.addClass('alert');
                }

                return $msgPlace;
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
                let msgplace =  prepareMsgPlace($form);

                opt.type = $form.prop('method') || opt.type;
                let req = (opt.type.toLowerCase() === 'post')
                    ? $.post(url, formdata)
                    : $.get(url, opt.params);

                //Clear and hide the server-message
                msgplace.hide().removeClass('alert-danger alert-success');

                req.done(function (res) {
                    $this.on('click', sendToServer);
                    stopLadda();

                    if (res.status === 'success') {
                        msgplace.addClass('alert-success');
                        closeModal();
                        resetForm($form);
                    }

                    if(res.status && res.status === 'fail') {
                        msgplace.addClass('alert-danger');
                    }

                    msgplace.html(res.message).show();
                    callBackx(res);
                });

                req.fail(function (err) {
                    let data = err.responseJSON.errors;
                    let errmsg = '';
                    $.each(data, function (k, v) {
                        errmsg += v + '<br/>';
                    });

                    msgplace.addClass('alert-danger').html(errmsg).show();
                    $this.on('click', sendToServer);
                    stopLadda();
                })

            };

            $(this).on('click', sendToServer);
        }
    })

})(jQuery);