<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, Topic $topic)
    {
        $topics = $topic->withOrder($request->order)->paginate();
        return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic', 'categories'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()->route('topics.show', $topic->id)->with('message', 'Created successfully.');
    }

    public function edit(Topic $topic)
    {
        try {
            $this->authorize('update', $topic);
        } catch (AuthorizationException $authorizationException) {
            abort(403, '你无权编辑此文件。');
        }


        return view('topics.create_and_edit', compact('topic'));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        try {
            $this->authorize('update', $topic);
        } catch (AuthorizationException $authorizationException) {
            abort(403, '你无权编辑此文件。');
        }

        $topic->update($request->all());

        return redirect()->route('topics.show', $topic->id)->with('message', 'Updated successfully.');
    }

    public function destroy(Topic $topic)
    {
        try {
            $this->authorize('destroy', $topic);
        } catch (AuthorizationException $authorizationException) {
            abort(403, '你想干啥呢？');
        }

        try {
            $topic->delete();
        } catch (\Exception $exception) {
            abort(500, '删除失败T_T');
        }


        return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
    }
}