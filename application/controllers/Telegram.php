<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Telegram extends CI_Controller
{
    private $botToken = '7311224935:AAHZu_0OwHCtcl-kLkAJV3bpHL3noDZFK78'; // Ganti dengan token bot Anda

    public function __construct()
    {
        parent::__construct();
        $this->load->library('telebot', ['token' => $this->botToken]);

        $this->telebot->command('start', function ($ctx) {
            $ctx->replyWithText("Welcome! Use /jadwalsaya to get your schedule.");
        });

        $this->telebot->command('jadwalsaya', function ($ctx) {
            // Logika untuk menangani perintah #jadwalsaya
            $ctx->replyWithText("This is your schedule.");
        });
    }

    public function webhook()
    {
        $this->telebot->run();
    }
}
