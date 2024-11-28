<?php

namespace scher\customplayer\player;

use pocketmine\player\Player;
use scher\customplayer\Loader;
use scher\customplayer\provider\ConfigProvider;

class CustomPlayer extends Player{
	protected Loader $plugin;
	private ConfigProvider $provider;

	private int $generalLevel;

	public function init(Loader $plugin): void{
		$this->plugin = $plugin;
		$this->provider = $this->plugin->getProvider();
	}

	public function loadData(): void{
		$this->setGeneralLevel($this->provider->getPlayerData($this)['general_level']);
	}

	public function saveData(): void{
		$this->provider->savePlayerData($this);
	}

	public function exit(): void{
		//handle here with another things...
		//firstly save the data then do other stuff
		$this->saveData();
	}

	public function getGeneralLevel(): int{
		return $this->generalLevel;
	}

	public function setGeneralLevel(int $generalLevel): void{
		$this->generalLevel = $generalLevel;
	}
}
