<?php

namespace clarence2810\extinguish;

use pocketmine\{
	Player,
	Server,
	plugin\PluginBase,
	command\CommandSender,
	command\Command,
	utils\Config,
};;
class Main extends PluginBase
{
	public $extinguishCooldown = [];
	
	public function onEnable(){
		$this->saveDefaultConfig();
        $this->getResource("config.yml");
	}
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
		switch($cmd->getName()){
			case "extinguish":
				if($sender->hasPermission("extinguish.command")){
					if($this->getConfig()->get("command-cooldown") === true){
						$cooldown = $this->getConfig()->get("extinguish-cooldown");
						if($sender->isOnFire()){
							if(empty($this->extinguishCooldown[$sender->getName()])){
								$this->extinguishCooldown[$sender->getName()] = time() + $cooldown;
								$sender->extinguish();
								$sender->sendMessage($this->getConfig()->get("extinguished-success"));
							}else{
								if(time() < $this->extinguishCooldown[$sender->getName()]){
									$cd = $this->extinguishCooldown[$sender->getName()] - time();
									$sender->sendMessage(str_replace(["{remaining}"], [$cd], $this->getConfig()->get("on-cooldown")));
								}else{
									unset($this->extinguishCooldown[$sender->getName()]);
								}
							}
						}else{
							$sender->sendMessage($this->getConfig()->get("not-on-fire"));
						}
					}else{
						if(empty($args[0])){
							if($sender->isOnFire()){
								$sender->extinguish();
								$sender->sendMessage($this->getConfig()->get("extinguished-success"));
							}else{
								$sender->sendMessage($this->getConfig()->get("not-on-fire"));
							}
						}else{
							if(!$sender->hasPermission("extinguish.command.other")){
								$sender->sendMessage($this->getConfig()->get("other-no-permission"));
							}else{
								$player = $sender->getServer()->getPlayer($args[0]);
								if($player !== null){
									if($player->isOnFire()){
										if($this->getConfig()->get("command-cooldown") === true){
											$cooldown = $this->getConfig()->get("extinguish-cooldown");
											if(empty($this->extinguishCooldown[$player->getName()])){
												$this->extinguishCooldown[$player->getName()] = time() + $cooldown;
												$player->extinguish();
												$player->sendMessage(str_replace(["{sender}"], [$sender->getName()], $this->getConfig()->get("player-extinguished-success")));
												$sender->sendMessage(str_replace(["{player}"], [$player->getName()], $this->getConfig()->get("sender-extinguished-success")));
											}else{
												if(time() < $this->extinguishCooldown[$player->getName()]){
													$cd = $this->extinguishCooldown[$player->getName()] - time();
													$sender->sendMessage(str_replace(["{remaining}", "{player}"], [$cd, $player->getName()], $this->getConfig()->get("other-on-cooldown")));
												}else{
													unset($this->extinguishCooldown[$sender->getName()]);
												}
											}
										}else{
											$player->extinguish();
											$player->sendMessage(str_replace(["{sender}"], [$sender->getName()], $this->getConfig()->get("player-extinguished-success")));
											$sender->sendMessage(str_replace(["{player}"], [$player->getName()], $this->getConfig()->get("sender-extinguished-success")));
										}
									}else{
										$sender->sendMessage(str_replace(["{player}"], [$player->getName()], $this->getConfig()->get("other-not-on-fire")));
									}
								}else{
									$sender->sendMessage($this->getConfig()->get("player-not-found"));
								}
							}
						}
					}
				}else{
					$sender->sendMessage($this->getConfig()->get("no-permission"));
				}
			break;
		}
		return true;
	}
}