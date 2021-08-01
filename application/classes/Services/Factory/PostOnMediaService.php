<?php
class PostOnMediaService
{
    private $socialCreator;

    public function __construct(SocialCreator $socialCreator)
    {
        $this->socialCreator = $socialCreator;
    }

    public function execute()
    {
        $this->socialCreator->postOperations();
    }
}