<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム</title>
  <link rel="stylesheet" href="/css/reset">
  <link rel="stylesheet" href="/css/manage.css">
</head>

<body>
  <style>
    svg.w-5.h-5 {
      /*paginateメソッドの矢印の大きさ調整のために追加*/
      width: 30px;
      height: 30px;
    }
  </style>
  <main>
    <h2>管理システム</h2>
    <div class="search">
      <form action="/result" method="get">
        @csrf
        <table>
          <tr>
            <th>お名前</th>
            <td><input type="text" name="fullname" value="{{$fullname}}"></td>
            <th>性別</th>
            <td>
              <input type="radio" name="gender" value="" @if($gender==null) checked @endif><span class="gender_list">全て</span>
              <input type="radio" name="gender" value="1" @if($gender=='1' ) checked @endif><span class="gender_list">男性</span>
              <input type="radio" name="gender" value="2" @if($gender=='2' ) checked @endif><span class="gender_list">女性</span>
            </td>
          </tr>
          <tr>
            <th>登録日</th>
            <td>
              <input type="date" name="from_date" value="{{$from_date}}">
              <span class="range">~</span>
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
        <input type="submit" name="search" class="button" value="検索">
        <a href="/management" class="reset">リセット</a>
      </form>
    </div>
    <div class="results">
      @if($items != '')
      <table>
        <tr class="label_border">
          <td class="search_label">ID</td>
          <td class="search_label">お名前</td>
          <td class="search_label">性別</td>
          <td class="search_label">メールアドレス</td>
          <td class="search_label">ご意見</tdd class="search_label"
        </tr>
        @foreach($items as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->fullname}}</td>
          <td>@if($item->gender == '1')男性@elseif($item->gender == '2')女性@endif</td>
          <td>{{$item->email}}</td>
          <td class="opinion_td">
            <div id="short_text{{$item->id}}">{!! nl2br(e(\Illuminate\Support\Str::limit($item->opinion, 25, ""))) !!}@if(mb_strlen($item->opinion) >= 25)<a style="cursor: pointer;" onclick="open{{$item->id}}()">...</a>@endif</div>
          </td>
          <script lang="javascript" type="text/javascript">
            const short_text{{$item->id}} = document.getElementById('short_text{{$item->id}}');

            const open{{$item->id}} = () => {
              short_text{{$item->id}}.innerHTML = "{{$item->opinion}}";
              console.log(short_text{{$item->id}}.innerHTML);
            };
          </script>
          <td>
            <form action="/delete?id={{$item->id}}" method="post">
              @csrf
              <input type="submit" class="delete_btn" value="削除">
            </form>
          </td>
        </tr>
        @endforeach
        @if(count($items) >= 5)
        {{$items->appends(request()->input())->links()}}
        @else
        {{$items->links()}}
        @endif
        @elseif($items == '')
        <p style="display: none;">該当なし</p>
      </table>
      @endif
      @if($items2 != '')
      <table>
        <tr class="label_border">
          <td class="search_label">ID</td>
          <td class="search_label">お名前</td>
          <td class="search_label">性別</td>
          <td class="search_label">メールアドレス</td>
          <td class="search_label">ご意見</td>
        </tr>
        @foreach($items2 as $item2)
        <tr>
          <td>{{$item2->id}}</td>
          <td>{{$item2->fullname}}</td>
          <td>@if($item2->gender == '1')男性@elseif($item2->gender == '2')女性@endif</td>
          <td>{{$item2->email}}</td>
          <td class="opinion_td">
            <div id="short_text{{$item2->id}}">{!! nl2br(e(\Illuminate\Support\Str::limit($item2->opinion, 25, ""))) !!}@if(mb_strlen($item2->opinion) >= 25)<a style="cursor: pointer;" onclick="open{{$item2->id}}()">...</a>@endif</div>
          </td>
          <script lang="javascript" type="text/javascript">
            const short_text{{$item2->id}} = document.getElementById('short_text{{$item2->id}}');

            const open{{$item2->id}} = () => {
              short_text{{$item2->id}}.innerHTML = "{{$item2->opinion}}";
              console.log(short_text{{$item2->id}}.innerHTML);
            };
          </script>
          <td>
            <form action="/delete?id={{$item2->id}}" method="get">
              @csrf
              <input type="submit" value="削除">
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      @endif
    </div>
  </main>
</body>

</html>