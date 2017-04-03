<?php

    namespace ac;

    use pocketmine\event\Listener;
    use pocketmine\plugin\PluginBase;
    use pocketmine\network\protocol\AdventureSettingsPacket;
    use pocketmine\network\protocol\SetPlayerGameTypePacket;
    use pocketmine\event\server\DataPacketReceiveEvent;

    class Main extends PluginBase implements Listener {

        public function onEnable() {
            $this->getServer()->getPluginManager()->registerEvents($this, $this);
        }

        public function onRecieve(DataPacketReceiveEvent $event) {
            $player = $event->getPlayer();
            $packet = $event->getPacket();
            if ($packet instanceof AdventureSettingsPacket) {
                $event->setCancelled();
                switch ($packet->flags) {
                    case 614:
                        if(!$player->isCreative() and !$player->isSpectator() and !$player->isOp() and !$player->getAllowFlight()){
                            var_dump("ไอสัส ".$player->getName()." Hack ลอยขึ้น");
                            $player->kick("ไอสัส HACK");
                        }
                        break;
                    case 102:
                        if(!$player->isCreative() and !$player->isSpectator() and !$player->isOp() and !$player->getAllowFlight()){
                            var_dump("ไอสัส ".$player->getName()." Hack ลอยลง");
                            $player->kick("ไอสัส HACK");
                        }
                        break;
                    default:
                        # code...
                        break;
                }
                var_dump($packet->flags);
            }
        }
    }