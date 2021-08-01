<?php

class InstagramConcreteCreator extends SocialCreator
{
    public function factoryMethod()
    {
        return new InstagramMedia();
    }
}