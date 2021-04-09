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
.item{
  /* margin:0 100px 0 100px; */
  display:flex;
  justify-content: center;
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

</style>
     <div>
        <div class="top">
         <div class="name">{{$engineers->last_name}}{{$engineers->first_name}}</div>
           <div class="links">
            <div class="link"><a href="{{ url("/engineers/{$engineers->id}/edit") }}">編集</a></div>
            <!-- <form action="/engineers/{{$engineers->id}}/edit/" method="POST">
  {{ csrf_field() }}
  <input type="submit" value="編集" class="">
  </form> -->
            <div class="link"><a href="{{ url('/engineers') }}">一覧</a></div>
            <form action="/engineers/delete/{{$engineers->id}}" method="POST">
  {{ csrf_field() }}
  <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
  </form>
        </div>
        </div>
     </div>
     <div class="content">
     <div class="inner">
        <div class="article">{{$engineers->gender}}</div>
        <?php $birthday = new DateTime($engineers->birth_date);?>
        <div class="article">{{$birthday->format('Y年m月d日')}}&emsp;{{$engineers->age}}歳</div>
        <div class="article">最終学歴:{{$engineers->educational_background}}</div><br>
        <div class="subtitle">連絡先</div>
        <div class="article">〒{{$engineers->postal_code}}</div>
        <div class="article">{{$engineers->address}}</div>
        <div class="article">{{$engineers->email}}</div>
        <div class="article">{{$engineers->tel}}</div><br>
        <div class="subtitle">メモ</div>
        <div class="article">{{$engineers->comment}}</div>
      </div>
    </div>
        <div class="item">
         <div class="document">履歴書</div>
         <div class="document">職務経歴書</div>
      </div>
    </div>
        <div class="item">
         <div class="document-content">履歴書</div>
         <div class="document-content">職務経歴書</div>
      </div>

  
  <script>
  // $(function(){
  // $(".btn-dell").click(function(){
  // if(confirm("本当に削除しますか？")){
  // //そのままsubmit（削除）
  // }else{
  // //cancel
  // return false;
  // }
  // });
  // });
  $('.btn-dell').click(function(){
    if(!confirm('本当に削除しますか？')){
        /* キャンセルの時の処理 */
        return false;
    }else{
        /*OKの時の処理 記述不要？なぜ？ */
        // location.href = 'index.html';
    }
});
  </script>

<!-- これが無いとheaderが下になってしまう -->
 @endsection
