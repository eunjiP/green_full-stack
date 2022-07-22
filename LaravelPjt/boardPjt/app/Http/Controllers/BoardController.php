<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    // p.77 라우트명의 관례
    //all - 전체 / orderBy - 정렬 등 다양하게 쿼리문 수정해서 가지고 올 수 있음
    public function index() {
        //원하는 정보만 선택해서 가지고 올 수 있다
        $list = Board::select(['id', 'title', 'hits', 'created_at'])->orderBy('id', 'desc')->get();
        return view('board/index')->with('list', $list);
    }

    public function create() {
        return view('board/create');
    }

    //Request : 값 가지고 오는 것
    public function store(Request $req) {
        $board = new Board([
            "title" => $req->input('title'),
            "ctnt" => $req->input('ctnt'),
            "hits" => 0
        ]);
        //내용저장해줌
        $board->save();
        //리다이렉트
        return redirect('/boards');
    }

    public function show(Request $req) {
        $id = $req->input('id');
        $board = Board::find($id);
        $board->hits++;
        $board->save();
        return view('board/show')->with('data', Board::findOrFail($id));
    }

    public function edit(Request $req) {
        $id = $req->input('id');
        return view('board/create')->with("data", Board::findOrFail($id));
    }

    public function update(Request $req) {
        $id = $req->input('id');
        $board = Board::findOrFail($id);
        $board->title = $req->input('title');
        $board->ctnt = $req->input('ctnt');
        $board->save();
        return redirect()->route('boards.show', ['id' => $id]);
    }

    public function destroy(Request $req) {
        $id = $req->input('id');
        //find : where절에서 id값을 넣어서 찾아서 삭제해주는 것
        Board::find($id)->delete();
        return redirect('/boards');
    }
}

