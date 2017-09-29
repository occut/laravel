<?php

namespace App\Http\Controllers\Admin;

use \App\Functions\Category;
use App\Model\AdminNodes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminNodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Node = AdminNodes::orderBy('sortid','asc');
        $result = $Node->get()->toArray();
        $result = Category::child($result,0,'node_id','pid');
//        dump($result);die;
        return view('Admin/Administrators/AdminNodesindex',['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //node_id
        $node_id = $request->get('node_id',0);
        if ($node_id != 0){
//            $Node = AdminNodes
        }
        return view('Admin/Administrators/AdminNodescreate',['node_id'=>$node_id]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
