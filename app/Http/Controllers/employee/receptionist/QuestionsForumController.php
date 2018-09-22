<?php

namespace App\Http\Controllers\employee\receptionist;

use App\Models\QuestionsForum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Qeestionval;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Qeestionupdateval;

class QuestionsForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questionsforum=QuestionsForum::all();
        return view('admin.question_forum.index',compact('questionsforum') );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question_forum.add');
    }
    public function add()
    {
        return view('admin.question_forum.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Qeestionval $request)
    {
        $lastid=0;
        $em=$request->qu_type;
        if($em=="")
        {
            $message = 'Nothig select in question type ';
            return redirect()->intended(route('admin.question_forum.add'))->with('message', $message);
              
        }
       if(!($request->qu_pic)==0)
       {
        $file=$request ->file('qu_pic');
       $type=$file->guessExtension();
       
       $Questions=QuestionsForum::all();
        foreach($Questions as $Question)
        {
            $lastid=$Question->id;
            
        }
        if ($lastid==0)
        {
            $lastid=0;
        }
        $lastid=$lastid+1;
        
        $name=$lastid."pic.".$type;
        $file->move('image/question/pic',$name);
        DB::insert('INSERT INTO `queston` ( `question_title`, `question_type`, `Queston`, `question_pic`) VALUES  ( ?,?, ?,?)',[ $request['qu_title'],$request['qu_type'],$request['question'],$name]);
        return view('admin.question_forum.success');
        }
       
        DB::insert('INSERT INTO `queston` ( `question_title`, `question_type`, `Queston`) VALUES  ( ?, ?,?)',[ $request['qu_title'],$request['qu_type'],$request['question']]);
        return view('admin.question_forum.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionsForum $questionsforum)
    {
        return view('admin.question_forum.show',['questionsforum' => $questionsforum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionsForum $questionsforum)
    {
        return view('admin.question_forum.edit',['questionsforum' => $questionsforum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function update(Qeestionupdateval $request)
    {
        $file1=$request['qurp1_pic'];
        $file2=$request['qurp2_pic'];
        $file3=$request['qurp3_pic'];
        $file4=$request['qurp4_pic'];
        $file5=$request['qurp5_pic'];
        
        $name1;
        $name2;
        $name3;
        $name4;
        $name5;
        $Questions=DB::select('select * from queston where id ='.$request['id']);
        foreach($Questions as $Question)
        {
            $name1=$Question->replay1_pic;
            $name2=$Question->replay2_pic;
            $name3=$Question->replay3_pic;
            $name4=$Question->replay4_pic;
            $name5=$Question->replay5_pic; 
        }

        if(!$file1==null)
        {
        $file=$request ->file('qurp1_pic');
        $type=$file->guessExtension();
       
        $id=$request['id'];
        
        $name1=$id."reply1.".$type;
        $file->move('image/question/reply/pic',$name1);
        // return $name1;
       }
        
        if(!($request->qurp2_pic)==0)
       {
        $file=$request ->file('qurp2_pic');
        $type=$file->guessExtension();
       
        $id=$request['id'];
        
        $name2=$id."reply2.".$type;
        $file->move('image/question/reply/pic',$name2);
        }
        if(!($request->qurp3_pic)==0)
       {
        $file=$request ->file('qurp3_pic');
        $type=$file->guessExtension();
       
        $id=$request['id'];
        
        $name3=$id."reply3.".$type;
        $file->move('image/question/reply/pic',$name3);
        }
        if(!($request->qurp4_pic)==0)
       {
        $file=$request ->file('qurp4_pic');
        $type=$file->guessExtension();
       
        $id=$request['id'];
        
        $name4=$id."reply4.".$type;
        $file->move('image/question/reply/pic',$name4);
        }
        if(!($request->qurp5_pic)==0)
       {
        $file=$request ->file('qurp5_pic');
        $type=$file->guessExtension();
       
        $id=$request['id'];
        
        $name5=$id."reply5.".$type;
        $file->move('image/question/reply/pic',$name5);
        }
        
        DB::table('queston')
        ->where('id', $request['id'])
        ->update(['replay1' =>$request['reply1'],'replay1_pic' =>$name1,'replay2' =>$request['reply2'],'replay2_pic' =>$name2,'replay3' =>$request['reply3'],'replay3_pic' =>$name3,'replay4' =>$request['reply4'],'replay4_pic' =>$name4,'replay5' =>$request['reply5'],'replay5_pic' =>$name5]);
        return view('admin.question_forum.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionsForum $questionsforum)
    {
        
        return view('admin.question_forum.delete',['questionsforum' => $questionsforum]);
    }
    
    public function qdelete(Request $request)//Request $request, Employee $employee
    {
        DB::table('queston')->where('id', $request['id'])->delete();
         return view('admin.question_forum.success');
    }
}
