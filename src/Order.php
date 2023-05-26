<?php 
namespace Mhmalekian\Mttrader;
enum OperationType: string {
    case Buy = 'Buy';
    case Sell = 'Sell';
    case BuyLimit = 'BuyLimit';
    case SellLimit = 'SellLimit';
    case BuyStop = 'BuyStop';
    case SellStop = 'SellStop';
}
class Order{ 
    private $price ;
    private $slippage ;
    private $stoploss ;
    private $takeprofit;
    private $comment ;
    private $stopLimitPrice;
    public function __construct(private $symbol,private OperationType $operation,private $volume){}
    public function setPrice($price){
        $this->$price=$price;
    }
    public function setSlippage($slippage){
        $this->slippage = $slippage;
    }
    public function setStoploss($stoploss){
        $this->stoploss = $stoploss;
    }
    public function setTakeprofit($takeprofit){
        $this->takeprofit = $takeprofit;
    }
    public function setComment($comment){
        $this->comment = $comment;
    }
    public function setStopLimitPrice($stopLimitPrice){
        $this->stopLimitPrice = $stopLimitPrice;
    }
    public function getSymbol(){ return $this->symbol;}
    public function getOperation():OperationType { return $this->operation;}
    public function getVolume(){ return $this->volume;}
    public function getPrice(){ return $this->price;}
    public function getSlippage(){ return $this->slippage;}
    public function getStoploss(){ return $this->stoploss;}
    public function getTakeprofit(){return $this->takeprofit;}
    public function getComment(){return $this->comment;}
    public function getStopLimitPrice(){return $this->stopLimitPrice;}
    
}