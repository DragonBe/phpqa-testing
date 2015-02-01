<?php
namespace Phpqa\Tests\Model;

use Phpqa\Model\Comment;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    public function testModelIsPopulatedAtConstruct()
    {
        $data = [
            'commentId'    => 1,
            'fullName'     => 'Johny Test',
            'emailAddress' => 'johny.test@example.com',
            'website'      => 'http://johnytest.com',
            'comment'      => 'This is a comment',
        ];

        $comment = new Comment($data);
        $this->assertSame($data['commentId'], $comment->getCommentId());
        $this->assertSame($data['fullName'], $comment->getFullName());
        $this->assertSame($data['emailAddress'], $comment->getEmailAddress());
        $this->assertSame($data['website'], $comment->getWebsite());
        $this->assertSame($data['comment'], $comment->getComment());
    }
}