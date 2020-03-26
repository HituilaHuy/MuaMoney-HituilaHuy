<?php

namespace MuaMoney;

# Edit By HituilaHuy
# Team CastleVN
# Facebook: facebook.com/huyyt0911
# Youtube: HituilaHuy Tv
# =====================
# IP: Castlevnpe.ddns.net
# Port: 19132

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as C;
use MuaMoney\Main;

class Main extends PluginBase implements Listener {
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->pointapi = $this->getServer()->getPluginManager()->getPlugin("PointAPI");
		
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getResource("config.yml");
	}

	public function onCommand(CommandSender $player, Command $command, string $label, array $args) : bool {
		switch($command->getName()){
			case "muamoney":
			if($player instanceof Player){
			    $this->openMyForm($player);
			} else {
				$player->sendMessage("§cBạn chỉ được sử dụng lệnh trong game !");
					return true;
			}
			break;
		}
	    return true;
	}

	public function openMyForm(Player $sender){
		$formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $formapi->createSimpleForm(function (Player $sender, ?int $data = null){
		$result = $data;
		if($result === null){
			return;
		    }
			switch($result){
				case 0;
			    $this->Goi1($sender);
					break;
				case 1;
				$this->Goi2($sender);
					break;
				case 2;
				$this->Goi3($sender);
					break;
				case 3;
				$this->Goi4($sender);
					break;
			}
		});
		$point = $this->pointapi->myPoint($sender);
		$form->setTitle("§l§4• §cMua Xu §4•");
				$form->setContent("§l§6+§a Point của bạn: §f$point\n§6+§a Hãy chọn Gói bạn muốn mua !");
		$form->addButton("§l§6• §cGói 100,000 §6•\n§aGiá: §f1 Point", 0);
		$form->addButton("§l§6• §cGói 1,000,000 §6•\n§aGiá: §f10 Point", 1);
		$form->addButton("§l§6• §cGói 10,000,000 §6•\n§aGiá: §f100 Point", 2);
	    $form->addButton("§l§6• §cGói 100,000,000 §6•\n§aGiá: §f1000 Point", 3);
		$form->sendToPlayer($sender);
			return $form;
	}

/**
* Gói 1:———————————————————————————————————————————————
*/

	public function Goi1($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $point = $this->pointapi->myPoint($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Goi1");
                 $cost = $this->getConfig()->get("GiaGoi1");
                 if($point >= $cost){
            
                 $this->pointapi->reducePoint($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "givemoney ".$name." 100000");
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package." §aXu");
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Goi1");
        $cost = $this->getConfig()->get("GiaGoi1");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §cPoint");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

/**
* Gói 2:———————————————————————————————————————————————
*/
	public function Goi2($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $point = $this->pointapi->myPoint($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Goi2");
                 $cost = $this->getConfig()->get("GiaGoi2");
                 if($point >= $cost){
            
                 $this->pointapi->reducePoint($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "givemoney ".$name." 1000000");
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package." §aXu");
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Goi2");
        $cost = $this->getConfig()->get("GiaGoi2");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §cPoint");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

/**
* Gói 3:———————————————————————————————————————————————
*/

	public function Goi3($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $point = $this->pointapi->myPoint($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Goi3");
                 $cost = $this->getConfig()->get("GiaGoi3");
                 if($point >= $cost){
            
                 $this->pointapi->reducePoint($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "givemoney ".$name." 10000000");
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package." §aXu");
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Goi3");
        $cost = $this->getConfig()->get("GiaGoi3");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §cPoint");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

/**
* Gói 4:———————————————————————————————————————————————
*/

	public function Goi4($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $point = $this->pointapi->myPoint($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Goi4");
                 $cost = $this->getConfig()->get("GiaGoi4");
                 if($point >= $cost){
            
                 $this->pointapi->reducePoint($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "givemoney ".$name." 100000000");
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package." §aXu");
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Goi4");
        $cost = $this->getConfig()->get("GiaGoi4");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §cPoint");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

	public function MuaThanhCong($sender){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $sender, $data){
			$result = $data;
			if ($result == null) {
			}
			switch ($result) {
					case 1:
						break;
			}
		});
	$form->setTitle($this->getConfig()->get("MuaThanhCongTitle"));
	$form->setContent($this->getConfig()->get("MuaThanhCongContent"));
	$form->addButton($this->getConfig()->get("MuaThanhCongSubmit"));
	$form->sendToPlayer($sender);
	}

	public function translateMessage($scut, $message) {
	$message = str_replace($scut."{name}", $sender->getName(), $message);
		return $message;
     } 

	public function MuaThatBai($sender){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $sender, $data){
			$result = $data;
			if ($result == null) {
			}
			switch ($result) {
					case 1:
						break;
			}
		});
	$form->setTitle($this->getConfig()->get("MuaThatBaiTitle"));
	$form->setContent($this->getConfig()->get("MuaThatBaiContent"));
	$form->addButton($this->getConfig()->get("MuaThatBaiSubmit"));
	$form->sendToPlayer($sender);
	}
	public function processor(Player $player, string $string): string{		$string = str_replace("{name}", $player->getName(), $string);
	return $string;
	}
}
