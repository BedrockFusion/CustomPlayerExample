<?php

namespace scher\customplayer;

use pocketmine\plugin\PluginBase;
use scher\customplayer\provider\ConfigProvider;

class Loader extends PluginBase{
	private static Loader $instance;

	private ConfigProvider $provider;

	protected function onLoad(): void{
		self::$instance = $this;
	}

	public function onEnable() : void{
		$this->provider = new ConfigProvider($this);
		$this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
	}

	public function onDisable() : void{}

	public function getProvider(): ConfigProvider{
		return $this->provider;
	}

	public static function getInstance(): Loader{
		return self::$instance;
	}
}
