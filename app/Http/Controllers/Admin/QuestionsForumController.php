<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuestionForum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.question_forum.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionForum $questionForum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionForum $questionForum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionForum $questionForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionForum  $questionForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionForum $questionForum)
    {
        //
    }
}
