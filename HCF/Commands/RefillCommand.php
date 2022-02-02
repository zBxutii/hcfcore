<?php

namespace HCF\Commands;

use HCF\Loader;
use Loader;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat as TE;

class FeedCommand extends PluginCommand {

    public function __construct(){
        // create command
        parent::__construct("feed", Initiator::getIns());

        //create description, Permission, UsageMessage, Alias!
        parent::setPermission("feed.cmd");
        parent::setDescription("refill your food bar!");
        parent::setUsage(TE::colorize("&cUsage&f: /feed"));

    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if($sender instanceof Player){
            $sender->getServer()->getLogger()->info("Necesitas estar dentro para ejecutar el commando!");
        } else {
            if(!$sender->hasPermission("refill.cmd")){
                $sender->sendMessage(TE::colorize("&cNo Tienes Permiso Para Usar Este Commando!"));
                return;
            } else{
                $sender->setFood(20);
                $sender->sendMessage(TE::colorize("&aTu Barra De Comida Fue Rellenada!"));
            }
        }
    }
}
