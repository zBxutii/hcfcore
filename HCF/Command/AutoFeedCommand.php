<?php

namespace HCF\Commands;

use HCF\Loader;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\permission\Permission;
use pocketmine\utils\TextFormat as TE;

class AutoFeedCommand extends PluginCommand {

    public function __construct(){
        // create Command
        parent::__construct("autofeed", Initiator::getIns());

        //create description, Permission, UsageMessage, Alias!
        parent::setPermission("autorefill.cmd");
        parent::setDescription("Refill your food bar automatically!");
        parent::setUsage(TE::colorize("&cUsage&f: /autofeed"));

    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if($sender instanceof Player){
            $sender->sendMessage("Debes Usar Este Commando Dentro");
        } else {
            if(!$sender->hasPermission("autorefill.cmd")){
                $sender->sendMessage(TE::colorize("&cNo Tienes Permiso Para Usar Este Commando!"));
            } else {
                if($sender->isAutoFeed()){
                    $sender->setAutoFeed(false);
                    $sender->sendMessage(TE::colorize("&cRelleno automatico Desactivado!"));
                } else {
                    $sender->setAutoFeed(true);
                    $sender->sendMessage(TE::colorize("&cRelleno automatico Activado!"));
                }
            }
        }
    }
}

?>
