<?php

namespace scher\customplayer\player;

use scher\customplayer\Loader;

class PlayerHandler{
	public static function handlePlayerJoin(CustomPlayer $customPlayer): void{
		//handle here with another things... (f.g: check punishments)
		if($customPlayer->isOnline()){
			$customPlayer->loadData();
			Loader::getInstance()->getLogger()->notice($customPlayer->getXuid() . " has joined the game.");
		}
	}

	public static function handlePlayerQuit(CustomPlayer $customPlayer): void{
		//handle here with another things...
		$customPlayer->exit();
		Loader::getInstance()->getLogger()->notice($customPlayer->getXuid() . " has left the game.");
	}
}
