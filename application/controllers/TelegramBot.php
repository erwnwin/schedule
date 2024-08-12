<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TelegramBot extends CI_Controller
{
    private $apiToken;

    public function __construct()
    {
        parent::__construct();
        // Simpan API Token di variabel
        $this->apiToken = "7311224935:AAHZu_0OwHCtcl-kLkAJV3bpHL3noDZFK78";
    }

    public function webhook()
    {
        // Ambil data dari webhook Telegram
        $update = json_decode(file_get_contents('php://input'), TRUE);
        $logFile = APPPATH . 'logs/webhook_log.txt'; // Lokasi file log
        file_put_contents($logFile, "Webhook called at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

        // Pastikan update berisi pesan
        if (!isset($update['message'])) {
            file_put_contents($logFile, "No message found in update\n", FILE_APPEND);
            return;
        }

        $chat_id = $update['message']['from']['id'];
        $message = $update['message']['text'];

        // Log pesan yang diterima
        file_put_contents($logFile, "Received message: " . $message . "\n", FILE_APPEND);

        // Respon sederhana
        $replyMessage = "Bot is active. You sent: " . $message;
        $this->sendMessage($chat_id, $replyMessage);
    }

    private function sendMessage($chat_id, $text)
    {
        $url = "https://api.telegram.org/bot" . $this->apiToken . "/sendMessage";
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'Markdown'
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        // Log hasil pengiriman pesan
        file_put_contents(APPPATH . 'logs/sendMessage_log.txt', "SendMessage result: " . print_r($result, true) . "\n", FILE_APPEND);

        return $result;
    }
}
