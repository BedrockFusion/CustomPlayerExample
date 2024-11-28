<?php

namespace scher\customplayer\provider;

use pocketmine\utils\Config;
use scher\customplayer\Loader;
use scher\customplayer\player\CustomPlayer;

class ConfigProvider{
	private Loader $plugin;

	public function __construct(Loader $plugin){
		$this->plugin = $plugin;
		$this->init();
	}

	public function init(): void{
		@mkdir($this->plugin->getDataFolder() . 'players');
	}

	public function getPlayerConfig(string $xuid): Config{
		return new Config($this->plugin->getDataFolder() . 'players/' . $xuid . '.json', Config::JSON,
		['general_level' => 0]);
	}

	public function getPlayerData(CustomPlayer $customPlayer): array{
		$conf = $this->getPlayerConfig($customPlayer->getXuid());
		return [
			'name' => $customPlayer->getName(),
			'general_level' => $conf->get('general_level'),
		];
	}

	public function savePlayerData(CustomPlayer $customPlayer): void{
		$conf = $this->getPlayerConfig($customPlayer->getXuid());
		$conf->set('general_level', $customPlayer->getGeneralLevel());
		$conf->save();
	}
}
