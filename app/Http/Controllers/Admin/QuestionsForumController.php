<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuestionsForum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
    {
        $qu=$request['question'];
        $r="'";
        DB::insert('INSERT INTO `queston` ( `Queston`, `replay1`, `replay2`, `replay3`, `replay4`, `replay5`) VALUES  ( ?,?, ?,?, ?,?)',[ $r.$qu.$r,'','','','','']);
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
    public function update(Request $request)
    {
        if($request['reply1']==null)
        {
            $request['reply1']="-empty-";
        }
        if($request['reply2']==null)
        {
            $request['reply2']="-empty-";
        }
        if($request['reply3']==null)
        {
            $request['reply3']="-empty-";
        }
        if($request['reply4']==null)
        {
            $request['reply4']="-empty-";
        }
        if($request['reply5']==null)
        {
            $request['reply5']="-empty-";
        }
        DB::table('queston')
        ->where('id', $request['id'])
        ->update(['replay1' =>$request['reply1'],'replay2' =>$request['reply2'],'replay3' =>$request['reply3'],'replay4' =>$request['reply4'],'replay5' =>$request['reply5']]);
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
