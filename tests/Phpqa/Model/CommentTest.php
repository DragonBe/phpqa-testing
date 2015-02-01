<?php
namespace Phpqa\Tests\Model;

use Phpqa\Model\Comment;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    public function testModelIsPopulatedAtConstruct()
    {
        $faker = \Faker\Factory::create();
        $data = [
            'commentId' => rand(1, time()),
            'fullName' => $faker->name,
            'emailAddress' => $faker->email,
            'website' => $faker->url,
            'comment' => $faker->text(),
        ];

        $comment = new Comment($data);
        $this->assertSame($data['commentId'], $comment->getCommentId());
        $this->assertSame($data['fullName'], $comment->getFullName());
        $this->assertSame($data['emailAddress'], $comment->getEmailAddress());
        $this->assertSame($data['website'], $comment->getWebsite());
        $this->assertSame($data['comment'], $comment->getComment());
    }
}