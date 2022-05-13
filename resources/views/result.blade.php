<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム-検索結果</title>
</head>

<body>
  <main>
    <h2>管理システム</h2>
    <div class="search">
      <form action="/result" method="post">
        @csrf
        <table>
          <tr>
            <th>お名前</th>
            <td><input type="text" name="fullname" value="{{$fullname}}"></td>
            <th>性別</th>
            <td>
              <input type="radio" name="gender0" value="">全て
              <input type="radio" name="gender1" value="{{$male}}">男性
              <input type="radio" name="gender2" value="{{$female}}">女性
            </td>
          </tr>
          <tr>
            <th>登録日</th>
            <td>
              <input type="date" name="from_date" value="{{$from_date}}">
              <span>~</span>
              <input type="date" name="until_date" value="{{$until_date}}">
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>
              <input type="text" name="email" value="{{$email}}">
            </td>
          </tr>
        </table>
        <input type="submit" value="検索">
        <p><a href="">リセット</a></p>
      </form>
    </div>
    <div class="result">
      <table>
        @if(@isset($items))
        <tr>
          <th>ID</th>
          <th>お名前</th>
          <th>性別</th>
          <th>メールアドレス</th>
          <th>ご意見</th>
        </tr>
        @foreach($items as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->fullname}}</td>
          <td>@if($item->gender == '1')男性@elseif($item->gender == '2')女性@endif</td>
          <td>{{$item->email}}</td>
          <td>{{$item->opinion}}</td>
          <td>
            <form action="/delete?id={{$item->id}}" method="post">
              @csrf
              <input type="submit" value="削除">
            </form>
          </td>
        </tr>
        @endforeach
        @endif
      </table>
    </div>
  </main>
</body>

</html>