<div class="comment-item <?=$key % 2 == 0 ? '' : 'comment-green'?> col-md-4 col-sm-6 col-xs-12">
    <div class="cb_header">
        <p><?=$comment['name']?></p>
    </div>
    <div class="cb_content">
        <p class="cb_email"><?=$comment['email']?></p>
        <p class="cb_text"><?=$comment['comment']?></p>
    </div>
</div>