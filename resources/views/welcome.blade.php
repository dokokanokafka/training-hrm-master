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

.content{
    text-align: center;
  justify-content: center;
  width:380px;
  /* margin: 10px auto 10px auto; */
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
#title{
  font-weight:bold;
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

.gender{
  margin-bottom:12px;
}
.link-cover{
  text-align: center;
  justify-content: center;

}
.link{
  margin-top:60px;
  margin-bottom:60px;
  margin-left:auto;
  margin-right:auto;
  padding:16px 30px 16px 30px;
  background:#FFFFFF;
  border: solid 0.15em ;
  /* border: solid 1px ; */
  width:130px;
  border-radius: 10px;
  color:black;
}


</style>

<div class="content">
    <p id="title">
      トップ画面
    </p>

<div class="link-cover">
<div class="link" onclick="location.href='/engineers'">
一覧
</div>

<div class="link" onclick="location.href='/engineers/create'">
新規作成
</div>


</div>


<!-- これが無いとheaderが下になってしまう -->
 @endsection
