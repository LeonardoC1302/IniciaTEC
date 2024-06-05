<?php

namespace Model;

interface Observer {
    public function update(Activity $activity): void;
}