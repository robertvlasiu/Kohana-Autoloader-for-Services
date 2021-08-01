<?php

abstract class SocialCreator
{
    abstract public function factoryMethod();

    public function postOperations()
    {
        $media = $this->factoryMethod();
        echo 'Response: ' . $media->post() . '<br>';
    }
}
