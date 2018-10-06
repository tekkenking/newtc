<!-- Full modal -->
<div class="modal inmodal fade bs-modal-full" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

<!-- Large modal -->
<div class="modal inmodal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

<!-- Modal Normal-->
<div class="modal inmodal fade bs-modal-nm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-nm" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>

<!-- Small modal -->
<div class="modal inmodal fade bs-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var $doc = $(this);

        $doc.on('click', '[data-href]', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();

            var url = $(this).data('href');
            var targetModal = $(this).data('target');

            var loader = 'Loading...';

            $(targetModal)
                .find('.modal-content')
                .html('<div style="height:200px; margin:15% auto">' + loader + '</div>')
                .end()
                .find('.modal-content')
                .load(url)
                .end()
                .modal('show');
        }).on('hidden.bs.modal', '.modal', function(e){
            $(this).find('.modal-content').html('');
        });

    });
</script>