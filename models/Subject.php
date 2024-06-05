<?php

namespace Model;

interface Subject {
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(Activity $activity): void;
}