<?php

$exchangeRates = [
    "USD_CAD" => 1.44,  
    "USD_EUR" => 0.92,  
    "CAD_USD" => 0.70,  
    "CAD_EUR" => 0.64,  
    "EUR_USD" => 1.08,  
    "EUR_CAD" => 1.55
];



$amount = $_GET["value"];
$fromCurrency = $_GET["from_currency"];
$toCurrency = $_GET["to_currency"];
    
$conversionKey = $fromCurrency . "_" . $toCurrency;

$convertedVal = $amount * $exchangeRates[$conversionKey];



?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Currency Calculation</title>
    <meta name="description" content="CENG 311 Inclass Activity 5" />

</head>

<body>

	<form action = "activity5.php" method="GET">
		<table>
			<tr>
				<td>
					From:
				</td>
				<td>
                <input type="text" name="value" value="<?php echo isset($amount) ? htmlspecialchars($amount) : ''; ?>"  />
				</td>
				<td>
					Currency:
				</td>
				<td>
                <select name="from_currency">
                    <option value="USD" <?php echo ($fromCurrency == "USD") ? "selected" : ""; ?>>USD</option>
                    <option value="CAD" <?php echo ($fromCurrency == "CAD") ? "selected" : ""; ?>>CAD</option>
                    <option value="EUR" <?php echo ($fromCurrency == "EUR") ? "selected" : ""; ?>>EUR</option>
                </select>		
				</td>	
			</tr>
			<tr>
				<td>
					To:
				</td>
				<td>
                    <input type="text" name="converted_value" value="<?php echo isset($convertedVal) && is_numeric($convertedVal) ? round($convertedVal, 2) : ''; ?>" readonly />
				</td>
				<td>
					Currency:
				</td>
				<td>
                <select name="to_currency">
                    <option value="USD" <?php echo ($toCurrency == "USD") ? "selected" : ""; ?>>USD</option>
                    <option value="CAD" <?php echo ($toCurrency == "CAD") ? "selected" : ""; ?>>CAD</option>
                    <option value="EUR" <?php echo ($toCurrency == "EUR") ? "selected" : ""; ?>>EUR</option>
                </select>
				</td>	
			</tr>
				<tr>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					<input type="submit" value="convert"/>
				</td>	
			</tr>
		</table>
		
	</form>		
</body>