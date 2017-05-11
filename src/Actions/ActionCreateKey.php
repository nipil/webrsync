<?php

declare(strict_types=1);

namespace WRS\Actions;

use WRS\Arguments,
    WRS\Apps\App,
    WRS\Crypto\KeyManager;

class ActionCreateKey extends Action {

    private $logger;
    private $key_manager;

    public function __construct(Arguments $args, KeyManager $manager) {
        $this->logger = App::GetLogger();
        $this->logger->debug(__METHOD__);

        $this->key_manager = $manager;

        if ($this->key_manager === NULL) {
            throw new \Exception("No key manager provided");
        }
    }

    public function run() {
        $this->logger->debug(__METHOD__);
        $this->key_manager->create_master();
        $this->key_manager->save();
    }
}