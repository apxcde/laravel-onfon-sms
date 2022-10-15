<?php

namespace Apxcde\OnfonSms;

class OnfonMessage
{
    protected ?String $content = null;

    public function content(String $content): self
    {
        $this->content = trim($content);

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }
}
