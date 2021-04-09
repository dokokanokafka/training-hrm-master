@extends('layouts.template')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
.btn_id {
    /* border-radius: 10px; */
    width:50px;
    background-color: #347AB7;
    padding: 2px 15px 2px 15px;
    margin:3px 0 3px 0;
    text-align: center;
    color: white;
    font-weight:bold;
}
button:focus {
	outline:0;
}
.index{
  text-align:right;
  margin-right:36px;
}
td, th {
padding: 8px; 
}
.pagination{
    list-style:none;
    display:flex;
    /* flexboxで中央寄せ */
    -webkit-justify-content: center;
}
a{
text-decoration: none;
}
.content{
  margin-top:20px;
  margin-bottom:20px;
}
select{
  padding:1px 0 3px 0 ;
}
.function{
  display:flex;
  justify-content: flex-end;
  /* margin-right:36px; */
}
.function-inner{
  margin-left:30px;
}
</style>
     <div class="index">
     <div class="function">
     <div class="function-inner">
     <a href="{{ url('/engineers/create') }}">新規登録</a>
     </div>
     <div class="function-inner">
     <a href="{{ url('/engineers') }}">全て表示</a>
     </div>
     </div>
            <div class="content">
                <table border="1px" cellspacing="0" align="center">
                  <tr>     
                    <th>ID</th>
                    <th>就職状態</th>
                    <th>名前</th>
                    <th>年齢</th>
                    <th>性別</th>
                    <th>採用状態</th>
                    <th>地域</th>
                    <th>エンジニアスキル</th>
                    <th>ヒューマンスキル</th>
                    <th>履歴書</th>
                    <th>職務経歴書</th>
                    <th>メモ</th>
                  </tr>
                  @foreach ($engineers as $engineer)
                  <tr>
                    <td>
                        <a href="{{ route('engineers.show',$engineer->id)}}" >
                    <button type="button" class="btn_id">
                        {{$engineer->id}}
                        </button>
                        </a>
                    </td>
                    <td>
                    <!-- <form  action="/engineers/status" method="get" class="" enctype="multipart/form-data"> -->
                    <!-- <form  name="form1" action="#" method="POST" class="" enctype="multipart/form-data"> -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <!-- <select id="selectbox" data-id="{{$engineer->id}}"onchange="select(this)">                         -->
                      <select id="selectbox" data-id="{{$engineer->id}}" data-int=1 onchange="select(this)">                        
                        <?php $employment_status_id  = $engineer->employment_status_id  ?>
                        <option value="1" @if($employment_status_id  === "1") selected @endif >未分類</option>
                        <option value="2" @if($employment_status_id  === "2") selected @endif >離職中</option>
                        <option value="3" @if($employment_status_id  === "3") selected @endif >就職中</option>
                        <option value="4" @if($employment_status_id  === "4") selected @endif >ハコブネ就職中</option>

                      </select>
                      <!-- </form> -->
                      <!-- <p class="log"></p> -->
                    </td>
                    <td>{{$engineer->last_name}}{{$engineer->first_name}}</td>
                    <td>{{$engineer->age}}</td>
                    <td>{{$engineer->gender}}</td>
                    <td>
                      <select id="selectbox" data-id="{{$engineer->id}}" data-int=2 onchange="select(this)">
                      <?php $inhouse_status_id = $engineer->inhouse_status_id ?>                        
                        <option value="{{ "select1" }}" @if($inhouse_status_id === "select1") selected @endif >未分類</option>
                        <option value="{{ "select2" }}" @if($inhouse_status_id === "select2") selected @endif >稼働中</option>
                        <option value="{{ "select3" }}" @if($inhouse_status_id === "select3") selected @endif >研修中</option>
                        <option value="{{ "select4" }}" @if($inhouse_status_id === "select4") selected @endif >営業中</option>
                      </select>
                    </td>
                    <td></td>
                    <td>
                      <select id="selectbox" data-id="{{$engineer->id}}" data-int=3 onchange="select(this)">
                      <?php $engineer_skill_id = $engineer->engineer_skill_id ?>                        
                        <option value="{{ "select1" }}" @if($engineer_skill_id === "select1") selected @endif >Excellent</option>
                        <option value="{{ "select2" }}" @if($engineer_skill_id === "select2") selected @endif >Good</option>
                        <option value="{{ "select3" }}" @if($engineer_skill_id === "select3") selected @endif >Fair</option>
                      </select>
                    </td>
                    <td>
                      <select id="selectbox" data-id="{{$engineer->id}}" data-int=4 onchange="select(this)">
                      <?php $human_skill_id = $engineer->human_skill_id ?>                        
                        <option value="{{ "select1" }}" @if($human_skill_id === "select1") selected @endif >Excellent</option>
                        <option value="{{ "select2" }}" @if($human_skill_id === "select2") selected @endif >Good</option>
                        <option value="{{ "select3" }}" @if($human_skill_id === "select3") selected @endif >Fair</option>
                      </select>
                    </td>
                    
                    <td><button type="button" class="btn">DL</button></td>
                    <td><form action="{{ url('engineers/download') }}">
            <button type="button" class="btn">DL</button></form></td>
                    <td><input type="text" id="comment" name="comment" size="15" maxlength="100" >{{$engineer->comment}}</td>
                  </tr>
                   @endforeach
                 </table>
            </div>
            <!-- ペジネーション -->
            <div class="paginate">
            {{ $engineers->links()}}
            </div>

    <script>

      function select(obj) {
        
        // POSTメソッドで送信するデータ
        var data = {
          id:obj.getAttribute('data-id'),
          int:obj.getAttribute('data-int'),
          value:obj.value
        };
        
        console.log( data);
        
        
        var xmlHttpRequest = new XMLHttpRequest();
        xmlHttpRequest.onreadystatechange = function()
        {
          var READYSTATE_COMPLETED = 4;
          var HTTP_STATUS_OK = 200;
          
          if( this.readyState == READYSTATE_COMPLETED
          && this.status == HTTP_STATUS_OK )
          {
            // レスポンスの表示
            // alert( this.responseText );
          }
        }
        
       
        // xmlHttpRequest.open( 'POST', '/engineers/status' );
        xmlHttpRequest.open( 'POST', '/engineers' );
        
        var token = document.getElementsByName('csrf-token').item(0).content; // 追加

        // サーバに対して解析方法を指定する
        xmlHttpRequest.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
        
        xmlHttpRequest.setRequestHeader('X-CSRF-Token', token); // 追加

        // データをリクエスト ボディに含めて送信する
        xmlHttpRequest.send( EncodeHTMLForm( data ) );
      } 
      // HTMLフォームの形式にデータを変換     
      function EncodeHTMLForm( data )
      {
          var params = [];

          for( var name in data )
          {
              var value = data[ name ];
              var param = encodeURIComponent( name ) + '=' + encodeURIComponent( value );

              params.push( param );
          }

          return params.join( '&' ).replace( /%20/g, '+' );
      }


    //   function clickBtn1(){
    //   var a = document.getElementById( "comment" ).value ;
    //   console.log(a);
    // }
  //     window.onload=function(){
  // document.getElementById("comment").addEventListener('keydown',function(){
  //   console.log(event.keyCode);
  // });

  // window.addEventListener('keydown', e => {
  //   console.log(e.key);
  // });
//   var inputElement = document.getElementById("comment");
// // キー入力と同時にイベントが発生
// inputElement.addEventListener('comment', (event) => {
//   var inputValue = document.getElementById("comment").value;
//   console.log(inputValue);
//   // 処理内容
// });

// function alertValue($this) {
//     $this.nextSibling.innerHTML = $this.value;
// }


const input = document.querySelector('input');
const log = document.getElementById('values');

input.addEventListener('input', updateValue);

function updateValue(e) {
  log.textContent = e.target.value;
}


// var data = {
//           id:obj.getAttribute('data-id'),
//           int:obj.getAttribute('data-int'),
//           value:obj.value
//         };
        
//         console.log( data);


  </script>
                <!-- これが無いとheaderが下になってしまう -->
 @endsection
