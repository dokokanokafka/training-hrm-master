<?php

namespace App\Http\Controllers;
//connect model
use App\Engineer;
// use App\Employment_status;
use Illuminate\Http\Request;
use Carbon\Carbon;
// バリデーション用
use App\Http\Requests\EngineerFormRequest;



class EngineerController extends Controller
{
    public function index() {
        // DBからデータ取得する
        // $engineers = Engineer::all();
        // ペジネーション 但しid設定が不明なため、並び順はまだ未設定
        // idを降順で表示
        $engineers =  Engineer::orderBy('id', 'desc')->simplePaginate(10);
        // 順序指定なしの場合(普通に昇順の場合)
        // $engineers =  Engineer::simplePaginate(10);
        // キーはengineersにして$engineersを配列として渡す？
        return view('engineers', ['engineers' => $engineers]);
        // 参考：compactメソッドを使って書く方法
        // return view('engineers', compact('engineers'));
    }
    
    
    public function create(){
        // public function create(EngineerFormRequest $request){
            // バリデーション済みデータの取得
            //   $validated = $request->validated();
            
            return view('create');
            
        }

   // フォームリクエストを使ってπバリデーション     
        public function confirm(EngineerFormRequest $request){
   
        $engineers= new Engineer($request->all());
        
        // Serialization of 'Illuminate\Http\UploadedFile' is not allowed のエラー対策
        // $engineers= new Engineer($request->except(['resume', 'job_history_sheet']));
        // DD($engineers);
        
        //セッションに保存
        $request->session()->put('engineers', $engineers);
        
        return view('confirm', ['engineers' => $engineers]);
        
    }
        
    public function store(Request $request){
        // dd($_FILES);
        // dd($request->file('file'));
        // DD($request);
        // リソースコントローラーだけの場合これでOKだが・・・
        // Engineer::create($request->all());

        //セッションから取得
        $engineers = $request->session()->get('engineers');
        
        //DBへ保存
        // $engineers = $request->file('file')->store('engineers');

        $engineers->save();

    return redirect('/engineers');
        
    }
    
    // 詳細画面
    public function show(Request $request,$id){
    // この書き方でも通る
    // public function show($id){
        // 6/9MTG指摘
    // public function show(Request $request, Engineer $engineers){
    // DD($engineers);
        // $engineer = $engineers->find($id);
        $engineer = Engineer::findOrFail($id);
        // $engineer = Engineer::find($id);
        //参考:誕生日より年齢算出する方法
        // $age = Carbon::parse($engineers->birth_date)->age;
        // return view('show', ['engineers' => $engineers,'age' => $age]);
            
        // 参考:DBから受け取る記述方法
        // $birthday s=  $engineers->birth_date;
    
        return view('show', ['engineers' => $engineer]);
    }

    public function edit($id)
    {
        $engineers = Engineer::findOrFail($id);
        return view('edit', ['engineers' => $engineers]);
    }

   // フォームリクエストを使ってバリデーション     
    public function update(EngineerFormRequest $request, $id)
    // public function update(Request $request,$id)
    // public function update(EngineerFormRequest $request,$id)
    {
        $engineer = Engineer::findOrFail($id);
        $update = [
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'last_name_furigana' => $request->last_name_furigana,
            'first_name_furigana' => $request->first_name_furigana,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'postal_code' => $request->closest_station,
            'educational_background' => $request->educational_background,
            'resume' => $request->resume,
            'job_history_sheet' => $request->job_history_sheet,
        ];


        // 要修正 fillとsaveを使いたい
        Engineer::where('id', $id)->update($update);
        // return redirect('/engineers');
        return view('show', ['engineers' => $engineer]);
    }

    public function delete($id)//idが格納されてる
    {
        $engineer = Engineer::findOrFail($id);
        $engineer->delete();
        return redirect('/engineers');
    }

    public function download($id)
    {
        return Storage::download('file.jpg', $name, $headers);
    }


    public function status(Request $request)
    {

        // $employment_status =new app\Employment_status(['name' => '就業中']);

        // $post = App\Post::find(1);
        
        // $post->comments()->save($comment);

        // どこのidからなのかfindする(id自体は$requestで既に取れている)
        $engineer = Engineer::find($request->id);
        // テーブル内のカラムを定義
        $columns =[
            1 => "employment_status_id",
            2 => "inhouse_status_id",
            3 => "engineer_skill_id",
            4 => "human_skill_id",
        ];
        // ここが肝
        // リクエストからどのカラムが来たのががわかるよう
        // 変数に定義して格納する
        $key = $columns[$request->int];
                
        // リクエストからどの値が来たのががわかるよう
        // 変数に定義して格納する       
        $status = [
            $key => $request->value,
        ];

        $engineer->fill($status)->save();
        // $engineer->employment_statuses()->fill($status)->save();
        
        return ;
    }


}
