@extends('layouts.header')
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
.pagination{
    list-style:none;
    display:flex;
    /* text-align: center; */
    margin: 0 auto;
}
a{
text-decoration: none;
}
.content{
  margin-top:30px;
  margin-bottom:20px;
}
</style>
     <!-- <form action="show" method="GET" class=""> -->
     <a href="{{ url('/index') }}">全て表示</a>
     <!-- {{ csrf_field() }} -->
     <!-- <input type="submit" value="全て表示" > -->
    </a>
                                <!-- </button> -->
                                </form>
                        
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
                    <td></td>
                    <td>
                      <select name="">
                        <option value="select1">未分類</option>
                        <option value="select2">離職中</option>
                        <option value="select3">就職中</option>
                        <option value="select4">ハコブネ就職中</option>
                      </select>
                    </td>
                    <td>{{$engineer->last_name}}{{$engineer->first_name}}</td>
                    <td></td>
                    <td>{{$engineer->gender}}</td>
                    <td>
                      <select name="">
                        <option value="select1">未分類</option>
                        <option value="select2">稼働中</option>
                        <option value="select3">研修中</option>
                        <option value="select4">営業中</option>
                      </select>
                    </td>
                    <td></td>
                    <td>
                      <select name="">
                        <option value="select1">Excellent</option>
                        <option value="select2">Good</option>
                        <option value="select3">Fair</option>
                      </select>
                    </td>
                    <td>
                      <select name="">
                        <option value="select1">Excellent</option>
                        <option value="select2">Good</option>
                        <option value="select3">Fair</option>
                      </select>
                    </td>
                    
                    <td><button type="button" class="btn">DL</button></td>
                    <td><button type="button" class="btn">DL</button></td>
                    <td>{{$engineer->comment}}</td>
                  </tr>
                   @endforeach
                 </table>
            </div>
            <!-- ペジネーション -->
            <div class="paginate">
            {{ $engineers->links()}}
            </div>
<!-- これが無いとheaderが下になってしまう -->
 @endsection
