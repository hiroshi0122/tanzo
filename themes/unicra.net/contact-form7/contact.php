<h4>氏名</h4>
    [text* your-name autocomplete:name]

<h4>フリガナ</h4>
    [text* furigana placeholder "フリガナをご入力ください"]
<h4>メールアドレス</h4>
    [email* your-email autocomplete:email] </>

<h4>電話番号</h4>
    [tel tel autocomplete:tel placeholder "000-0000-0000"]

<h4>お問い合わせ内容</h4>
    [radio* purpose use_label_element default:1 "無料体験" "無料相談" "事業所見学" "その他"]

<h4>メッセージ本文 (任意)</h4>
    [textarea your-message] </label>

[submit "送信"]