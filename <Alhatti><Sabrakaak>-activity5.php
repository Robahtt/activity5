<?php
$amount = '';
$fromCurrency = '';
$toCurrency = '';
$convertedVal = '';

if (isset($_GET['value']) && isset($_GET['from_currency']) && isset($_GET['to_currency'])) {
    $amount = floatval($_GET['value']);
    $fromCurrency = $_GET['from_currency'];
    $toCurrency = $_GET['to_currency'];

    $exchangeRates = [
        "USD_CAD" => 1.44,
        "USD_EUR" => 0.92,
        "CAD_USD" => 0.70,
        "CAD_EUR" => 0.64,
        "EUR_USD" => 1.08,
        "EUR_CAD" => 1.55
    ];

    $conversionKey = $fromCurrency . "_" . $toCurrency;

    if ($fromCurrency == $toCurrency) {
        $convertedVal = $amount;
    } elseif (isset($exchangeRates[$conversionKey])) {
        $convertedVal = $amount * $exchangeRates[$conversionKey];}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Calculation</title>
    <meta name="description" content="CENG 311 Inclass Activity 5" />
</head>
<body>
    <form action="activity5.php" method="GET">
        <table>
            <tr>
                <td>From:</td>
                <td>
                    <input type="text" name="value" value="<?php echo htmlspecialchars($amount); ?>" required />
                </td>
                <td>Currency:</td>
                <td>
                    <select name="from_currency">
                        <option value="USD" <?php if ($fromCurrency == "USD") echo "selected"; ?>>USD</option>
                        <option value="CAD" <?php if ($fromCurrency == "CAD") echo "selected"; ?>>CAD</option>
                        <option value="EUR" <?php if ($fromCurrency == "EUR") echo "selected"; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>To:</td>
                <td>
                    <input type="text" name="converted_value" value="<?php echo is_numeric($convertedVal) ? round($convertedVal, 2) : ''; ?>" readonly />
                </td>
                <td>Currency:</td>
                <td>
                    <select name="to_currency">
                        <option value="USD" <?php if ($toCurrency == "USD") echo "selected"; ?>>USD</option>
                        <option value="CAD" <?php if ($toCurrency == "CAD") echo "selected"; ?>>CAD</option>
                        <option value="EUR" <?php if ($toCurrency == "EUR") echo "selected"; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;">
                    <input type="submit" value="Convert" />
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
