<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\View;

/**
 * Class CommentController
 *
 * @package App\Http\Controllers\Admin
 */
class CommentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): ViewContract
    {
        return View::make('comments');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(): JsonResponse
    {
        $comments = Comment::query()
            ->with('replies')
            ->where('parent_id', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return new JsonResponse(['list' => $comments]);
    }

    /**
     * @param \App\Http\Requests\StoreCommentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCommentRequest $request): JsonResponse
    {
        $input = $request->only('parent_id', 'comment');

        Comment::query()->create($input);

        return new JsonResponse(['message' => 'Comment was added successfully']);
    }

    /**
     * @param \App\Models\Comment $comment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Comment $comment): JsonResponse
    {
        $comment->delete();

        return new JsonResponse(['message' => 'Comment was deleted successfully']);
    }
}
