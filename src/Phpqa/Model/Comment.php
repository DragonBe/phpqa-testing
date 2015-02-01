<?php
namespace Phpqa\Model;

class Comment
{
    /**
     * @var int The sequence ID for this comment
     */
    protected $commentId;
    /**
     * @var string The full name of the person leaving a comment
     */
    protected $fullName;
    /**
     * @var string The email address of the person leaving a comment
     */
    protected $emailAddress;
    /**
     * @var string The website of the person leaving a comment
     */
    protected $website;
    /**
     * @var string The actual comment
     */
    protected $comment;

    /**
     * Constructor for this comment, allows immediate setting of comments at
     * construct
     *
     * @param null|array $comment
     */
    public function __construct($comment = null)
    {
        if (null !== $comment) {
            $this->populate($comment);
        }
    }

    /**
     * @return int
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param int $commentId
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Method to safely populate the data in this model
     *
     * @param \ArrayObject $data The data object
     * @param string $key The key for provisioning
     * @return Comment
     */
    private function safeStore($data, $key)
    {
        $method = 'set' . ucfirst($key);
        if (method_exists($this, $method)) {
            if (isset ($data->$key)) {
                $this->$method($data->$key);
            }
        }
        return $this;
    }

    /**
     * Populates this model with data
     *
     * @param \ArrayObject|array $data
     */
    public function populate($data)
    {
        if (is_array($data)) {
            $data = new \ArrayObject($data, \ArrayObject::ARRAY_AS_PROPS);
        }
        $this->safeStore($data, 'commentId')
            ->safeStore($data, 'fullName')
            ->safeStore($data, 'emailAddress')
            ->safeStore($data, 'website')
            ->safeStore($data, 'comment');
    }

    /**
     * Converts this model into an array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'commentId' => $this->getCommentId(),
            'fullName' => $this->getFullName(),
            'emailAddress' => $this->getEmailAddress(),
            'website' => $this->getWebsite(),
            'comment' => $this->getComment(),
        ];
    }

    /**
     * Converts this object into a JSON formated string
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }
}
