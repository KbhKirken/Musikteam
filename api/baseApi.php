<?php
	class BaseApi {

		protected function asJSON($mix) {
			$array = array_map('iterator_to_array', iterator_to_array($mix));
			$this->utf8_encode_deep($array);
			return json_encode ( $array );
		}

		private function utf8_encode_deep(&$input) {
		    if (is_string($input)) {
		        $input = utf8_encode($input);
		    } else if (is_array($input)) {
		        foreach ($input as &$value) {
		            $this->utf8_encode_deep($value);
		        }

		        unset($value);
		    } else if (is_object($input)) {
		        $vars = array_keys(get_object_vars($input));

		        foreach ($vars as $var) {
		            $this->utf8_encode_deep($input->$var);
		        }
		    }

		    return $input;
		}
	}
?>