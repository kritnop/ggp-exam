<?php
class ProductionTime {
 	public function Delivery($order_date) { 
 		$find_delivery_date = $order_date;
 		
 		// production team does not work on Saturday and Sunday and Holiday
		while(self::isHoliday($find_delivery_date) || self::isProductionHoliday($find_delivery_date)) {
			// go to the next day
			$find_delivery_date = self::next_date($find_delivery_date);
			$plus_production_holiday = 1;
			
		}
		// business card take 1 day, not count if holiday is flagged and already turn to the next day
		if(!isset($plus_production_holiday)) $find_delivery_date = self::next_date($find_delivery_date);

		// shipping team does not work on Sunday and Holiday
		while(self::isHoliday($find_delivery_date) || self::isShippingHoliday($find_delivery_date)) {
			// go to the next day
			$find_delivery_date = self::next_date($find_delivery_date);
			$plus_shipping_holiday = 1;
		}
		// use 1 day to delivery, not count if holiday is flagged and already turn to the next day
		if(!isset($plus_shipping_holiday)) $find_delivery_date = self::next_date($find_delivery_date);

		// check logistic team does not work on Sunday and holiday
		while(self::isHoliday($find_delivery_date) || self::isLogisticHoliday($find_delivery_date)) {
			// go to the next day
			$find_delivery_date = self::next_date($find_delivery_date);
		}

		$delivery_date = $find_delivery_date;
		return $delivery_date;
 	}

	protected function isHoliday($order_date) {
		$company_holiday = ['2018-01-01', '2018-01-02', '2018-03-01', '2018-04-06', '2018-04-13', '2018-04-14', '2018-04-15', '2018-04-16', '2018-05-01'];
		if(in_array($order_date, $company_holiday)) {
			return true;
		} else {
			return false;
		}
	} 

	protected function isProductionHoliday($order_date) {
		if(date('D', strtotime(str_replace('-', '/', $order_date))) == 'Sat' || date('D', strtotime(str_replace('-', '/', $order_date))) == 'Sun') {
			return true;
		} else {
			return false;
		}
	} 

	protected function isShippingHoliday($order_date) {
		if(date('D', strtotime(str_replace('-', '/', $order_date))) == 'Sun') {
			return true;
		} else {
			return false;
		}
	} 

	protected function isLogisticHoliday($order_date) {
		if(date('D', strtotime(str_replace('-', '/', $order_date))) == 'Sun') {
			return true;
		} else {
			return false;
		}
	}   

	public function next_date($find_delivery_date) {
		$date = $find_delivery_date;
		$date_check = str_replace('-', '/', $date);
		$find_delivery_date = date('Y-m-d',strtotime($date_check . "+1 days"));
		return $find_delivery_date;
	}      	
}  



echo ProductionTime::Delivery('2018-04-11');
// result 2018-04-17
?>
