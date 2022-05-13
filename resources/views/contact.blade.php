<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/contact.css">
</head>

<body>
  <main>
    <div class="contact">
      <h2>お問い合わせ</h2>
      <form action="/confirm" method="POST">
        @csrf
        <div class="contact_input">
          <table>
            <tr>
              <th>お名前<span>※</span></th>
              <td>
                <input type="text" name="fullname" value="{{old('fullname')}}" autofocus>
              </td>
            </tr>
            @error('fullname')
            <tr>
              <th></th>
              <td class="error">{{$message}}</td>
            </tr>
            @enderror
            <tr>
              <th></th>
              <td class="example">例）山田太郎</td>
            </tr>
            <tr>
              <th>性別<span>※</span></th>
              <td>
                <input type="radio" name="gender" value='1' {{old('gender', '1') == '1' ? 'checked' : ''}}><label>男性</label>
                <input type="radio" name="gender" value='2' {{old('gender') == '2' ? 'checked' : ''}}> <label>女性</label>
              </td>
            </tr>
            <tr>
              <th></th>
              <td class="example"></td>
            </tr>
            <tr>
              <th>メールアドレス<span>※</span></th>
              <td>
                <input type="email" name="email" value="{{old('email')}}">
              </td>
            </tr>
            @error('email')
            <tr>
              <th></th>
              <td class="error">{{$message}}</td>
            </tr>
            @enderror
            <tr>
              <th></th>
              <td class="example">例）test@example.com</td>
            </tr>
            <tr>
              <th>郵便番号<span>※</span></th>
              <td>
                <p class="post_mark">〒<input type="text" name="postcode" onkeyup="AjaxZip3.zip2addr('postcode', '', 'address', 'address');" value="{{old('postcode')}}" inputmode="url"></p>
              </td>
            </tr>
            @error('postcode')
            <tr>
              <th></th>
              <td class="error">{{$message}}</td>
            </tr>
            @enderror
            <tr>
              <th></th>
              <td class="example">例）123-4567</td>
            </tr>
            <tr>
              <th>住所<span>※</span></th>
              <td>
                <input type="text" name="address" value="{{old('address')}}">
              </td>
            </tr>
            @error('address')
            <tr>
              <th></th>
              <td class="error">{{$message}}</td>
            </tr>
            @enderror
            <tr>
              <th></th>
              <td class="example">例）東京都渋谷区千駄ヶ谷1-2-3</td>
            </tr>
            <tr>
              <th>建物名</th>
              <td>
                <input type="text" name="building_name" value="{{old('building_name')}}">
              </td>
            </tr>
            @error('building_name')
            <tr>
              <th></th>
              <td class="error">{{$message}}</td>
            </tr>
            @enderror
            <tr>
              <th></th>
              <td class="example">例）千駄ヶ谷マンション101</td>
            </tr>
            <tr>
              <th><p class="opinion">ご意見<span>※</span></p></th>
              <td>
                <textarea name="opinion" cols="30" rows="10">{{old('opinion')}}</textarea>
              </td>
            </tr>
            @error('opinion')
            <tr>
              <th></th>
              <td class="error">{{$message}}</td>
            </tr>
            @enderror
          </table>
          <input type="submit" class="button" value="確認">
        </div>
      </form>
    </div>
  </main>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</body>

</html>