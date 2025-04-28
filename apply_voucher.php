<?php
session_start();
include 'voucher_db.php'; // Connect to the vouchers database

$response = ['success' => false, 'message' => 'Invalid voucher code.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $voucherCode = trim($input['voucherCode']);

    if (empty($voucherCode)) {
        $response['message'] = 'No voucher code provided.';
        echo json_encode($response);
        exit;
    }

    try {
        // Check if the voucher exists and is valid
        $stmt = $voucher_pdo->prepare("SELECT discount FROM vouchers WHERE code = :code AND valid_until >= CURDATE()");
        $stmt->execute(['code' => $voucherCode]);
        $voucher = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($voucher) {
            $response['success'] = true;
            $response['discount'] = floatval($voucher['discount']); // Ensure discount is numeric
            $response['message'] = 'Voucher applied successfully!';
        } else {
            $response['message'] = 'Voucher is invalid or expired.';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }
}

echo json_encode($response);
?>
