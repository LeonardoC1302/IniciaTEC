<?php

namespace Model;

interface Element {
    public function accept(Visitor $visitor): void;
}