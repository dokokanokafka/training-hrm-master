@extends('layouts.template')
@section('content')
<style>
.btn {
    border-radius: 10px;
    background-color: #55C501;
    padding: 2px 15px 2px 15px;
    margin:3px 0 3px 0;
    text-align: center;
    color: white;
    font-weight:bold;
}
button:focus {
	outline:0;
}
td, th {
padding: 8px; 
}
a{
text-decoration: none;
}
.content{ 
  margin-top:30px;
  margin-bottom:20px;
}
.top{
  /* display:flex;
  -webkit-justify-content: center; */
}
.name{
  text-align:center;
  font-weight:bold;
  font-size:18px;
  margin-bottom:20px;
}
.links{
  display:flex;
  justify-content: center;
}
.link{
  margin:auto;
  background:#EFEFEF;
  border: solid 1px ;
  width:130px;
  justify-content: center;
  border-radius: 10px;
}
.content{
  text-align:center;
  width:380px;
  margin: 10px auto 10px auto;
}

.article{
  margin-bottom:4px;
}
.document{
  margin:20px 150px 0 150px;
  font-weight:bold;
} 
.document-content{
  padding:80px 60px 80px 60px;
  margin:10px 90px 0 90px;
  font-weight:bold;
  border: solid 1px ;
} 
.item{
padding-top:10px;
text-align:none;
color:black;
/* margin-bottom:8px; */
/* margin-top:10px; */
}
.item-list{
  text-align:left;
  padding-left:86px;
}
.require{
  background-color:red;
  color:white;
  margin:0 10px 10px 5px;
  font-size:10px;
  padding:2px 8px 2px 8px;
  border-radius:0.25em;
  font-weight:bold;
}
.form{
padding:6px;
border-radius:0.25em;
border: 1px solid;
width:200px;
height:20px;
margin-bottom:12px;
margin-top:8px;
}
.select{
  width:200px;
  padding:6px 0 8px 8px;
  margin-top:8px;
}

.document{
  display:flex;
  justify-content: center;
  margin-bottom:30px;
}
.document-inner{
  padding:0 20px 0 20px;
}

.next{
  width:140px;
  height:30px;
  background-color:white;
  /* justify-content: center; */
  text-align: center;
  border: 1px solid;
  margin-bottom:50px;
  border-radius:0.25em;
}
.gender{
  margin-bottom:12px;
}
.link{
  margin-bottom:10px;
}

</style>

<div class="content">
    <h1>
      編集画面
    </h1>
    <a href="{{ url("/engineers/{$engineers->id}") }}">詳細画面に戻る</a><br><br>
  <form  action="{{ route('engineers.update',$engineers->id)}}" method="POST" class="">
  @csrf

    <div class="item-list">
      <label class="item" for="">苗字</label>
      <span class="require">必須</span>
        @if($errors->has('last_name'))
          <span class="text-danger">
            <font size="2" color="red">
              {{ $errors->first('last_name') }}
            </font>
          </span> 
        @endif
    </div>
    <input type="text" class="form" id="" name="last_name" placeholder="苗字" value="{{ $engineers->last_name }}">

      <div class="item-list">
        <label class="item" for="">名前</label>
        <span class="require">必須</span>
        @if($errors->has('first_name'))
          <span class="text-danger">
            <font size="2" color="red">
              {{ $errors->first('first_name') }}
            </font>
          </span> 
        @endif
      </div>
        <input type="text" class="form" id="" name="first_name" placeholder="名前" value="{{ $engineers->first_name }}">

    <div class="item-list">
      <label class="item" for="">フリガナ(苗字)</label>
      <span class="require">必須</span>
        @if($errors->has('last_name_furigana'))
          <span class="text-danger">
            <font size="2" color="red">
              {{ $errors->first('last_name_furigana') }}
            </font>
          </span> 
        @endif
    </div>
    <input type="text" class="form" id="" name="last_name_furigana" placeholder="フリガナ(苗字)" value="{{ $engineers->last_name_furigana }}">

    <div class="item-list">
      <label class="item" for="">フリガナ(名前)</label>
      <span class="require">必須</span>
        @if($errors->has('first_name_furigana'))
          <span class="text-danger">
            <font size="2" color="red">
              {{ $errors->first('first_name_furigana') }}
            </font>
          </span> 
        @endif
      </div>
    <input type="text" class="form" id="" name="first_name_furigana" placeholder="フリガナ(名前)" value="{{ $engineers->first_name_furigana }}">

    <div class="gender">
      <div class="item-list">
          <label class="item" for="">性別</label>
      </div>
      <select name="gender" class="select">
          <?php $gender = $engineers->gender ?>
          <option value="{{ "男" }}" @if($gender === "男") selected @endif >男性</option>
          <option value="{{ "女" }}" @if($gender === "女") selected @endif >女性</option>
          <!-- この方法でも可能 -->
          <!-- <option value="男"> <?php/* if($gender === "男"){print "selected";} */?>>男性</option> -->
          <!-- <option value="女"<?php/* if($gender === "女"){print "selected";} */?>女性</option> -->
      </select>   
    </div>

    <div class="item-list">
      <label class="item" for="">生年月日</label>
      <span class="require">必須</span>
        @if($errors->has('birth_date'))
          <span class="text-danger">
            <font size="2" color="red">
              {{ $errors->first('birth_date') }}
            </font>
          </span> 
        @endif
    </div>
        <input type="text" class="form" id="" name="birth_date" placeholder="生年月日" value="{{ $engineers->birth_date}}">

    <div class="item-list">
      <label class="item" for="">メールアドレス</label>
      <span class="require">必須</span>
      @if($errors->has('email'))
          <span class="text-danger">
            <font size="2" color="red">
              {{ $errors->first('email') }}
            </font>
          </span> 
        @endif
    </div>
      <input type="text" class="form" id="" name="email" placeholder="メールアドレス" value="{{ $engineers->email }}">

    <div class="item-list">
      <label class="item" for="">電話番号</label>
      @if($errors->has('tel'))
          <span class="text-danger">
            <font size="2" color="red">
              {{ $errors->first('tel') }}
            </font>
          </span> 
        @endif
    </div>
      <input type="text" class="form" id="" name="tel" placeholder="電話番号" value="{{ $engineers->tel }}">

    <div class="item-list">
      <label class="item" for="">郵便番号</label>
    </div>
      <input type="text" class="form" id="" name="postal_code" placeholder="郵便番号" value="{{ $engineers->postal_code}}">

    <div class="item-list">
      <label class="item" for="">住所</label>
    </div>
      <input type="text" class="form" id="" name="address" placeholder="住所" value="{{ $engineers->address }}">

    <div class="item-list">
      <label class="item" for="">最寄り駅</label>
    </div>
      <input type="text" class="form" id="" name="closest_station" placeholder="最寄り駅" value="{{ $engineers->closest_station }}">

    <div class="item-list">
      <label class="item" for="">最終学歴</label>
    </div>
      <input type="text" class="form" id="" name="educational_background" placeholder="最終学歴" value="{{ $engineers->educational_background }}">

    <div class="document">
      <div class="document-inner">
        <label class="" for="">履歴書</label><br>
        <input type="file" value="" name="resume"><br>
      </div>

        <div class="document-inner">
      <label class="" for="">職務経歴書</label><br>
        <input type="file" value="" name="job_history_sheet">
      </div>
    </div>
    <input type="submit" value="修正" class="next" >
  </form>

</div>

<!-- これが無いとheaderが下になってしまう -->
 @endsection
