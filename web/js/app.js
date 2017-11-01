$(document).ready(function () {
    $('.add_comment_form').on('submit',function(e) {
        e.preventDefault();

        //Берем значения инпутов
        var $name = $('input[name="first_name"]');
        var $email = $('input[name="email"]');
        var $comment = $('textarea[name="comment"]');

        $errors = false;

        //Проверяем на заполненность
        if(!$name.val().trim()) {
            $name.addClass('error');
            $errors = true;
        } else {
            $name.removeClass('error');
        }

        if(!$email.val().trim()) {
            $email.addClass('error');
            $errors = true;
        } else {
            $email.removeClass('error');
        }

        if(!$comment.val().trim()) {
            $comment.addClass('error');
            $errors = true;
        } else {
            $comment.removeClass('error');
        }

        //Если ошибок нет отправляем AJAX запрос на сервер
        if(!$errors) {
            $.post('/add_comment.php',{
                name : $name.val(),
                email : $email.val(),
                comment : $comment.val(),
            }, function (response) {
                var data = JSON.parse(response);

                if(data.errors) {
                    if(data.errors.name) {
                        $name.addClass('error');
                    }

                    if(data.errors.email) {
                        $email.addClass('error');
                    }

                    if(data.errors.comment) {
                        $comment.addClass('error');
                    }
                }

                if(data.comment) {
                    var $comment_block = getCommentBlock(data.comment[0].name,data.comment[0].email,data.comment[0].comment);

                    $('.comments-block').append($comment_block);
                }
            })
        }
    })
});

/*
* @param name - имя юзера
* @param email - почта юзера
* @param comment - комментарий юзера
* @return string
* */
function getCommentBlock(name,email,comment) {

        $comment_block_all = $('.comments-block');

        $last_block = $comment_block_all.find('.comment-item').last();

        //если не четное то добавляем зеленый стиль
        addClass = ($last_block.hasClass('comment-green') || !$last_block.length) ? '' : 'comment-green';

        return '' +
        '<div class="comment-item ' + addClass + ' col-md-4 col-sm-6 col-xs-12">\n' +
        '                <div class="cb_header">\n' +
        '                    <p>' + name + '</p>\n' +
        '                </div>\n' +
        '                <div class="cb_content">\n' +
        '                    <p class="cb_email">' + email + '</p>\n' +
        '                    <p class="cb_text">' + comment + '</p>\n' +
        '                </div>\n' +
        '            </div>';
}