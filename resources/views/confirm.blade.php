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
  margin-bottom:20px;
}
.links{
  display:flex;
  justify-content: center;
}
.link{
  margin-left:10px;
  margin-right:10px;
}
.content{
  /* margin:auto; */
  text-align:left;
  width:380px;
  margin: 10px auto 10px auto;
}
.subtitle{
  font-weight:bold;
  margin-bottom:8px;
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
.listup{
  display:flex;
  justify-content: center;
  margin-bottom:20px;
}
.inner{
  margin:0 100px 0 100px;
}
.item{
  display:flex;
  justify-content: center;
  font-size:14px;
font-weight:bold;
margin-bottom:20px;
}

#title{
  font-weight:bold;
  text-align:center;
}
.button-outline{
  text-align:center;
  /* justify-content: center; */
}

.button{
  width:80px;
  height:30px;
  background-color:white;
  /* justify-content: center; */
  text-align: center;
  border: 1px solid;
  margin-bottom:20px;
  border-radius:0.25em;
}

</style>
<p id="title">
      入力内容確認
    </p>
<form  action="{{ route('engineers.store')}}" method="POST" class="" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- <input type="hidden" name="_token" value="{{ old('last_name') }}"> -->
   <!-- <div class="form-group @if($errors->has('username')) has-error @endif"> -->
   <div class="listup"> 
    <div class="inner">
        <label class="item" for="">氏名</label>
      <div class="name">{{$engineers->last_name}}{{$engineers->first_name}}</div>  

        <label class="item" for="">フリガナ</label>
      <div class="name">{{$engineers->last_name_furigana}}{{$engineers->first_name_furigana}}</div> 
      
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">性別</label>
      <div class="name">{{$engineers->gender}}</div>  


      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">生年月日</label>
        <?php $birthday = new DateTime($engineers->birth_date);?>
      <div class="name">{{$birthday->format('Y年m月d日')}}</div>  
    </div>

    <div class="inner">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">メールアドレス</label>
      <div class="name">{{$engineers->email}}</div>  

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">電話番号</label>
      <div class="name">{{$engineers->tel}}</div>  

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">郵便番号</label>
      <div class="name">{{$engineers->postal_code}}</div>  

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">住所</label>
      <div class="name">{{$engineers->address}}</div>  

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">最寄り駅</label>
      <div class="name">{{$engineers->closest_station}}</div>  

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="item" for="">最終学歴</label>
      <div class="name">{{$engineers->educational_background}}</div>

      <input type="hidden" name="_token" value="{{ csrf_token() }}" type="file">
        <label class="item" for="">履歴書</label>
      <div class="name">{{$engineers->resume}}</div>

      <input type="hidden" name="_token" value="{{ csrf_token() }}" type="file">
        <label class="item" for="">職務経歴書</label>
      <div class="name">{{$engineers->job_history_sheet}}</div>

    </div>
   </div>

  <div class="button-outline">
    <div class="">
      <input type="button" onclick="history.back()" value="修正" class="button" />
    </div>
    <div class="">
      <input type="submit" value="登録" class="button" />
    </div> 
  </div>
</form>



<!-- これが無いとheaderが下になってしまう -->
 @endsection
