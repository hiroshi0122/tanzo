
$(document).ready(function() {

  //----------------------------------------------------
  // ページ離脱確認
  //----------------------------------------------------
  var isChanged = false;  // フォームの入力欄が更新されたかどうかを表すフラグです。

  $(window).on("beforeunload", function() {
    if(isChanged) {
      return "このページを離れると、入力したデータが削除されます。";
    }
  });

  $("form input, form select, form textarea").change(function() {
    // 入力内容が更新されている場合は、isChangedフラグをtrueにします。
    isChanged = true;
  });


  //----------------------------------------------------
  // submit実行
  //----------------------------------------------------
  $("#contact-submit").click(function() {
    // ページ遷移拒否を無効
    isChanged = false;
    $(window).off('beforeunload');
  });


  //----------------------------------------------------
  // 確認処理
  //----------------------------------------------------
  $("#contact-confirm").on("click", function() {
    let full_name = $("[name='lastname']").val() + $("[name='firstname']").val();
    let email = $("[name='email']").val();
    let tel = $("[name='tel']").val();
    let message = $("[name='message']").val();
    if (full_name == "" || email == "" || tel == "" || message == "") {
      $(".err").fadeIn('slow');
      return false;
    }
    $(".err").hide();

    $("#confirm-name p").text(full_name); // name
    $("#confirm-email p").text(email); // email
    $("#confirm-tel p").text(tel); // tel
    message = message.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;').replace(/`/g, '&#x60;').replace(/\r?\n/g,'<br />');


    $("#confirm-message p").html(message); // message

    $(".input-area").hide();
    $(".confirm-area").fadeIn('slow');
  });
  $("#contact-return").on("click", function() {
    $(".confirm-area").hide();
    $(".input-area").fadeIn('slow');
  });


  //----------------------------------------------------
  // contact form
  //----------------------------------------------------
  (function($) {
    $(function() {
      $('#contact-form').submit(function(event){
        "use strict";
        event.preventDefault(); // submit無効化

        let url = $(this).data('url');

        $.ajax({
          type: 'POST',
          url: url,
          dataType: 'text',
          data: {
              'action' : 'post_contact',
              'params[]' : $(this).serialize(),
          },
          // data: $(this).serialize()

        }).done(function(data, textStatus, jqXHR) {
          // console.log(data);
          // console.log(textStatus);
          // console.log(jqXHR);
          let param = JSON.parse(data);
          if (param.code === 200) { // success
            $('#contact-form').remove();
            $('#contact-thanks').removeClass('hide');
          } else {
            $('#contact-thanks').removeClass('hide');
            $('#result-contact p').addClass('err');
          }

          $('#result-contact p').html(param.message);

        }).fail(function() {
          $('#result-contact').addClass('err');
          $('#result-contact').html('通信エラーが起こりました。お手数ですが、もう一度やり直すか直接メール（shogai@city.mitaka.lg.jp）にてお問い合わせください。');
        });
      });
    })
  })(jQuery);

});
