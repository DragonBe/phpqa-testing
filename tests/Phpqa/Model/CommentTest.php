<?php
namespace Phpqa\Tests\Model;

use Phpqa\Model\Comment;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider goodDataProvider
     */
    public function testModelIsPopulatedAtConstruct($data)
    {
        $comment = new Comment($data);
        $this->assertSame($data['commentId'], $comment->getCommentId());
        $this->assertSame($data['fullName'], $comment->getFullName());
        $this->assertSame($data['emailAddress'], $comment->getEmailAddress());
        $this->assertSame($data['website'], $comment->getWebsite());
        $this->assertSame($data['comment'], $comment->getComment());
    }

    /**
     * Provides data that we consider to be safe and of quality
     * @return array
     */
    public function goodDataProvider()
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for ($iter = 0; $iter < 50; $iter++) {
            $data[] = [
                'commentId' => rand(1, time()),
                'fullName' => $faker->name,
                'emailAddress' => $faker->email,
                'website' => $faker->url,
                'comment' => $faker->text(),
            ];
        }
        return $data;
    }
}