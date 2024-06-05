<?php

namespace Model;

interface Visitor {
    public function visitActivity(Activity $activity): void;
}