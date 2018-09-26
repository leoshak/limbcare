<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuestionsForum;
use App\Models\Reply ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Qeestionval;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Qeestionupdateval;
use App\Http\Requests\Replyval;
use File;
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
    public function store(Qeestionval $request,QuestionsForum $ques)
    {
        $lastid=0;
        $name='nophoto';
       if(!($request->qu_pic)==0)
       {
        $file=$request ->file('qu_pic');
       $type=$file->guessExtension();
       
        // DB::insert('INSERT INTO `queston` ( `question_title`, `question_type`, `Queston`, `question_pic`) VALUES  ( ?,?, ?,?)',[ $request['qu_title'],$request['qu_type'],$request['question'],$name]);
        $ques->questionTitle = $request->get('qu_title');
        $ques->question = $request->get('question');
        $ques->questionType = $request->get('qu_Type');
        $ques->questionAsk = $request->get('qu_Ask');
        $ques->save();
        $Questions = DB::select('select * from service ORDER BY id DESC LIMIT 1');
        $type=$file->guessExtension();
        $lastid = 0;
        foreach($Questions as $Question)
        {
            $lastid=$Question->id;

        }
        $name=$lastid."pic.".$type;
        $file->move('image/question/pic',$name);
        $ques->questionPic=$name;
        $ques->save();
        return view('admin.question_forum.success');
        }
       
        $ques->questionTitle = $request->get('qu_title');
        $ques->question = $request->get('question');
        $ques->questionType = $request->get('qu_Type');
        $ques->questionAsk = $request->get('qu_Ask');
        $ques->questionPic=$name;
        $ques->save(); 
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
        ['questionsforum' => $questionsforum];
        $qid=$questionsforum->id;
        $Question=DB::select('select * from question where id ='.$qid);
        foreach($Question as $Questions)
        {
        $question=$Questions->question;
        $questionType=$Questions->questionType;
        $questionAsk=$Questions->questionAsk;
        $questionTitle=$Questions->questionTitle;
        }
         $replys=DB::select('select * from reply where questionId ='.$qid);
        return view('admin.question_forum.show',compact('replys'),compact('Question'));
    }
    public function reply(QuestionsForum $questionsforum)
    {
        ['questionsforum' => $questionsforum];
        $qid=$questionsforum->id;
        $Question=DB::select('select * from question where id ='.$qid);
        foreach($Question as $Questions)
        {
        $question=$Questions->question;
        $questionType=$Questions->questionType;
        $questionAsk=$Questions->questionAsk;
        $questionTitle=$Questions->questionTitle;
        }
         $replys=DB::select('select * from reply where questionId ='.$qid);
         return view('admin.question_forum.reply',compact('replys'),compact('Question'));
    }
    
    public function addreplye(Replyval $request,Reply $replyA)
    {
        $lastid=0;
        $name='nophoto';
       if(!($request->rep_pic)==0)
       {
        $file=$request ->file('rep_pic');
       $type=$file->guessExtension();
       
        // DB::insert('INSERT INTO `queston` ( `question_title`, `question_type`, `Queston`, `question_pic`) VALUES  ( ?,?, ?,?)',[ $request['qu_title'],$request['qu_type'],$request['question'],$name]);
        $replyA->replay = $request->get('replye');
        $replyA->replier_ID = $request->get('relier');
        $replyA->questionId = $request->get('q_id');
        $replyA->save();
        $replys = DB::select('select * from service ORDER BY id DESC LIMIT 1');
        $type=$file->guessExtension();
        $lastid = 0;
        foreach($replys as $replyst)
        {
            $lastid=$replyst->id;

        }
        $name=$lastid."pic.".$type;
        $file->move('image/reply/pic',$name);
        $replyA->replay_pic=$name;
        $replyA->save();
        return view('admin.question_forum.success');
        }
       
        $replyA->replay = $request->get('replye');
        $replyA->replier_ID = $request->get('relier');
        $replyA->questionId = $request->get('q_id');
        $replyA->replay_pic=$name;
        $replyA->save();
        return view('admin.question_forum.success');  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $Replye)
    {
        return view('admin.question_forum.edit',['replyx' => $Replye]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionForum  $questionForum 
     * @return \Illuminate\Http\Response
     */
    public function update(Replyval $request)
    {
         $reply1 = DB::select('select * from reply where id ='.$request['id']);
       
        $name='nophoto';
        $picd='null';
        foreach($reply1 as $replyt)
        {
            $replaye=$replyt->replay;
            $picd=$replyt->replay_pic;
        if(($request->rep_pic)==0)
       {
        
            if($replaye==$request['replye'])
            {
                $message = 'Nothing to update';
                return redirect()->intended(route('admin.question_forum.edit',[$request->id]))->with('message', $message);
            }
        
        
        DB::table('reply')
        ->where('id', $request['id'])
        ->update(['replay' =>$request['replye']]);
        return view('admin.question_forum.success');
         }
        }

        $lastid=0;
        $file=$request ->file('rep_pic');
        $type=$file->guessExtension();
        
         $lastid=$request['id'];
          $name=$lastid."pic.".$type;
       File::delete('image/reply/pic',$picd);
        $file->move('image/reply/pic',$name);
        
        DB::table('reply')
        ->where('id', $request['id'])
        ->update(['replay' =>$request['replye'],'replay_pic'=>$name]);
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
        DB::table('question')->where('id', $request['id'])->delete();
         return view('admin.question_forum.success');
    }
    public function search(Request $request)//Request $request, Employee $employee
    {
        $questionsforum = DB::table('question')->where('id', $request['search'])->orWhere('question', 'like', '%' . $request['search'] . '%')->get();

        return view('admin.question_forum.index', compact('questionsforum'));

    }
    
}
