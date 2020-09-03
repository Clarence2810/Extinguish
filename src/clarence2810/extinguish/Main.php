<?php

namespace clarence2810\extinguish;

use pocketmine\{
	Player,
	Server,
	plugin\PluginBase
	command\CommandSender,
	command\Command,
	utils\Textformat as C,
	utils\Config,
};;
class Main extends PluginBase
{
	public function onEnable(){
		$this->saveDefaultConfig();
        $this->getResource("config.yml");
		$this->getLogger()->info("Plugin by Clarence2810 has been enabled!");
	}
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
		switch($cmd->getName()){
			case "extinguish":
				if($sender instanceof Player){
					if($sender->hasPermission("extinguish.command")){
						if($sender->isOnFire()){
							$sender->extinguish();
							$sender->sendMessage($this->getConfig()->get("extinguish-success"));
						}else{
							$sender->sendMessage($this->getConfig()->get("not-on-fire"));
						}
					}else{
						$sender->sendMessage($this->getConfig()->get("no-permission"));
					}
				}else{
					$sender->sendMessage($this->getConfig()->get("player-only"));
				}
			break;
		}
		return true;
	}
}