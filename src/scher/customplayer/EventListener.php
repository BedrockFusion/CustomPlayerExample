<?php

namespace scher\customplayer;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use scher\customplayer\player\CustomPlayer;
use scher\customplayer\player\PlayerHandler;

class EventListener implements Listener{
	public function onCreation(PlayerCreationEvent $event): void{
		$event->setPlayerClass(CustomPlayer::class);
	}

	public function onJoin(PlayerJoinEvent $event): void{
		/** @var CustomPlayer $player */
		$player = $event->getPlayer();
		$player->init(Loader::getInstance());
		PlayerHandler::handlePlayerJoin($player);
	}

	public function onQuit(PlayerQuitEvent $event): void{
		/** @var CustomPlayer $player */
		$player = $event->getPlayer();
		PlayerHandler::handlePlayerQuit($player);
	}
}
