<?php

class FacebookConcreteCreator extends SocialCreator
{
    public function factoryMethod()
    {
        return new FacebookMedia();
    }
}