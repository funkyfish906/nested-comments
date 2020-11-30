<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Comment;

/**
 * Class CommentObserver
 *
 * @package App\Observers
 */
class CommentObserver
{
    /**
     * @param \App\Models\Comment $comment
     *
     * @return void
     */
    public function deleting(Comment $comment): void
    {
        $comment->children->each(function ($child) {
            $child->delete();
        });
    }
}
