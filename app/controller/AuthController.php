<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["ok" => false, "error" => "Không nhận được dữ liệu"]);
    exit;
}

// ============================
// GOOGLE LOGIN
// ============================
if (isset($data['id_token'])) {
    $id_token = $data['id_token'];
    $verifyUrl = "https://oauth2.googleapis.com/tokeninfo?id_token=" . $id_token;
    $resp = @file_get_contents($verifyUrl);
    if (!$resp) {
        echo json_encode(["ok" => false, "error" => "Không thể kết nối tới Google"]);
        exit;
    }
    $payload = json_decode($resp, true);
    if (isset($payload['aud']) && $payload['aud'] === "1075378631949-6ja7sid388j1rflp05omtiov437dd4vq.apps.googleusercontent.com") {
        echo json_encode(["ok" => true, "provider" => "google", "payload" => $payload]);
    } else {
        echo json_encode(["ok" => false, "error" => "ID token không hợp lệ"]);
    }
    exit;
}

// ============================
// FACEBOOK LOGIN
// ============================
if (isset($data['access_token'])) {
    $access_token = $data['access_token'];
    $verifyUrl = "https://graph.facebook.com/me?fields=id,name,email,picture&access_token=" . urlencode($access_token);
    $opts = ["http" => ["header" => "Cache-Control: no-cache\r\nPragma: no-cache\r\n"]];
    $context = stream_context_create($opts);
    $resp = @file_get_contents($verifyUrl, false, $context);
    if (!$resp) {
        echo json_encode(["ok" => false, "error" => "Không thể kết nối Facebook API"]);
        exit;
    }
    $payload = json_decode($resp, true);
    if (isset($payload['error'])) {
        echo json_encode(["ok" => false, "error" => $payload['error']['message']]);
    } else {
        echo json_encode([
            "ok" => true,
            "provider" => "facebook",
            "payload" => [
                "name" => $payload["name"] ?? "",
                "email" => $payload["email"] ?? "",
                "picture" => $payload["picture"]["data"]["url"] ?? ""
            ]
        ]);
    }
    exit;
}

// ============================
// ZALO LOGIN
// ============================
if (isset($data['zalo_code'])) {
    $code = $data['zalo_code'];
    $app_id = "YOUR_ZALO_APP_ID"; 
    $app_secret = "YOUR_ZALO_APP_SECRET"; 
    $redirect_uri = "https://yourdomain.com/zalo_callback.html";

    $token_url = "https://oauth.zaloapp.com/v4/access_token?app_id={$app_id}&app_secret={$app_secret}&code={$code}&grant_type=authorization_code&redirect_uri=" . urlencode($redirect_uri);
    $resp = @file_get_contents($token_url);
    if (!$resp) {
        echo json_encode(["ok" => false, "error" => "Không thể lấy access_token từ Zalo"]);
        exit;
    }
    $token_data = json_decode($resp, true);
    if (!isset($token_data['access_token'])) {
        echo json_encode(["ok" => false, "error" => $token_data['error'] ?? "Lỗi Zalo"]);
        exit;
    }
    $access_token = $token_data['access_token'];

    $profile_url = "https://graph.zalo.me/v2.0/me?fields=id,name,picture,phone&access_token={$access_token}";
    $profile_resp = @file_get_contents($profile_url);
    if (!$profile_resp) {
        echo json_encode(["ok" => false, "error" => "Không thể lấy thông tin user Zalo"]);
        exit;
    }
    $profile = json_decode($profile_resp, true);
    if (isset($profile['error'])) {
        echo json_encode(["ok" => false, "error" => $profile['error']['message'] ?? "Lỗi Zalo"]);
    } else {
        echo json_encode([
            "ok" => true,
            "provider" => "zalo",
            "payload" => [
                "name" => $profile['name'] ?? "",
                "phone" => $profile['phone'] ?? "",
                "picture" => $profile['picture']['data']['url'] ?? ""
            ]
        ]);
    }
    exit;
}

echo json_encode(["ok" => false, "error" => "Không có token hợp lệ"]);
?>
