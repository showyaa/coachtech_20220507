<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/confirm.css">
</head>

<body>
  <main>
    <h2>内容確認</h2>
    <form class="form" action="/thanks" method="POST">
      @csrf
      <div class="form_item">
        <p class="form_item_label">お名前</p>
        <p class="form_item_content">{{$contents['fullname']}}</p>
        <input type="hidden" name="fullname" value="{{$contents['fullname']}}">
      </div>
      <div class="form_item">
        <p class="form_item_label">性別</p>
        <p class="form_item_content">@if($contents['gender'] == '1')男性@elseif($contents['gender'] == '2')女性@endif</p>
        <input type="hidden" name="gender" value="{{$contents['gender']}}">
      </div>
      <div class="form_item">
        <p class="form_item_label">メールアドレス</p>
        <p class="form_item_content">{{$contents['email']}}</p>
        <input type="hidden" name="email" value="{{$contents['email']}}">
      </div>
      <div class="form_item">
        <p class="form_item_label">郵便番号</p>
        <p class="form_item_content">{{$contents['postcode']}}</p>
        <input type="hidden" name="postcode" value="{{$contents['postcode']}}">
      </div>
      <div class="form_item">
        <p class="form_item_label">住所</p>
        <p class="form_item_content">{{$contents['address']}}</p>
        <input type="hidden" name="address" value="{{$contents['address']}}">
      </div>
      <div class="form_item">
        <p class="form_item_label">建物名</p>
        <p class="form_item_content">{{$contents['building_name']}}</p>
        <input type="hidden" name="building_name" value="{{$contents['building_name']}}">
      </div>
      <div class="form_item">
        <p class="form_item_label">ご意見</p>
        <p class="form_item_content">{{$contents['opinion']}}</p>
        <input type="hidden" name="opinion" value="{{$contents['opinion']}}">
      </div>
      <input type="submit" class="button" value="送信">
      <input type="submit" name="back" class="back" value="修正する">
    </form>
    </div>
  </main>
</body>

</html>